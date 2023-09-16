<?php

namespace App\Controller;

use App\Entity\Type;
use OpenApi\Attributes as OA;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Models\ErrorValidationConstraints;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[OA\Tag('Type')]
#[Route('/api/type')]
class TypeController extends AbstractController
{
    /**
     * Browse all Types
     */
    #[Route('/', name: 'app_type_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Browse all Types",
        description: "Browse all objects Type",
    )]
    #[OA\Parameter(
        name: "type",
        description: "Type name",
        in: "query",
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(ref: new Model(type: Type::class, groups: ['read:Type:item']))
        ),
    )]
    #[OA\Response(
        response: 404,
        description: "Not Found",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 404),
                new OA\Property(property: "message", example: "No Type was found")
            ]
        )
    )]
    #[OA\Response(
        response: 500,
        description: "Internal Server Error",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 500),
                new OA\Property(property: "message", example: "Internal Server Error")
            ]
        )
    )]
    #[Security(name: null)]
    public function browse(Request $request, TypeRepository $typeRepository): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
    
            // Parameter "name"
            if (array_key_exists('type', $request->query->all())) {
    
                // Find all Type by name
                $result = $typeRepository->findTypeByName($request->query->all()['name']);
    
                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Type:item"]]);
                } else {
                    return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        $types = $typeRepository?->findAll();

        // Return status code 500 if $types is empty
        if ($types === null) {
            return $this->json(["code" => 500, "message" => "Internal Server Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    
        return $this->json($typeRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Type:item"]]);
    }

    /**
     * Read a Type
     */
    #[Route('/{id<\d+>}', name: 'app_type_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Read a Type",
        description: "Reading a Type object identified by Type ID",
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new Model(type: Type::class, groups: ['read:Type:item'])
    )]
    #[OA\Response(
        response: 401,
        description: "Unauthorized",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 401),
                new OA\Property(property: "message", example: "Invalid credentials")
            ]
        )
    )]
    #[OA\Response(
        response: 404,
        description: "Not Found",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 404),
                new OA\Property(property: "message", example: "No Type was found")
            ]
        )
    )]
    public function read(Type $type = null): JsonResponse
    {
        // Return status code 404 if $Type is empty
        if ($type === null) {
            return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
        }

        // Return Type and status code 200
        return $this->json($type, Response::HTTP_OK, [], ["groups" => ["read:Type:item"]]);
    }

    /**
     * Edit a Type
     */
    #[Route('/edit/{id<\d+>}', name: 'app_type_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Edit a Type",
        description: "Editing a Type identified by Type ID",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "name", example: "Peinture"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 202,
        description: "Accepted",
        content: new Model(type: Type::class, groups: ['read:Type:item'])
    )]
    #[OA\Response(
        response: 401,
        description: "Unauthorized",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 401),
                new OA\Property(property: "message", example: "Invalid credentials")
            ]
        )
    )]
    #[OA\Response(
        response: 403,
        description: "Forbidden",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 403),
                new OA\Property(property: "message", example: "Access Denied")
            ]
        )
    )]
    #[OA\Response(
        response: 404,
        description: "Not Found",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 404),
                new OA\Property(property: "message", example: "No Type was found")
            ]
        )
    )]
    public function edit(Type $type = null, Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        if ($type === null) {
            return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
        }

        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Deserialzation with entity Type and object Type in context, check and insert new modification
            $serializerInterface->deserialize($json, Type::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $type]);

            $type->setUpdatedAt(new \DateTimeImmutable());

            // Save type into database
            $entityManager->persist($type);
            $entityManager->flush();

            // Return Type and status code 202
            return $this->json($type, Response::HTTP_ACCEPTED, [], ["groups" => ["read:Type:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Add a Type
     */
    #[Route('/add', name: 'app_type_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add a Type",
        description: "Adding a new Type object",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "name", example: "Peinture"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 201,
        description: "Created",
        content: new Model(type: Type::class, groups: ['read:Type:item'])
    )]
    #[OA\Response(
        response: 400,
        description: "Bad request",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 400),
                new OA\Property(property: "message", example: "Invalid request")
            ]
        )
    )]
    #[OA\Response(
        response: 401,
        description: "Unauthorized",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 401),
                new OA\Property(property: "message", example: "Invalid credentials")
            ]
        )
    )]
    #[OA\Response(
        response: 403,
        description: "Forbidden",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 403),
                new OA\Property(property: "message", example: "Access Denied")
            ]
        )
    )]
    public function add(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Return status code 400 if $json is empty
            if ($json === "") {
                return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
            }

            // Deserialization with entity Product, insert field
            $type = $serializerInterface->deserialize($json, Type::class, 'json');

            $errors = $validatorInterface->validate($type);

            if (count($errors) > 0) {
                $errorValidationConstraints = new ErrorValidationConstraints($errors);
                return $this->json($errorValidationConstraints->getAllMessage(), Response::HTTP_BAD_REQUEST);
            }

            // Save type into database
        $entityManager->persist($type);
        $entityManager->flush();

            // Return Type and status code 200
            return $this->json($type, Response::HTTP_CREATED, [], ["groups" => ["read:Type:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Delete a Type
     */
    #[Route('/delete/{id<\d+>}', name: 'app_type_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Delete a Type",
        description: "Deleting a Type object identified by Type ID",
    )]
    #[OA\Response(
        response: 204,
        description: "No Content",
    )]
    #[OA\Response(
        response: 401,
        description: "Unauthorized",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 401),
                new OA\Property(property: "message", example: "Invalid credentials")
            ]
        )
    )]
    #[OA\Response(
        response: 403,
        description: "Forbidden",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 403),
                new OA\Property(property: "message", example: "Access Denied")
            ]
        )
    )]
    #[OA\Response(
        response: 404,
        description: "Not Found",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 404),
                new OA\Property(property: "message", example: "No Type was found")
            ]
        )
    )]
    public function delete(Type $type = null, EntityManagerInterface $entityManager): JsonResponse
    {
        // Return status code 404 if $Type is empty
        if ($type === null) {
            return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
        }

        if ($this->isGranted('ROLE_ADMIN')) {

            // Remove Type into database
            $entityManager->remove($type, true);
            $entityManager->flush();

            // Return status code 204
            return $this->json(null, Response::HTTP_NO_CONTENT);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }
}

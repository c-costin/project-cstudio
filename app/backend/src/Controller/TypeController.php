<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\TypeRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[OA\Tag('Type')]
#[Route('/api/type')]
class TypeController extends AbstractController
{
    // List all the Types
    #[Route('/', name: 'app_type_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Retrieve the collection of Type resources",
        description: "Retrieve the collection of Type",
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
                new OA\Property(property: "message", example: "No Products was found")
            ]
        )
    )]
    public function browse(TypeRepository $typeRepository): JsonResponse
    {
        return $this->json($typeRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Type:item"]]);
    }

    // Show a Type
    #[Route('/{id<\d+>}', name: 'app_type_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Retrieve a Type resource",
        description: "Retrieve a Type resource",
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

    // Update a Type
    #[Route('/edit/{id<\d+>}', name: 'app_type_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Update a Type resource",
        description: "Update a Type resource",
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
        description: "Success - Accepted",
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
    public function edit(Type $type = null, Request $request, SerializerInterface $serializerInterface, TypeRepository $TypeRepository): JsonResponse
    {
        if ($type === null) {
            return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
        }

        // Get Request Body
        $json = $request->getContent();

        // Deserialzation with entity Type and object Type in context, check and insert new modification
        $serializerInterface->deserialize($json, Type::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $type]);

        $type->setUpdatedAt(new \DateTimeImmutable());

        // Save Type into database
        $TypeRepository->add($type, true);

        // Return Type and status code 202
        return $this->json($type, Response::HTTP_ACCEPTED, [], ["groups" => ["read:Type:item"]]);
    }

    // Create a Type
    #[Route('/add', name: 'app_type_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Create a Product resource",
        description: "Create a Product resource",
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
        description: "Success - Created",
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
    public function add(Request $request, SerializerInterface $serializerInterface, TypeRepository $typeRepository): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") {
            return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
        }

        // Deserialization with entity Product, insert field
        $type = $serializerInterface->deserialize($json, Type::class, 'json');

        // Save Type into database
        $typeRepository->add($type, true);

        // Return Type and status code 200
        return $this->json($type, Response::HTTP_CREATED, [], ["groups" => ["read:Type:item"]]);
    }

    // Remove a Type
    #[Route('/delete/{id<\d+>}', name: 'app_type_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Remove a Type resource",
        description: "Remove a Type resource",
    )]
    #[OA\Response(
        response: 204,
        description: "Success - No Content",
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
    public function delete(Type $type = null, TypeRepository $typeRepository): JsonResponse
    {
        // Return status code 404 if $Type is empty
        if ($type === null) {
            return $this->json(["code" => 404, "message" => "No Type was found"], Response::HTTP_NOT_FOUND);
        }

        // Remove Order into database
        $typeRepository->remove($type, true);

        // Return status code 204
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

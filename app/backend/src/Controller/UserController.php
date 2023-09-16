<?php

namespace App\Controller;

use App\Entity\User;
use App\Models\ErrorValidationConstraints;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[OA\Tag('User')]
#[Route('/api/user')]
class UserController extends AbstractController
{
    /**
     * Read an User
     */
    #[Route('/{id<\d+>}', name: 'app_user_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Read a User",
        description: "Reading a User object identified by User ID",
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new Model(type: User::class, groups: ['read:User:item'])
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
                new OA\Property(property: "message", example: "No User was found")
            ]
        )
    )]
    public function read(User $user = null): JsonResponse
    {
        // Return status code 404 if $user is empty
        if ($user === null) {
            return $this->json(["code" => 404, "message" => "No User was found"], Response::HTTP_NOT_FOUND);
        }

        // Check permission for read a User
        if ($this->isGranted("user_read", $user)) {
            // Return user and status code 200
            return $this->json($user, Response::HTTP_OK, [], ["groups" => ["read:User:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Access Denied"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Edit an User
     */
    #[Route('/edit/{id<\d+>}', name: 'app_user_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Edit a User",
        description: "Editing a User object identified by User ID",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "firstName", example: "John"),
                        new OA\Property(property: "lastName", example: "Doe"),
                        new OA\Property(property: "phone", example: "0600000000"),
                        new OA\Property(property: "address", example: "48 rue jean, 48270, Dupont"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 202,
        description: "Accepted",
        content: new Model(type: User::class, groups: ['read:User:item'])
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
                new OA\Property(property: "message", example: "No User was found")
            ]
        )
    )]
    public function edit(Request $request, SerializerInterface $serializerInterface, User $user = null, EntityManagerInterface $entityManager): JsonResponse
    {
        // Return status code 404 if $user is empty
        if ($user === null) {
            return $this->json(["code" => 404, "message" => "No User was found"], Response::HTTP_NOT_FOUND);
        }

        // Check permission for update an User
        if ($this->isGranted("user_edit", $user)) {
            // Get Request Body
            $json = $request->getContent();

            // Deserialzation with entity user and object user in context, check and insert new modification
            $serializerInterface->deserialize($json, User::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $user]);

            // Set date to update at
            $user->setUpdatedAt(new \DateTimeImmutable());

            // Save user into database
            $entityManager->persist($user);
            $entityManager->flush();

            // Return User and status code 202
            return $this->json($user, Response::HTTP_ACCEPTED, [], ["groups" => ["read:user:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Access Denied"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Add a User
     */
    #[Route('/add', name: 'app_user_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add a User",
        description: "Add a new User object",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "email", example: "john.doe@mail.com"),
                        new OA\Property(property: "password", example: "password"),
                        new OA\Property(property: "roles", example: "ROLE_USER"),
                        new OA\Property(property: "firstName", example: "John"),
                        new OA\Property(property: "lastName", example: "Doe"),
                        new OA\Property(property: "phone", example: "0600000000"),
                        new OA\Property(property: "address", example: "48 rue jean, 48270, Dupont"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 201,
        description: "Created",
        content: new Model(type: User::class, groups: ['read:User:item'])
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
    #[Security(name: null)]
    public function add(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") {
            return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
        }

        // Deserialization with entity user, insert field
        $user = $serializerInterface->deserialize($json, User::class, 'json');


        $errors = $validatorInterface->validate($user);


        if (count($errors) > 0) {
            $errorValidationConstraints = new ErrorValidationConstraints($errors);
            return $this->json($errorValidationConstraints->getAllMessage(), Response::HTTP_BAD_REQUEST);
        }

        $passwordTextPlain = $user->getPassword();
        $user->setPassword(password_hash($passwordTextPlain,  PASSWORD_BCRYPT));

        // Save user into database
        $entityManager->persist($user);
        $entityManager->flush();

        // Return user and status code 201
        return $this->json($user, Response::HTTP_CREATED, [], ["groups" => ["read:User:item"]]);
    }

    /**
     * Delete a User
     */
    #[Route('/delete/{id<\d+>}', name: 'app_user_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Delete a User",
        description: "Deleting a User object identified by User ID",
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
                new OA\Property(property: "message", example: "No User was found")
            ]
        )
    )]
    public function delete(User $user = null, EntityManagerInterface $entityManager): JsonResponse
    {
        // Return status code 404 if $user is empty
        if ($user === null) {
            return $this->json(["code" => 404, "message" => "No User was found"], Response::HTTP_NOT_FOUND);
        }

        // Check permission for delete User
        if ($this->isGranted("user_delete", $user)) {
            // Remove User into database
            $entityManager->remove($user, true);
            $entityManager->flush();
            // Return status code 204
            return $this->json(null, Response::HTTP_NO_CONTENT);
        }

        return $this->json(["code" => 403, "message" => "Access Denied"], Response::HTTP_FORBIDDEN);
    }
}
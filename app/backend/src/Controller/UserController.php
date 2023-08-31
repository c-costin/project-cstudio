<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_browse', methods: 'GET')]
    public function browse(UserRepository $userRepository): JsonResponse
    {
        // Return all Users
        return $this->json($userRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:user:item"]]);
    }

    #[Route('/{id<\d+>}', name: 'app_user_read', methods: ['GET'])]
    public function read(user $user = null): JsonResponse
    {
        // Return status code 404 if $user is empty
        if ($user === null) { return $this->json(["code" => 404, "message" => "No user was found"], Response::HTTP_NOT_FOUND);}

        // Return user and status code 200
        return $this->json($user, Response::HTTP_OK, [], ["groups" => ["read:user:item"]]);
    }

    #[Route('/edit/{id<\d+>}', name: 'app_user_edit', methods: ['PATCH'])]
    public function edit(Request $request, SerializerInterface $serializerInterface, user $user = null, userRepository $userRepository): JsonResponse
    {
        // Return status code 404 if $user is empty
        if ($user === null) { return $this->json(["code" => 404, "message" => "No User was found"], Response::HTTP_NOT_FOUND);}

        // Get Request Body
        $json = $request->getContent();

        // Deserialzation with entity user and object user in context, check and insert new modification
        $serializerInterface->deserialize($json, User::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $user]);

        // Set date to update at
        $user->setUpdatedAt(new \DateTimeImmutable());

        // Save User into database
        $userRepository->add($user, true);

        // Return User and status code 202
        return $this->json($user, Response::HTTP_ACCEPTED, [], ["groups" => ["read:user:item"]]);
    }

    #[Route('/add', name: 'app_user_add', methods: ['POST'])]
    public function add(Request $request, SerializerInterface $serializerInterface, UserRepository $userRepository): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") { return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);}

        // Deserialization with entity user, insert field
        $user = $serializerInterface->deserialize($json, User::class, 'json');

        // Save user into database
        $userRepository->add($user, true);

        // Return user and status code 201
        return $this->json($user, Response::HTTP_CREATED, [], ["groups" => ["read:User:item"]]);
    }

    #[Route('/delete/{id<\d+>}', name: 'app_user_delete', methods: ['DELETE'])]
    public function delete(User $user = null, UserRepository $userRepository): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($user === null) { return $this->json(["code" => 404, "message" => "No User was found"], Response::HTTP_NOT_FOUND);}

        // Remove User into database
        $userRepository->remove($user, true); //? Check method remove

        // Return status code 204
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

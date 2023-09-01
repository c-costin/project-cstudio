<?php

namespace App\Controller;

use App\Entity\Product;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Like')]
#[Route('/api/like')]
class LikeController extends AbstractController
{
    /**
     * Browse all Likes
     */
    #[Route('/', name: 'app_like_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Browse all Likes",
        description: "Browse all user Likes with user ID ",
    )]
    #[OA\Parameter(
        name: "user",
        description: "User ID",
        in: "query",
        required: true
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(ref: new Model(type: Product::class, groups: ['read:Product:item']))
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
        response: 500,
        description: "Not Found",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "code", example: 500),
                new OA\Property(property: "message", example: "Internal Server Error")
            ]
        )
    )]
    public function browse(Request $request,): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
            if (array_key_exists("user", $request->query->all())) {

                $result = []; //TODO Make find method into like service

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, []); //TODO Find solution for serialization
                } else {
                    return $this->json(["code" => 500, "message" => "Internal Server Error"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        // Return status code 400 if empty parameters into query
        return $this->json(["code" => 400, "message" => "Bad request"], Response::HTTP_NOT_FOUND);
    }

    /**
     * Add a Like
     */
    #[Route('/add', name: 'app_like_add', methods: 'GET')]
    #[OA\Post(
        summary: "Add a Like",
        description: "Adding a new Like object with two parameters to the query",
    )]
    #[OA\Parameter(
        name: "product",
        description: "Product ID",
        in: "query",
        required: true
    )]
    #[OA\Parameter(
        name: "user",
        description: "User ID",
        in: "query",
        required: true
    )]
    #[OA\Response(
        response: 204,
        description: "Success - No Content",
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
    public function add(Request $request): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
            if (array_key_exists("product", $request->query->all()) && array_key_exists("user", $request->query->all())) {

                $result = []; //TODO Make find method into like service

                if ($result !== []) {
                    return $this->json(null, Response::HTTP_NO_CONTENT, []); //TODO Find solution for serialization
                } else {
                    return $this->json(["code" => 404, "message" => "No Like was found"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        // Return status code 400 if empty parameters into query
        return $this->json(["code" => 400, "message" => "Bad request"], Response::HTTP_NOT_FOUND);
    }

    /**
     * Delete a Like
     */
    #[Route('/delete', name: 'app_like_delete', methods: 'GET')]
    #[OA\Delete(
        summary: "Delete a Like",
        description: "Deleting a Like object",
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
                new OA\Property(property: "message", example: "No Like was found")
            ]
        )
    )]
    public function delete(Request $request): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
            if (array_key_exists("product", $request->query->all()) && array_key_exists("user", $request->query->all())) {

                $result = []; //TODO Make find method into like service

                if ($result !== []) {

                    // Remove Like into database
                    // $addressRepository->remove($address, true); //TODO Make remove method into like service

                    return $this->json(null, Response::HTTP_NO_CONTENT);
                } else {
                    return $this->json(["code" => 404, "message" => "No Like was found"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        // Return status code 400 if empty parameters into query
        return $this->json(["code" => 400, "message" => "Bad request"], Response::HTTP_NOT_FOUND);
    }
}

<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[OA\Tag('Product')]
#[Route('/api/product')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Retrieve the collection of Product resources",
        description: "Retrieve the collection of Product",
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
    public function browse(ProductRepository $productRepository): JsonResponse
    {
        $products = $productRepository?->findAll();

        // Return status code 404 if $product is empty
        if ($products === null) {
            return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
        }

        // Return all Product
        return $this->json($products, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/{id<\d+>}', name: 'app_product_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Retrieve a Product resource",
        description: "Retrieve a Product resource",
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new Model(type: Product::class, groups: ['read:Product:item'])
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
                new OA\Property(property: "message", example: "No Product was found")
            ]
        )
    )]
    public function read(Product $product = null): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) {
            return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
        }

        // Return Product and status code 200
        return $this->json($product, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/edit/{id<\d+>}', name: 'app_product_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Upload a Product resource",
        description: "Upload a Product resource",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "title", example: "Super Photo"),
                        new OA\Property(property: "description", example: "lorem ipsum, .................."),
                        new OA\Property(property: "picture", example: "image.jgp"),
                        new OA\Property(property: "price", example: "1450€"),
                        new OA\Property(property: "stock", example: 10),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 202,
        description: "Success - Accepted",
        content: new Model(type: Product::class, groups: ['read:Product:item'])
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
                new OA\Property(property: "message", example: "No Product was found")
            ]
        )
    )]
    public function edit(Request $request, SerializerInterface $serializerInterface, Product $product = null, ProductRepository $productRepository): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) {
            return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
        }

        // Get Request Body
        $json = $request->getContent();

        // Deserialzation with entity Product and object Product in context, check and insert new modification
        $serializerInterface->deserialize($json, Product::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $product]);

        // Set date to update at
        $product->setUpdatedAt(new \DateTimeImmutable());

        // Save Product into database
        $productRepository->add($product, true);

        // Return Product and status code 202
        return $this->json($product, Response::HTTP_ACCEPTED, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/add', name: 'app_product_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Create a Product resource",
        description: "Create a Product resource",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "title", example: "Super Photo"),
                        new OA\Property(property: "description", example: "lorem ipsum, .................."),
                        new OA\Property(property: "picture", example: "image.jgp"),
                        new OA\Property(property: "dimensions", example: "15x10cm"),
                        new OA\Property(property: "price", example: "1450€"),
                        new OA\Property(property: "artist", example: "Jean Photo"),
                        new OA\Property(property: "releaseDate", example: "2023-08-15"),
                        new OA\Property(property: "stock", example: 10),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 201,
        description: "Success - Created",
        content: new Model(type: Product::class, groups: ['read:Product:item'])
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
    public function add(Request $request, SerializerInterface $serializerInterface, ProductRepository $productRepository): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") {
            return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
        }

        // Deserialization with entity Product, insert field
        $product = $serializerInterface->deserialize($json, Product::class, 'json');

        // Save Product into database
        $productRepository->add($product, true);

        // Return Product and status code 201
        return $this->json($product, Response::HTTP_CREATED, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/delete/{id<\d+>}', name: 'app_product_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Remove a Product resource",
        description: "Remove a Product resource",
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
                new OA\Property(property: "message", example: "No Product was found")
            ]
        )
    )]
    public function delete(Product $product = null, ProductRepository $productRepository): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) {
            return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
        }

        // Remove Product into database
        $productRepository->remove($product, true); //? Check method remove

        // Return status code 204
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

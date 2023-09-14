<?php

namespace App\Controller;

use App\Entity\Product;
use App\Models\ErrorValidationConstraints;
use App\Repository\ProductRepository;
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

#[OA\Tag('Product')]
#[Route('/api/product')]
class ProductController extends AbstractController
{
    /**
     * Browse all Products
     */
    #[Route('/', name: 'app_product_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Browse all Products",
        description: "Browse all objects Product",
    )]
    #[OA\Parameter(
        name: "product",
        description: "Product name",
        in: "query",
    )]
    #[OA\Parameter(
        name: "type",
        description: "Type ID",
        in: "query",
    )]
    #[OA\Parameter(
        name: "category",
        description: "Category ID",
        in: "query",
    )]
    #[OA\Parameter(
        name: "home",
        in: "query",
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
    public function browse(Request $request, ProductRepository $productRepository): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {

            // Parameter "name"
            if (array_key_exists('product', $request->query->all())) {

                // Find all Product by name
                $result = $productRepository->findProductByName($request->query->all()['name']);

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
                }

                return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
            }

            // Parameter "type"
            if (array_key_exists('type', $request->query->all())) {

                // Find all Product by type
                $result = $productRepository->findProductByTypeId($request->query->all()['type']);

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
                }

                return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
            }

            // Parameter "category"
            if (array_key_exists('category', $request->query->all())) {

                // Find all Product by category
                $result = $productRepository->findProductByCategoryId($request->query->all()['category']);

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
                }

                return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
            }

            // Parameter "home"
            if (array_key_exists('home', $request->query->all())) {

                // Find selected Product for home page
                $result = $productRepository->findProductBySelection($request->query->all()['home']);

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
                }

                return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
            }
        }

        $products = $productRepository?->findAll();

        // Return status code 500 if $products is empty
        if ($products === null) {
            return $this->json(["code" => 500, "message" => "Internal Server Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->json($productRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
    }

    /**
     * Read a Product
     */
    #[Route('/{id<\d+>}', name: 'app_product_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Read a Product",
        description: "Reading a Product object identified by Product ID",
    )]
    #[OA\Response(
        response: 200,
        description: "Success",
        content: new Model(type: Product::class, groups: ['read:Product:collection'])
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
    #[Security(name: null)]
    public function read(Product $product = null): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) {
            return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);
        }

        // Return Product and status code 200
        return $this->json($product, Response::HTTP_OK, [], ["groups" => ["read:Product:collection"]]);
    }

    /**
     * Edit a Product
     */
    #[Route('/edit/{id<\d+>}', name: 'app_product_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Edit a Product",
        description: "Editing a Product identified by Product ID",
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
        description: "Accepted",
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

        if ($this->isGranted('ROLE_ADMIN')) {

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

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Add a Product
     */
    #[Route('/add', name: 'app_product_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add a Product",
        description: "Adding a new Product object",
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
        description: "Created",
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
    public function add(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface, ProductRepository $productRepository): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Return status code 400 if $json is empty
            if ($json === "") {
                return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
            }

            // Deserialization with entity Product, insert field
            $product = $serializerInterface->deserialize($json, Product::class, 'json');

            $errors = $validatorInterface->validate($product);

            if (count($errors) > 0) {
                $errorValidationConstraints = new ErrorValidationConstraints($errors);
                return $this->json($errorValidationConstraints->getAllMessage(), Response::HTTP_BAD_REQUEST);
            }

            // Save Product into database
            $productRepository->add($product, true);

            // Return Product and status code 201
            return $this->json($product, Response::HTTP_CREATED, [], ["groups" => ["read:Product:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Delete a Product
     */
    #[Route('/delete/{id<\d+>}', name: 'app_product_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Delete a Product",
        description: "Deleting a Product object identified by Product ID",
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

        if ($this->isGranted('ROLE_ADMIN')) {

            // Remove Product into database
            $productRepository->remove($product, true); //? Check method remove

            // Return status code 204
            return $this->json(null, Response::HTTP_NO_CONTENT);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }
}

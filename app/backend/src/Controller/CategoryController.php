<?php

namespace App\Controller;

use App\Entity\Category;
use App\Models\ErrorValidationConstraints;
use App\Repository\CategoryRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[OA\Tag('Category')]
#[Route('/api/category')]
class CategoryController extends AbstractController
{
    /**
     * Browse all Categories
     */
    #[Route('/', name: 'app_category_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Browse all Categories",
        description: "Receive all Category objects",
    )]
    #[OA\Response(
        response: 200,
        description: "Success - OK",
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(ref: new Model(type: Category::class, groups: ['read:Category:item']))
        ),
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
    public function browse(Request $request, CategoryRepository $categoryRepository): JsonResponse
    {
    // Parameters into query
    if ($request->query->all() !== []) {

        // Parameter "name"
        if (array_key_exists('name', $request->query->all())) {

            // Find all Category by name
            $result = $categoryRepository->findCategoryByName($request->query->all()['name']);

            if ($result !== []) {
                return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Category:item"]]);
            } else {
                return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);
            }
        }
    }

    $categories = $categoryRepository?->findAll();

    // Return status code 500 if $categories is empty
    if ($categories === null) {
        return $this->json(["code" => 500, "message" => "Internal Server Error"], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return $this->json($categoryRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Category:item"]]);
}

    /**
     * Read a Category
     */
    #[Route('/{id<\d+>}', name: 'app_category_read', methods: ['GET'])]
    #[OA\Get(
        summary: "Read a Category",
        description: "Reading a Category object identified by ID",
    )]
    #[OA\Response(
        response: 200,
        description: "Success - OK",
        content: new Model(type: Category::class, groups: ['read:Category:item'])
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
                new OA\Property(property: "message", example: "No Category was found")
            ]
        )
    )]
    public function read(Category $category = null): JsonResponse
    {
        // Return status code 404 if $category is empty
        if ($category === null) {
            return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);
        }

        // Return Category and status code 200
        return $this->json($category, Response::HTTP_OK, [], ["groups" => ["read:Category:item"]]);
    }

    /**
     * Edit a Category
     */
    #[Route('/edit/{id<\d+>}', name: 'app_category_edit', methods: ['PATCH'])]
    #[OA\Patch(
        summary: "Edit a Category",
        description: "Editing a Category identified by ID",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "name", example: "Grandiose"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 202,
        description: "Success - Accepted",
        content: new Model(type: Category::class, groups: ['read:Category:item'])
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
                new OA\Property(property: "message", example: "No Category was found")
            ]
        )
    )]
    public function edit(Category $category = null, Request $request, SerializerInterface $serializerInterface, CategoryRepository $categoryRepository): JsonResponse
    {
        if ($category === null) {
            return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);
        }

        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Deserialzation with entity Category and object Category in context, check and insert new modification
            $serializerInterface->deserialize($json, Category::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $category]);

            $category->setUpdatedAt(new \DateTimeImmutable());

            // Save Category into database
            $categoryRepository->add($category, true);

            // Return Category and status code 202
            return $this->json($category, Response::HTTP_ACCEPTED, [], ["groups" => ["read:Category:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Add a Category
     */
    #[Route('/add', name: 'app_category_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add a Category",
        description: "Adding new category object",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "name", example: "Grandiose"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 201,
        description: "Success - Created",
        content: new Model(type: Category::class, groups: ['read:Category:item'])
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
    public function add(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface, CategoryRepository $categoryRepository): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Return status code 400 if $json is empty
            if ($json === "") {
                return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
            }

            // Deserialization with entity Product, insert field
            $category = $serializerInterface->deserialize($json, Category::class, 'json');

            $errors = $validatorInterface->validate($category);

            if (count($errors) > 0) {
                $errorValidationConstraints = new ErrorValidationConstraints($errors);
                return $this->json($errorValidationConstraints->getAllMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Save Category into database
            $categoryRepository->add($category, true);

            // Return Category and status code 200
            return $this->json($category, Response::HTTP_CREATED, [], ["groups" => ["read:Category:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    /**
     * Delete a Category
     */
    #[Route('/delete/{id<\d+>}', name: 'app_category_delete', methods: ['DELETE'])]
    #[OA\Delete(
        summary: "Delete a Category",
        description: "Deleting a Category object",
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
                new OA\Property(property: "message", example: "No Category was found")
            ]
        )
    )]
    public function delete(Category $category = null, CategoryRepository $categoryRepository): JsonResponse
    {
        // Return status code 404 if $category is empty
        if ($category === null) {
            return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);
        }

        if ($this->isGranted('ROLE_ADMIN')) {

            // Remove Order into database
            $categoryRepository->remove($category, true);

            // Return status code 204
            return $this->json(null, Response::HTTP_NO_CONTENT);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }
}

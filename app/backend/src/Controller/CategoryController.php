<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/category')]
class CategoryController extends AbstractController
{
    // List all the Categories
    #[Route('/', name: 'app_category_browse', methods: 'GET')]
    public function browse(CategoryRepository $categoryRepository): JsonResponse
    {
        return $this->json($categoryRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Category:item"]]);
    }

    // Show a Category
    #[Route('/{id<\d+>}', name: 'app_category_read', methods: ['GET'])]
    public function read(Category $category = null): JsonResponse
    {
        // Return status code 404 if $category is empty
        if ($category === null) { return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);}

        // Return Category and status code 200
        return $this->json($category, Response::HTTP_OK, [], ["groups" => ["read:Category:item"]]);
    }

    // Update a Category
    #[Route('/edit/{id<\d+>}', name: 'app_category_edit', methods: ['PATCH'])]
    public function edit(Category $category = null, Request $request, SerializerInterface $serializerInterface, CategoryRepository $categoryRepository): JsonResponse
    {
        if ($category === null) { return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);}

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

    // Create a Category
    #[Route('/add', name: 'app_category_add', methods: ['POST'])]
    public function add(Request $request, SerializerInterface $serializerInterface, CategoryRepository $categoryRepository): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") { return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);}

        // Deserialization with entity Product, insert field
        $category = $serializerInterface->deserialize($json, Category::class, 'json');

        // Save Category into database
        $categoryRepository->add($category, true);

        // Return Category and status code 200
        return $this->json($category, Response::HTTP_CREATED, [], ["groups" => ["read:Category:item"]]);
    }

    // Remove a Category
    #[Route('/delete/{id<\d+>}', name: 'app_category_delete', methods: ['DELETE'])]
    public function delete(Category $category = null, CategoryRepository $categoryRepository): JsonResponse
    {
        // Return status code 404 if $category is empty
        if ($category === null) { return $this->json(["code" => 404, "message" => "No Category was found"], Response::HTTP_NOT_FOUND);}

        // Remove Order into database
        $categoryRepository->remove($category, true);

        // Return status code 204
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

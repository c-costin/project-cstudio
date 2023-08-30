<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/product')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product_browse', methods: 'GET')]
    public function browse(ProductRepository $productRepository): JsonResponse
    {
        // Return all Product
        return $this->json($productRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/{id<\d+>}', name: 'app_product_read', methods: ['GET'])]
    public function read(Product $product = null): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) { return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);}

        // Return Product and status code 200
        return $this->json($product, Response::HTTP_OK, [], ["groups" => ["read:Product:item"]]);
    }

    #[Route('/edit/{id<\d+>}', name: 'app_product_edit', methods: ['PATCH'])]
    public function edit(Request $request, SerializerInterface $serializerInterface, Product $product = null, ProductRepository $productRepository): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) { return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);}

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
    public function add(Request $request, SerializerInterface $serializerInterface, ProductRepository $productRepository): JsonResponse
    {
        // Get Request Body
        $json = $request->getContent();

        // Return status code 400 if $json is empty
        if ($json === "") { return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);}

        // Deserialization with entity Product, insert field
        $product = $serializerInterface->deserialize($json, Product::class, 'json');

        // Save Product into database
        $productRepository->add($product, true);

        // Return Product and status code 201
        return $this->json($product, Response::HTTP_CREATED, [], ["groups" => ["read:Review:item"]]);
    }

    #[Route('/delete/{id<\d+>}', name: 'app_product_delete', methods: ['DELETE'])]
    public function delete(Product $product = null, ProductRepository $productRepository): JsonResponse
    {
        // Return status code 404 if $product is empty
        if ($product === null) { return $this->json(["code" => 404, "message" => "No Product was found"], Response::HTTP_NOT_FOUND);}

        // Remove Review into database
        $productRepository->remove($product, true); //? Check method remove

        // Return status code 204
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}

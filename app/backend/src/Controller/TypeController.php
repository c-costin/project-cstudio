<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\TypeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/type')]
class TypeController extends AbstractController
{
    // List all the Types
    #[Route('/', name: 'app_type_browse', methods: 'GET')]
    public function browse(TypeRepository $typeRepository): JsonResponse
    {
        return $this->json($typeRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Type:item"]]);
    }

    // Show a Type
    #[Route('/{id<\d+>}', name: 'app_type_read', methods: ['GET'])]
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

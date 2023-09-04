<?php

namespace App\Controller;

use App\Service\FileService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag("File")]
#[Route("/api/file")]
class FileController extends AbstractController
{
    #[Route('/add', name: 'app_file_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add a File",
        description: "Adding a new File. Examples: Images, Pictures, etc..",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "multipart/form-data",
                schema: new OA\Schema(
                    type: "object",
                    properties: [
                        new OA\Property(property: "pathname", type: "file")
                    ]
                )
            )
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
    public function add(FileService $fileService): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Adding file with FileService
            $fileService->add($_FILES);

            return $this->json(null, Response::HTTP_NO_CONTENT);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }

    #[Route('/delete', name: 'app_file_delete', methods: ['POST'])]
    #[OA\Post(
        summary: "Delete a File",
        description: "Deleting a File",
    )]
    #[OA\Parameter(
        name: "file",
        description: "file name",
        in: "query",
        required: true
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
    public function delete(Request $request, FileService $fileService): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Parameters into query
            if ($request->query->all() !== []) {

                // Parameter "file"
                if (array_key_exists('file', $request->query->all())) {

                    $fileService->delete($request->query->all()["file"]);

                    return $this->json(null, Response::HTTP_NO_CONTENT);
                }

                return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
            }

            return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }
}

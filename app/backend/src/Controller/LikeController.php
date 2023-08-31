<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/like')]
class LikeController extends AbstractController
{
    #[Route('/', name: 'app_like_browse', methods: 'GET')]
    public function browse(Request $request,): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
            if (array_key_exists("user", $request->query->all())) {

                $result = []; //TODO Make find method into like service

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, []); //TODO Find solution for serialization
                } else {
                    return $this->json(["code" => 404, "message" => "No Like was found"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        // Return status code 400 if empty parameters into query
        return $this->json(["code" => 400, "message" => "Bad request"], Response::HTTP_NOT_FOUND);
    }

    #[Route('/add', name: 'app_like_add', methods: 'GET')]
    public function add(Request $request): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {
            if (array_key_exists("product", $request->query->all()) && array_key_exists("user", $request->query->all())) {

                $result = []; //TODO Make find method into like service

                if ($result !== []) {
                    return $this->json($result, Response::HTTP_OK, []); //TODO Find solution for serialization
                } else {
                    return $this->json(["code" => 404, "message" => "No Like was found"], Response::HTTP_NOT_FOUND);
                }
            }
        }

        // Return status code 400 if empty parameters into query
        return $this->json(["code" => 400, "message" => "Bad request"], Response::HTTP_NOT_FOUND);
    }

    #[Route('/delete', name: 'app_like_delete', methods: 'GET')]
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

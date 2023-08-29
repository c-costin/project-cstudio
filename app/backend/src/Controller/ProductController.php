<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/product')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product_browse', methods: 'GET')]
    public function browse(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route('/{id<\d+>}', name: 'app_product_read', methods: ['GET'])]
    public function read(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route('/edit/{id<\d+>}', name: 'app_product_edit', methods: ['PATCH'])]
    public function edit(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route('/add', name: 'app_product_add', methods: ['POST'])]
    public function add(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route('/delete/{id<\d+>}', name: 'app_product_delete', methods: ['DELETE'])]
    public function delete(): JsonResponse
    {
        return $this->json([]);
    }
}

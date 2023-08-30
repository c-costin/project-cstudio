<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/order')]
class OrderController extends AbstractController
{
    // List the collection of Orders
    #[Route('/', name: 'app_order_browse', methods: 'GET')]
    public function browse(Request $request, OrderRepository $orderRepository): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {

            // Parameter "user"
            if (array_key_exists('user', $request->query->all())) {

                // Find all Orders by User ID
                $result = $orderRepository->findOrderByUserId($request->query->all()['user']);

                return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Order:item"]]);
            } else {
                return $this->json(["code" => 404, "message" => "No Order was found"], Response::HTTP_NOT_FOUND);
            }
        }

        // Check permission for browse all Orders
        // if ($this->isGranted("ROLE_ADMIN")) {
        //     return $this->json($orderRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Order:item"]]);
        // } else {
        //     return $this->json(["code" => 403, "message" => "Access Denied"], Response::HTTP_FORBIDDEN);
        // }
    }

    // Show an Order
    #[Route('/{id<\d+>}', name: 'app_order_read', methods: ['GET'])]
    public function read(Order $order = null): JsonResponse
    {
        // Return status code 404 if $order is empty
        if ($order === null) {
            return $this->json(["code" => 404, "message" => "No Order was found"], Response::HTTP_NOT_FOUND);
        }

        // Return Order and status code 200
        return $this->json($order, Response::HTTP_OK, [], ["groups" => ["read:Order:item"]]);
    }

}

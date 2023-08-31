<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[OA\Tag('Order')]
#[Route('/api/order')]
class OrderController extends AbstractController
{
    // List the collection of Orders
    #[Route('/', name: 'app_order_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Retrieve the collection of Order resources",
        description: "Retrieve the collection of Order",
    )]
    #[OA\Parameter(
        name: "user",
        description: "User ID",
        in: "query"
    )]
    #[OA\Response(
        response: 200,
        description: "Success without parameter",
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(ref: new Model(type: Order::class, groups: ['read:Order:item']))
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
                new OA\Property(property: "message", example: "No Order was found")
            ]
        )
    )]
    public function browse(Request $request, OrderRepository $orderRepository): JsonResponse
    {
        // Parameters into query
        if ($request->query->all() !== []) {

            // Parameter "user"
            if (array_key_exists('user', $request->query->all())) {

                // Find all Orders by User ID
                $result = $orderRepository->findOrdersByUserId($request->query->all()['user']);

                return $this->json($result, Response::HTTP_OK, [], ["groups" => ["read:Order:item"]]);
            } else {
                return $this->json(["code" => 404, "message" => "No Order was found"], Response::HTTP_NOT_FOUND);
            }
        }

        // Check permission for browse all Orders
        // if ($this->isGranted("ROLE_ADMIN")) {
            return $this->json($orderRepository->findAll(), Response::HTTP_OK, [], ["groups" => ["read:Order:item"]]);
        // } else {
        //     return $this->json(["code" => 403, "message" => "Access Denied"], Response::HTTP_FORBIDDEN);
        // }
    }
}

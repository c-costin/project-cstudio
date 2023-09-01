<?php

namespace App\Controller;

use App\Entity\Order;
use OpenApi\Attributes as OA;
use App\Repository\OrderRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Models\ErrorValidationConstraints;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[OA\Tag('Order')]
#[Route('/api/order')]
class OrderController extends AbstractController
{
    /**
     * Browse all Orders
     */
    #[Route('/', name: 'app_order_browse', methods: 'GET')]
    #[OA\Get(
        summary: "Browse all Orders",
        description: "Receive all objects in the category or all orders from the user identified by the user ID",
    )]
    #[OA\Parameter(
        name: "user",
        description: "User ID",
        in: "query"
    )]
    #[OA\Response(
        response: 200,
        description: "Success - OK",
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

    /**
     * Add an Order
     */
    #[Route('/add', name: 'app_order_add', methods: ['POST'])]
    #[OA\Post(
        summary: "Add an Order",
        description: "Adding a new Order object",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(property: "name", example: "OS01"),
                    ]
                )
            )
        )
    )]
    #[OA\Response(
        response: 201,
        description: "Success - Created",
        content: new Model(type: Order::class, groups: ['read:Order:item'])
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
    public function add(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface, OrderRepository $orderRepository): JsonResponse
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            // Get Request Body
            $json = $request->getContent();

            // Return status code 400 if $json is empty
            if ($json === "") {
                return $this->json(["code" => 400, "message" => "Invalid JSON"], Response::HTTP_BAD_REQUEST);
            }

            // Deserialization with entity Order, insert field
            $order = $serializerInterface->deserialize($json, Order::class, 'json');

            $errors = $validatorInterface->validate($order);

            if (count($errors) > 0) {
                $errorValidationConstraints = new ErrorValidationConstraints($errors);
                return $this->json($errorValidationConstraints->getAllMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Save Order into database
            $orderRepository->add($order, true);

            // Return Order and status code 200
            return $this->json($order, Response::HTTP_CREATED, [], ["groups" => ["read:Order:item"]]);
        }

        return $this->json(["code" => 403, "message" => "Forbidden"], Response::HTTP_FORBIDDEN);
    }
}

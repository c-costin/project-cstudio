<?php
namespace App\Service;

use App\Entity\Order;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    public function __construct(
        private ProductRepository $productRepository,
        private UserRepository $userRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    public function create(array $data, object $user): ?object
    {
        $order = new Order();
        $order->setNumber(mt_rand(10000000, 99999999));
        $order->setUser($user);

        $date = new \DateTimeImmutable();
        $date = $date->add(new \DateInterval('P14D'))->format('d-m-Y');

        $order->setDeliveryDate($date);

        $articles = $data["products"];

        foreach ($articles as $article) {
            $product = $this->productRepository->find($article["product"]);
            $product->setStock($product->getStock() - $article["quantity"]);
            $order->addProduct($product);
        }

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        return $order;
    }
}
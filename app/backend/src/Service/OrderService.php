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

    public function create(array $data, object $user): bool
    {
        $order = new Order();
        $order->setNumber(mt_rand(10000000, 99999999));
        $order->setUser($user);

        $this->entityManager->flush();

        return true;
    }
}
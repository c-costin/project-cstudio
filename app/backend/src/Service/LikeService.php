<?php
namespace App\Service;

use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class LikeService
{
    public function __construct(
        private ProductRepository $productRepository,
        private UserRepository $userRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    public function findAll(int $user): ?array
    {
        return $this->productRepository->findAllLikeByUserId($user);
    }

    public function find(int $product, int $user): ?object
    {
        return $this->productRepository->findLike($product, $user);
    }

    public function add(int $product, int $user): bool
    {
        $productAddLike = $this->productRepository->find($product);
        $userAddLike = $this->userRepository->find($user);

        $productAddLike->addUser($userAddLike);
        $this->entityManager->flush();

        return true;
    }

    public function delete(int $product, int $user): bool
    {
        $productAddLike = $this->productRepository->find($product);
        $userAddLike = $this->userRepository->find($user);

        $productAddLike->removeUser($userAddLike);
        $this->entityManager->flush();

        return true;
    }
}
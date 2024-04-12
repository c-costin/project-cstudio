<?php
namespace App\Service;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

class FileService
{
    public function __construct(
        private $uploadPath,
        private ProductRepository $productRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    public function add(array $file): bool
    {
        $fileName = urlencode($file["product"]["name"]);

        move_uploaded_file($file["product"]["tmp_name"], "{$this->uploadPath}/product/{$fileName}");

        return true;
    }

    public function delete(string $fileName)
    {
        unlink("{$this->uploadPath}/{$fileName}");

        return true;
    }
}
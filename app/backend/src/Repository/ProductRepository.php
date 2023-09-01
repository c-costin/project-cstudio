<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // Find Product by name

    public function findProductByName(string $keyword): ?array
    {
        return $this->createQueryBuilder('p')
            ->where("p.name LIKE :keyword")
            ->setParameter('keyword', "%{$keyword}%")
            ->getQuery()
            ->getResult();
    }

    // Find Product by type

    public function findProductByType(string $keyword): ?array
    {
        $sql = "
            SELECT
                product.name
            FROM product
            LEFT JOIN type ON product.type_id = type.id
            WHERE product.name LIKE :keyword;
        ";

        $connexion = $this->getEntityManager()->getConnection();
        $stmt = $connexion->prepare($sql);
        $result = $stmt->executeQuery(["keyword" => "%{$keyword}%"]);

        return $result->fetchAllAssociative();
    }

    // Find Product by category

    public function findProductByCategory(string $keyword): ?array
    {
        $sql = "
            SELECT
                product.name
            FROM product
            LEFT JOIN category ON product.category_id = category.id
            WHERE product.name LIKE :keyword;
        ";

        $connexion = $this->getEntityManager()->getConnection();
        $stmt = $connexion->prepare($sql);
        $result = $stmt->executeQuery(["keyword" => "%{$keyword}%"]);

        return $result->fetchAllAssociative();
    }

    //    /**
    //     * @return Product[] Returns an array of Product objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Product
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

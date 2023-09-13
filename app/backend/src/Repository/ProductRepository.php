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

    public function findAllLikeByUserId(int $id): ?array
    {
        $connexion = $this->getEntityManager()->getConnection();

        $sql  = "
            SELECT * 
            FROM product 
            LEFT JOIN product_user ON product.id = product_user.product_id 
            WHERE product_user.user_id = :id;
        ";

        $result = $connexion->executeQuery($sql, ["id" => $id]);

        return $result->fetchAllAssociative();
    }

    public function findLike(int $product, int $user): ?object
    {
        $connexion = $this->getEntityManager()->getConnection();

        $sql  = "
            SELECT *
            FROM product
            LEFT JOIN product_user ON product.id = product_user.product_id
            WHERE product_user.product_id = :product and product_user.user_id = :user;
        ";

        return $connexion->executeQuery($sql, ["product" => $product, "user" => $user]);
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

    // Find Product by Type Id
    public function findProductByTypeId(int $id): ?array
    {
        $sql = "
            SELECT
                *
            FROM product
            LEFT JOIN type ON product.type_id = type.id
            WHERE type.id LIKE :id;
        ";

        $connexion = $this->getEntityManager()->getConnection();
        $stmt = $connexion->prepare($sql);
        $result = $stmt->executeQuery(["id" => $id]);

        return $result->fetchAllAssociative();
    }

    // Find Product by Category Id
    public function findProductByCategoryId(int $id): ?array
    {
        $sql = "
            SELECT
                *
            FROM product
            LEFT JOIN product_category ON product_category.product_id = product.id
            WHERE product_category.category_id LIKE :id;
        ";

        $connexion = $this->getEntityManager()->getConnection();
        $stmt = $connexion->prepare($sql);
        $result = $stmt->executeQuery(["id" => $id]);

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

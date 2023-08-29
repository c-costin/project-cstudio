<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

use function Symfony\Component\Clock\now;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    private $connection;

    /**
     * Constructor
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    private function truncate()
    {
        $this->connection->executeQuery('PRAGMA foreign_keys = ON');
        $this->connection->executeQuery('Delete from category');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'category'");
        $this->connection->executeQuery('Delete from "order"');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'order'");
        $this->connection->executeQuery('Delete from product');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'product'");
        $this->connection->executeQuery('Delete from type');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'type'");
        $this->connection->executeQuery('Delete from user');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'user'");
    }

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');

        // Truncate Database
        $this->truncate();

        // TYPE
        $allType = ["tableau", "dessin", "sculpture", "photographie"];
        $types = [];

        for ($i = 0; $i < 4; $i++) {
            $type = new Type();
            $type->setName($allType[$i])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable());
            $types[] = $type;

            $manager->persist($type);
        }

        // CATEGORY
        $allCategory = ["portrait", "nature", "animaux", "culture", "cinéma", "musique", "paysage", "abstrait"];
        $categories = [];

        for ($i = 0; $i < 8; $i++) {
            $category = new Category();
            $category->setName($allCategory[$i])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable());
            $categories[] = $category;

            $manager->persist($category);
        }


        // USER
        $users = [];
        for ($i=0; $i < 50 ; $i++) { 
            $user = new User();
            $user->setName($this->faker->lastName())
                ->setFirstname($this->faker->firstName())
                ->setRoles(["ROLE_USER"])
                ->setPassword($this->faker->password())
                ->setPhone($this->faker->phoneNumber())
                ->setAddress($this->faker->address())
                ->setEmail($this->faker->email())
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable());
            $users[] = $user;

            $manager->persist($user);
        }

        // PRODUCT
        $products = [];
        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product->setTitle($this->faker->word(3, true))
                ->setDescription($this->faker->sentence(9))
                ->setDimensions($this->faker->numberBetween(10, 50) . 'cm' . 'x' . $this->faker->numberBetween(10, 50) . 'cm')
                ->setPrice(mt_rand(100, 5000) . '€')
                ->setPicture($this->faker->word(1, true))
                ->setReleaseDate(mt_rand(1950, 2023))
                ->setArtist($this->faker->name())
                ->setStock($this->faker->randomDigitNotNull())
                ->setType($types[array_rand($types)])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable());
            $products[] = $product;

            $manager->persist($product);
        }

         // ORDER
         for ($i=0; $i < 50 ; $i++) { 
             $order = new Order();
             $date = $this->faker->dateTimeBetween('now', '+1 month');
             $result = $date->format('Y-m-d');
             $order->setNumber($this->faker->randomNumber(8, true))
                 ->setDeliveryDate($result)
                 ->setUser($users[array_rand($users)])
                 ->addProduct($products[array_rand($products)])
                 ->setCreatedAt(new \DateTimeImmutable())
                 ->setUpdatedAt(new \DateTimeImmutable());
 
             $manager->persist($order);
         }

        $manager->flush();
    }
}

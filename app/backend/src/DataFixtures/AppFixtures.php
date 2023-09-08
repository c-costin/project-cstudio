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

class AppFixtures extends Fixture
{
    private $connection;

    // Set providers
    private array $categoryProviders = ["portrait", "nature", "animaux", "culture", "cinéma", "musique", "paysage", "abstrait"];
    private array $typeProviders = ["tableau", "dessin", "sculpture", "photographie"];

    // Set empty array
    private array $categories = [];
    private array $types = [];
    private array $products = [];
    private array $users = [];

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    private function truncate()
    {
        $this->connection->executeQuery('PRAGMA foreign_keys = ON');
        $this->connection->executeQuery('Delete from category');
        $this->connection->executeQuery('Delete from "order"');
        $this->connection->executeQuery('Delete from product');
        $this->connection->executeQuery('Delete from type');
        $this->connection->executeQuery('Delete from user');
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'category'");
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'order'");
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'product'");
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'type'");
        $this->connection->executeQuery("UPDATE sqlite_sequence SET seq = 0 WHERE name = 'user'");
    }

    public function load(ObjectManager $manager): void
    {
        // Truncate Database
        $this->truncate();

        // Instanciation FakerPHP
        $faker = Factory::create("fr_FR");
        
        // Dataset seed
        $faker->seed(428);

        // Create Admin user
        $adminUser = new User();

        // Set properties
        $adminUser->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('admin@mail.com')
            ->setRoles("ROLE_ADMIN")
            ->setPassword(password_hash('admin', PASSWORD_BCRYPT))
            ->setPhone('')
            ->setAddress('');

        // Insert into array
        $this->users[] = $adminUser;

        $manager->persist($adminUser);

        // Instanciation FakerPHP
        $faker = Factory::create("fr_FR");

        // => Loop for generation Users
        for ($i = 0; $i <= 100; $i++) {

            // Create new User
            $user = new User();

            // Set properties
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $email = mb_strtolower($firstName).".".mb_strtolower($lastName) . "@mail.com";
            $user->setFirstName($firstName)
                ->setLastName($lastName)
                ->setEmail($email)
                ->setRoles("ROLE_USER")
                ->setPassword(password_hash('user', PASSWORD_BCRYPT))
                ->setPhone($faker->phoneNumber())
                ->setAddress($faker->address());

            $this->users[] = $user;

            $manager->persist($user);
        }

        // => Loop for generation Categories
        for ($i = 0; $i < (count($this->categoryProviders) - 1); $i++) {

            // Create new Category
            $category = new Category();

            // Set property
            $category->setName($this->categoryProviders[$i]);

            // Insert into array
            $this->categories[] = $category;

            $manager->persist($category);
        }

        // => Loop for generation Types
        for ($i = 0; $i <= (count($this->typeProviders) - 1); $i++) {

            // Create new Type
            $type = new Type();

            // Set property
            $type->setName($this->typeProviders[$i]);

            // Insert to array
            $this->types[] = $type;

            $manager->persist($type);
        }

        // => Loop for generation products
        for ($i = 0; $i < 50; $i++) {

            // Create new Product
            $product = new Product();

            // Declare variables
            $releaseDate = $faker->dateTimeBetween('-2000 years', 'now');
            $releaseDateToString = $releaseDate->format('Y');

            // Set properties
            $product->setTitle($faker->word(3, true))
                ->setDescription($faker->sentence(9))
                ->setDimensions($faker->numberBetween(10, 50) . 'cm' . 'x' . $faker->numberBetween(10, 50) . 'cm')
                ->setPrice(mt_rand(100, 10000000). '€')
                ->setPicture('http://localhost:8000/img/...')
                ->setReleaseDate($releaseDateToString)
                ->setArtist($faker->name())
                ->setStock(mt_rand(1, 100))
                ->setType($this->types[array_rand($this->types)])
                ->addCategory($this->categories[array_rand($this->categories)]);

            $this->products[] = $product;

            $manager->persist($product);
        }

        // => Loop for generation Orders
        for ($i = 0; $i <= 600; $i++) {

            // Create new Order
            $order = new Order();

            // Declare variables
            $date = $faker->dateTimeBetween('+2 week', '+1 month');
            $dateToString = $date->format('Y-m-d');

            // Set properties
            $order->setNumber($faker->randomNumber(8, true))
                ->setDeliveryDate($dateToString)
                ->setUser($this->users[array_rand($this->users)])
                ->addProduct($this->products[array_rand($this->products)]);

            $manager->persist($order);
        }

        // => Loop for generation Likes
        for ($i=0; $i < 460; $i++) { 
            $product = $this->products[array_rand($this->products)];
            $product->addUser($this->users[array_rand($this->users)]);
        }

        $manager->flush();
    }
}

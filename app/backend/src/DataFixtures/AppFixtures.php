<?php

namespace App\DataFixtures;

use App\DataFixtures\Provider\IllustrationProvider;
use App\DataFixtures\Provider\PhotographyProvider;
use App\DataFixtures\Provider\ProductProvider;
use App\DataFixtures\Provider\SculptureProvider;
use App\DataFixtures\Provider\TableauProvider;
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
    // Set providers
    private array $categoryProviders = ["portrait", "animaux", "culture", "musique", "paysage", "abstrait"];
    private array $typeProviders = ["tableau", "dessin", "sculpture", "photographie"];

    // Set empty array
    private array $categories = [];
    private array $types = [];
    private array $products = [];
    private array $users = [];
    private array $productsRand = [];

    public function __construct(
        private Connection $connection
    ) {
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
        $faker->seed(408);

        // Adding providers
        $faker->addProvider(new IllustrationProvider($faker));
        $faker->addProvider(new PhotographyProvider($faker));
        $faker->addProvider(new SculptureProvider($faker));
        $faker->addProvider(new TableauProvider($faker));

        // Create Admin user
        $adminUser = new User();

        // Set properties
        $adminUser->setFirstName('Admin')
            ->setLastName('')
            ->setEmail('admin@cstudio.fr')
            ->setRoles("ROLE_ADMIN")
            ->setPassword(password_hash('admin', PASSWORD_BCRYPT))
            ->setPhone('')
            ->setAddress('');

        $manager->persist($adminUser);

        // Create Manager user
        $managerUser = new User();

        // Set properties
        $managerUser->setFirstName('Manager')
            ->setLastName('')
            ->setEmail('manager@cstudio.fr')
            ->setRoles("ROLE_ADMIN")
            ->setPassword(password_hash('manager', PASSWORD_BCRYPT))
            ->setPhone('')
            ->setAddress('');

        $manager->persist($managerUser);

        // => Loop for generation Users
        for ($i = 0; $i <= 50; $i++) {

            // Create new User
            $user = new User();

            // Set properties
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $email = mb_strtolower($firstName) . "." . mb_strtolower($lastName) . "@mail.com";
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
        for ($i = 0; $i <= (count($this->categoryProviders) - 1); $i++) {

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

        $providersArtworks = [
            $faker->getIllustrationAnimalsPicture(),
            $faker->getIllustrationCulturePicture(),
            $faker->getIllustrationPortraitPicture(),
            $faker->getPhotographyAnimalsPicture(),
            $faker->getPhotographyMusicPicture(),
            $faker->getPhotographyLandscapePicture(),
            $faker->getPhotographyPortraitPicture(),
            $faker->getSculptureAnimalsPicture(),
            $faker->getSculpturePortraitPicture(),
            $faker->getTableauAbstractPicture(),
            $faker->getTableauAnimalsPicture(),
            $faker->getTableauCulturePicture(),
            $faker->getTableauLandscapePicture(),
            $faker->getTableauPortraitPicture()
        ];

        $artworksTypes = [];
        foreach ($providersArtworks as $providersArtwork) {
            foreach ($providersArtwork as $product) {
                $artworksTypes[] = $product;
            }
        }

        // Shuffle array
        shuffle($artworksTypes);

        // => Loop for generation Products
        for ($i = 0; $i <= (count($artworksTypes) - 1); $i++) {
            // Create new Product
            $product = new Product();
            $type;
            $category;

            foreach ($this->types as $typeEntity) {
                if ($typeEntity->getName() === $artworksTypes[$i]['type']) {
                    $type = $typeEntity;
                }
            }

            foreach ($this->categories as $categoryEntity) {
                if ($categoryEntity->getName() === $artworksTypes[$i]['category']) {
                    $category = $categoryEntity;
                }
            }

            // Set properties
            $product->setTitle($faker->firstName())
                ->setDescription($faker->sentence(9))
                ->setDimensions($artworksTypes[$i]['dimensions'])
                ->setPrice($artworksTypes[$i]['price'])
                ->setPicture($artworksTypes[$i]['img'])
                ->setReleaseDate($artworksTypes[$i]['date'])
                ->setArtist($faker->name())
                ->setStock(mt_rand(1, 10))
                ->setType($type)
                ->addCategory($category);

            // Insert to array
            $this->products[] = $product;

            $manager->persist($product);
        }

        // => Loop for generation Orders
        for ($i = 0; $i <= 200; $i++) {

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
        for ($i = 0; $i < 460; $i++) {
            $product = $this->products[array_rand($this->products)];
            $product->addUser($this->users[array_rand($this->users)]);
        }

        $manager->flush();
    }
}

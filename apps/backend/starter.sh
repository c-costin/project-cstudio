#!/bin/bash
# Install Symfony bundles
composer install

# Creation keys JWT
php bin/console lexik:jwt:generate-keypair

# Creation Database
php bin/console doctrine:database:create -n

# Insert tables into database
php bin/console doctrine:migrations:migrate -n

# Insert fixture into database
php bin/console doctrine:fixtures:load -n
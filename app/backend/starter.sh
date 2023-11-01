#!/bin/bash
# Install Symfony bundles
composer install

# Creation keys JWT
php bin/console lexik:jwt:generate-keypair

# Creation Database
bin/console doctrine:database:create -n

# Insert tables into database
bin/console doctrine:migrations:migrate -n

# Insert fixture into database
bin/console doctrine:fixtures:load -n
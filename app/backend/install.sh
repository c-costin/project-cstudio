#!/bin/bash
# Creation symfony project
composer create-project symfony/skeleton:"6.3.*" install

# Move directory project
mv ./install/* ./install/.* .
rmdir ./install/

# Require bundle env:DEV
composer require --dev symfony/var-dumper
composer require --dev symfony/maker-bundle

# Require bundle env:PROD
composer require symfony/security-bundle
composer require symfony/rate-limiter
composer require symfony/validator
composer require symfony/serializer
composer require symfony/serializer-pack
composer require lexik/jwt-authentication-bundle
composer require twig
composer require asset
composer require nelmio/api-doc-bundle
composer require nelmio/cors-bundle
composer require symfony/orm-pack:^2.1 -W
composer require doctrine/doctrine-fixtures-bundle
composer require fakerphp/faker

# Creation keys JWT
php bin/console lexik:jwt:generate-keypair
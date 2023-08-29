# Symfony
composer create-project symfony/skeleton:"^5.4" install

mv ./install/* ./install/.* .
rmdir ./install/

## Bundle env:DEV
composer require --dev symfony/profiler-pack
composer require --dev symfony/var-dumper
composer require --dev symfony/debug-bundle
composer require --dev symfony/maker-bundle

## Bundle env:PROD
composer require symfony/security-bundle
composer require symfony/rate-limiter
composer require annotations
composer require twig
composer require symfony/asset
composer require nelmio/api-doc-bundle
composer require symfony/validator
composer require symfony/serializer
composer require lexik/jwt-authentication-bundle
composer require symfony/apache-pack
composer require orm-fixtures
composer require fakerphp/faker


composer require symfony/orm-pack

# React
npx create-react-app c-studio
cd c-studio
npm start
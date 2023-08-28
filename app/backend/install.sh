composer create-project symfony/skeleton:"6.3.*" install

mv ./install/* ./install/.* .
rmdir ./install/

# Bundle env:DEV
composer require --dev symfony/var-dumper
composer require --dev symfony/maker-bundle

# Bundle env:PROD
composer require symfony/security-bundle
composer require symfony/rate-limiter
composer require symfony/validator
composer require symfony/serializer
composer require lexik/jwt-authentication-bundle
composer require nelmio/api-doc-bundle
composer require symfony/orm-pack:^2.1 -W
composer require doctrine/doctrine-fixtures-bundle
composer require fakerphp/faker
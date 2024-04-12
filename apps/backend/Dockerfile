FROM php@sha256:b15e71c6d9e549d4b69d4200a6f9d49386c5ae617c38e27fc79dc146dc7fd407

# Install depencies
RUN set -ex \
    && apk --no-cache add

# Install depencies
RUN docker-php-ext-install pdo pdo_mysql

# Add script PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install PHP extensions
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http

# Check update and adding bash + git
RUN apk --no-cache update && apk --no-cache add bash && apk --no-cache add git

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

# Install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && apk add symfony-cli

WORKDIR /var/www/
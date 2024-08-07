FROM php:8.1-cli

RUN docker-php-ext-install pdo pdo_mysql

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

CMD ["php", "vendor/bin/phpunit", "tests"]

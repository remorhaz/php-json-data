FROM php:8.0-cli

RUN apt-get update &&  apt-get install -y \
    zip \
    git \
    libicu-dev && \
    docker-php-ext-configure intl --enable-intl && \
    docker-php-ext-install intl && \
    echo "xdebug.mode = develop,coverage,debug" >> "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini"

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_PROCESS_TIMEOUT=1200

RUN curl --silent --show-error https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer
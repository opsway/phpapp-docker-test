FROM php:5.6-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libicu-dev \
        libcurl4-openssl-dev \
        nano \
    && docker-php-ext-install -j$(nproc) \
        iconv \
        mcrypt \
        mbstring \
        zip \
        intl \
        curl \
        pdo_mysql \
        tokenizer \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer |  php -- --install-dir=/usr/local/bin --filename=composer

RUN echo "date.timezone=\"UTC\"" > /usr/local/etc/php/conf.d/timezone.ini
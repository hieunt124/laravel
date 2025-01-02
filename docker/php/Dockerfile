FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y openssl zip unzip git curl
RUN apt-get install -y libzip-dev libonig-dev libicu-dev
RUN apt-get install -y autoconf pkg-config libssl-dev

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN docker-php-ext-install bcmath mbstring intl opcache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd \
                --prefix=/usr \
                --with-jpeg \
                --with-webp \
                --with-xpm \
                --with-freetype; \
        docker-php-ext-install gd

# Install Xdebug
RUN pecl install xdebug-3.1.1 && docker-php-ext-enable xdebug
# Copy Xdebug configuration file
COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 docker
RUN useradd -u 1000 -ms /bin/bash -g docker docker

COPY --chown=docker:docker . /var/www/html

USER docker

EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]

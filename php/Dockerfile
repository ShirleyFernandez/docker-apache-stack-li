ARG PHP_VERSION=""
FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
RUN apk --no-cache update \
    && apk --no-cache upgrade \
    && apk add --no-cache \
    mysql-client \
    php7-mysqli \
    php7-pdo \
    freetype \
    libpng \
    freetype-dev \
    libpng-dev \
    jpeg-dev \
    libjpeg \
    libjpeg-turbo-dev \
    wget \
    zlib-dev \
    ttf-freefont \
    fontconfig \
    xvfb \
    libxrender-dev \
    gettext \
    gettext-dev \
    libxml2-dev \
    gnu-libiconv-dev \
    autoconf \
    g++ \
    git \
    bash \
    wkhtmltopdf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf

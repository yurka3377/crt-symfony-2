FROM php:8-fpm
# FROM php:8.0.3-fpm-buster
RUN apt-get update && apt-get install -y \
        libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql pgsql

WORKDIR /var/www/public/

ARG PUID=1000
ARG PGID=1000
ENV PUID ${PUID}
ENV PGID ${PGID}

CMD ["php-fpm"]

        # libfreetype6-dev \
        # libjpeg62-turbo-dev \
        # libpng-dev \
        #     && docker-php-ext-configure gd --with-freetype --with-jpeg \
        #         && docker-php-ext-install -j$(nproc) gd \
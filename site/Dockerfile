FROM php:7.2-apache-stretch as base

WORKDIR /srv/app

COPY /site/vhost.conf /etc/apache2/sites-available/000-default.conf

ENV APACHE_DOCUMENT_ROOT /srv/app/public

# laravel dependencies
RUN apt-get update -yq \
        && apt-get install -yq libzip-dev zip libmemcached-dev zlib1g-dev mc mysql-client libwebp-dev libpng-dev libjpeg62-turbo-dev libicu-dev \
        && pecl install memcached-3.0.4 \
        && pecl install -o -f redis \
        && docker-php-ext-install mysqli \
        && docker-php-ext-install bcmath \
        && docker-php-ext-enable memcached \
        && docker-php-ext-enable redis \
        && docker-php-ext-configure zip --with-libzip \
        && docker-php-ext-install zip \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-configure intl \
        && docker-php-ext-install intl \
        && docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ --with-webp-dir=/usr/include/ \
        && docker-php-ext-install gd \
        && docker-php-ext-install exif \
        && a2enmod rewrite

COPY ./site/php.ini /usr/local/etc/php/conf.d/php.ini
COPY --chown=www-data:www-data ./src /srv/app
RUN chown -R www-data:www-data /srv/app/storage

# -------------- DEV ----------------

FROM base as dev

ARG UID=1000
ARG GID=1000

# xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./site/entrypoint.local.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.local.sh

COPY --from=composer:1.8 /usr/bin/composer /usr/bin/composer

RUN apt-get install -y gnupg graphviz \
    && curl --silent --location https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get install -qq nodejs

RUN usermod -u $UID www-data && groupmod -g $GID www-data && usermod -g $GID www-data

ENTRYPOINT ["/usr/bin/entrypoint.local.sh"]
CMD ["apache2-foreground"]

# -------------- PROD ---------------

FROM base as prod

COPY src /srv/app
COPY import_data /tmp/import_data

RUN chown -R www-data:www-data /srv/app && chmod -R 755 /srv/app
RUN chown -R www-data:www-data /tmp/import_data && chmod -R 755 /tmp/import_data

COPY ./site/entrypoint.prod.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.prod.sh

ENTRYPOINT ["/usr/bin/entrypoint.prod.sh"]
CMD ["apache2-foreground"]

FROM php:7.1-fpm-alpine

RUN php -v

RUN apk add --no-cache nginx wget

RUN mkdir -p /run/nginx

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd zip

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/download/1.10.26/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

RUN cd /app && \
    /usr/local/bin/composer install --no-dev --prefer-dist

RUN chown -R www-data: /app

RUN chmod 777 -R /app/storage


CMD sh /app/docker/startup.sh

FROM php:7.1-fpm-alpine

RUN apk add --no-cache nginx wget git

RUN mkdir -p /run/nginx

RUN mkdir -p /app

COPY . /app

#RUN rm /app/.env

#RUN cp /app/.env.docker /app/.env

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd zip pgsql pdo_pgsql

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN sh -c "wget http://getcomposer.org/download/1.10.26/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

RUN cd /app && \
    /usr/local/bin/composer install --no-dev --prefer-dist

RUN chown -R www-data: /app

RUN chmod 777 -R /app/storage


CMD sh /app/docker/startup.sh

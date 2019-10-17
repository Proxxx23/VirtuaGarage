FROM php:7.3.10-fpm-alpine3.9

COPY app.ini /etc/php7/conf.d/
COPY app.ini /etc/php7/cli/conf.d/
COPY xdebug.ini /etc/php7/conf.d/
COPY app.pool.conf /etc/php7/php-fpm.d/

RUN \
 apk add --no-cache --virtual \
  .phpize-deps \
  $PHPIZE_DEPS \
  libtool \
  icu-dev \
  composer \
 && export \
  CFLAGS="$PHP_CFLAGS" \
  CPPFLAGS="$PHP_CPPFLAGS" \
  LDFLAGS="$PHP_LDFLAGS" \
 && docker-php-ext-install mysqli pdo_mysql intl

EXPOSE 9001

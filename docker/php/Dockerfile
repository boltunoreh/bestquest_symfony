FROM ubuntu:18.04

ENV DEBIAN_FRONTEND noninteractive

ARG X_DEBUG_REMOTE_HOST
ARG X_DEBUG_REMOTE_PORT
ARG X_PROFILER_ENABLE_TRIGGER
ARG X_DEBUG_MODE
ARG X_DEBUG_PROFILER_ENABLE
ARG USE_BLACKFIRE

RUN addgroup -gid 1000 www
RUN adduser www -uid 1000 --disabled-login --ingroup www --no-create-home --quiet --system

RUN apt-get update --fix-missing \
    && apt-get install -y software-properties-common \
    && add-apt-repository -y ppa:ondrej/php | tail -2 \
    && apt-get update --fix-missing \
    && apt-get install -y \
     php5.6-fpm \
     php5.6-mysql \
     php5.6-xml \
     php5.6-gd \
     php-xdebug \
     curl \
     unzip

COPY ./conf/php-fpm.conf /etc/php/5.6/fpm/php-fpm.conf
COPY ./conf/best-quest-fpm.conf /etc/php/5.6/fpm/pool.d/best-quest.conf
COPY ./ini/xdebug.ini /etc/php/5.6/mods-available/xdebug.ini

RUN echo "xdebug.remote_host = ${X_DEBUG_REMOTE_HOST};" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.remote_port = ${X_DEBUG_REMOTE_PORT};" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.profiler_enable_trigger = ${X_PROFILER_ENABLE_TRIGGER};" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.mode = ${X_DEBUG_MODE};" >> /etc/php/5.6/mods-available/xdebug.ini

RUN rm -f /etc/php/5.6/fpm/pool.d/www.conf

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

ENV PHP_IDE_CONFIG "serverName=best-quest.local"

CMD ["php-fpm5.6", "-F"]

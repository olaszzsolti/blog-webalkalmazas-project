#FROM php:7.4-apache-buster
FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN openssl req -x509 -newkey rsa:4096 -keyout /etc/ssl/key.pem -out /etc/ssl/cert.pem -days 365 -nodes -subj "/C=HU/ST=Pest/L=Budapest/O=Testing/CN=localhost"
RUN a2enmod ssl
RUN a2enmod headers
RUN a2enmod rewrite
RUN apt-get update ; apt-get install nfs-common -y
# RUN echo http://dl.alpinelinux.org/alpine/latest-stable/community/ >> /etc/apk/repositories
# RUN apk add --no-cache shadow curl vim zlib-dev autoconf g++ make re2c
# RUN pecl install -o -f redis
# RUN docker-php-ext-enable redis.so
# RUN pecl clear-cache
RUN pecl install redis && docker-php-ext-enable redis

COPY web/ /var/www/html


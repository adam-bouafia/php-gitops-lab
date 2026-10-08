FROM php:8.3-fpm-alpine

# Built with context = app/, so paths below are relative to app/:
#   docker build -f app/php-fpm/Dockerfile -t <image> app/

# Pool config exposes the status page the php-fpm_exporter sidecar scrapes.
COPY php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY src /var/www/html

WORKDIR /var/www/html

EXPOSE 9000

USER www-data

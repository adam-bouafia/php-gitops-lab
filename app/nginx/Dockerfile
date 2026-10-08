FROM nginx:1.27-alpine

# Built with context = app/, so paths below are relative to app/:
#   docker build -f app/nginx/Dockerfile -t <image> app/

COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# nginx must see the same code tree as php-fpm: SCRIPT_FILENAME is a path
# php-fpm opens on its own filesystem, so `root` here and php-fpm's
# /var/www/html have to resolve identically.
COPY src /var/www/html

EXPOSE 8080

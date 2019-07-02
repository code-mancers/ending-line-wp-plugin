FROM wordpress:php7.3-apache
WORKDIR /var/www/html
COPY ending-line/ wp-content/plugins/ending-line/

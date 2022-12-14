FROM php:5.6-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql pdo pdo_pgsql
EXPOSE 80 443

COPY index.php /var/www/html
COPY chat.php /var/www/html
COPY update.php /var/www/html
COPY timestamp.php /var/www/html
COPY username.php /var/www/html
COPY logout_chat.php /var/www/html

CMD apachectl -D FOREGROUND

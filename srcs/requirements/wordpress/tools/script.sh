#!/bin/bash
set -e

cd /var/www/wordpress

if [ ! -f wp-config.php ]; then
    wp config create --allow-root \
        --dbname="$MYSQL_DATABASE" \
        --dbuser="$MYSQL_USER" \
        --dbpass="$MYSQL_PASSWORD" \
        --dbhost="mariadb:3306" \
        --dbprefix="wp_"

    wp core install --allow-root --url="http://localhost/monsite" --title="Mon Site WordPress" --admin_user="admin" --admin_password="admin" --admin_email="contact@exemple.com"

fi

exec php-fpm8.2 -F

#!/bin/bash
set -e

WP_PATH="/var/www/wordpress"

echo "Starting WordPress container..."

cd "$WP_PATH"

sleep 10

if [ ! -f "$WP_PATH/wp-config.php" ]; then

    echo "Creating wp-config.php..."

    wp config create \
        --allow-root \
        --path="$WP_PATH" \
        --dbname="$MYSQL_DATABASE" \
        --dbuser="$MYSQL_USER" \
        --dbpass="$MYSQL_PASSWORD" \
        --dbhost="mariadb:3306" \
        --dbprefix="wp_"

    echo "Installing WordPress..."

    wp core install \
        --allow-root \
        --path="$WP_PATH" \
        --url="aalimous.42.fr" \
        --title="Mon Site WordPress" \
        --admin_user="admin" \
        --admin_password="admin" \
        --admin_email="contact@exemple.com"

fi

echo "Starting PHP-FPM..."

exec php-fpm8.2 -F

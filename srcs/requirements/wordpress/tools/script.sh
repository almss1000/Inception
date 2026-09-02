#!/bin/bash
set -e

WP_PATH="/var/www/wordpress"

echo "Starting WordPress container..."

cd "$WP_PATH"

sleep 10

if [ ! -f "$WP_PATH/wp-config.php" ]; then
    wp core download --allow-root --force

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
        --admin_user="$WP_ADMIN_USER" \
        --admin_password="$WP_ADMIN_PASSWORD" \
        --admin_email="$WP_ADMIN_EMAIL"

    wp user create \
        --allow-root \
        --path="$WP_PATH" \
        "$WP_USER" \
        "$WP_USER_EMAIL" \
        --user_pass="$WP_USER_PASSWORD" \
        --role="editor"

fi

chown -R www-data:www-data "$WP_PATH"

echo "Starting PHP-FPM..."

exec php-fpm8.2 -F

FROM debian:bookworm
RUN apt update && apt upgrade -y 

RUN apt-get -y install wget
RUN apt-get install -y php8.2 php8.2-fpm php8.2-mysql

RUN wget https://fr.wordpress.org/wordpress-6.0-fr_FR.tar.gz -P /var/www
RUN cd /var/www && tar -xzf wordpress-6.0-fr_FR.tar.gz && rm wordpress-6.0-fr_FR.tar.gz

COPY conf/wp-config.php /var/www/wordpress/wp-config.php

RUN sed -i 's|^listen = .*|listen = 9000|' /etc/php/8.2/fpm/pool.d/www.conf


CMD ["php-fpm8.2", "-F"]
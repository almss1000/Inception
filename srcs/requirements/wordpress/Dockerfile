FROM debian:bookworm
RUN apt update && apt upgrade -y 

RUN apt-get -y install wget curl
RUN apt-get install -y php8.2 php8.2-fpm php8.2-mysql
RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp




RUN wget https://fr.wordpress.org/wordpress-6.0-fr_FR.tar.gz -P /var/www
RUN cd /var/www && tar -xzf wordpress-6.0-fr_FR.tar.gz && rm wordpress-6.0-fr_FR.tar.gz
COPY tools/script.sh script.sh
RUN chmod +x script.sh

# COPY conf/wp-config.php /var/www/wordpress/wp-config.php

RUN sed -i 's|^listen = .*|listen = 9000|' /etc/php/8.2/fpm/pool.d/www.conf


ENTRYPOINT ["./script.sh"]
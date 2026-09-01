FROM debian:bookworm
RUN apt update && apt upgrade -y 

RUN apt-get -y install wget curl
RUN apt-get install -y php8.2 php8.2-fpm php8.2-mysql
RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp

COPY conf/www.conf /etc/php/8.2/fpm/pool.d/www.conf
# RUN sed -i 's|^listen = .*|listen = 9000|' /etc/php/8.2/fpm/pool.d/www.conf

COPY tools/script.sh /usr/local/bin/script.sh
RUN chmod +x /usr/local/bin/script.sh

ENTRYPOINT ["/usr/local/bin/script.sh"]

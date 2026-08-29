FROM debian:bookworm

RUN apt update && apt install -y mariadb-server

COPY tools/script.sh script.sh


RUN sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mariadb.conf.d/50-server.cnf

RUN chmod +x script.sh

ENTRYPOINT ["./script.sh"]
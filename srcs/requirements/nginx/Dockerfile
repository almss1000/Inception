FROM debian:bookworm
RUN apt update && apt upgrade -y 
RUN apt install curl vim -y
RUN apt install nginx -y
RUN apt install openssl -y
RUN openssl req -x509 -nodes -out a.out -keyout a.key -subj "/C=FR/ST=IDF/L=Paris/O=42/OU=42/CN=login.42.fr/UID=login"


COPY conf/nginx.conf /etc/nginx/nginx.conf

ENTRYPOINT ["nginx", "-g", "daemon off;"]
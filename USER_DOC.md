User Documentation
1. Project Overview

This project provides a WordPress website running with three services:

NGINX: Web server and HTTPS entry point.
WordPress: Website application running with PHP-FPM.
MariaDB: Database used by WordPress.
2. Starting the Project

From the root of the project, run:

make

This builds the Docker images and starts the services.

3. Stopping the Project

To stop the project, run:

make down

Or:

docker compose -f srcs/docker-compose.yml down
4. Accessing the Website

Open the following address in your browser:

https://login.42.fr

Replace login.42.fr with the domain configured for your project.

5. WordPress Administration

The WordPress administration panel is available at:

https://login.42.fr/wp-admin

Use your WordPress administrator username and password to log in.

6. Credentials

Database and WordPress credentials are stored in the .env file:

srcs/.env

Do not share these credentials publicly.

7. Checking the Services

To check that the containers are running:

docker ps

The NGINX, WordPress and MariaDB containers should have a status similar to:

Up

To check the logs:

docker compose -f srcs/docker-compose.yml logs

You can also check one service:

docker compose -f srcs/docker-compose.yml logs nginx
docker compose -f srcs/docker-compose.yml logs wordpress
docker compose -f srcs/docker-compose.yml logs mariadb
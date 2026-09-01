Developer Documentation
1. Prerequisites

The following tools are required:

Linux or a Linux virtual machine
Docker
Docker Compose
Make
Git

Check the installation with:

docker --version
docker compose version
make --version
2. Project Structure

The project has the following structure:

Inception/
├── Makefile
├── USER_DOC.md
├── DEV_DOC.md
└── srcs/
    ├── .env
    ├── docker-compose.yml
    └── requirements/
        ├── nginx/
        ├── wordpress/
        └── mariadb/
3. Environment Configuration

Environment variables are stored in:

srcs/.env

The file contains information such as:

MYSQL_DATABASE
MYSQL_USER
MYSQL_PASSWORD
MYSQL_ROOT_PASSWORD

The .env file must be configured before starting the project.

4. Building and Launching

Build the Docker images and start the project with:

make

You can also use Docker Compose directly:

docker compose -f srcs/docker-compose.yml up -d --build
5. Managing Containers

List running containers:

docker ps

List all containers:

docker ps -a

Access a running container:

docker exec -it <container_name> bash

View logs:

docker compose -f srcs/docker-compose.yml logs

Stop the services:

docker compose -f srcs/docker-compose.yml down
6. Managing Volumes

List Docker volumes:

docker volume ls

Inspect a volume:

docker volume inspect <volume_name>

The project uses volumes to keep important data outside the containers.

7. Data Persistence

WordPress files and MariaDB data are stored using persistent Docker volumes.

This means that removing a container does not normally remove the persistent data.

For example:

docker compose -f srcs/docker-compose.yml down

stops and removes the containers while keeping the volumes.

Be careful with:

docker compose -f srcs/docker-compose.yml down -v

This also removes the Compose volumes and can cause permanent data loss.

8. Rebuilding the Project

To rebuild the images:

docker compose -f srcs/docker-compose.yml up -d --build

To completely stop the project:

docker compose -f srcs/docker-compose.yml down
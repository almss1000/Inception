*This project has been created as part of the 42 curriculum by aalimous.

# Description

## Project Overview

Inception is a system administration project from the 42 curriculum.

The goal of this project is to build a small infrastructure using Docker Compose.

The infrastructure is composed of several services running in separate Docker containers:

* **NGINX**: Web server and HTTPS entry point.
* **WordPress**: Website application running with PHP-FPM.
* **MariaDB**: Database used by WordPress.

The services communicate with each other through a Docker network.

## Project Goal

The main goal of the project is to learn how to:

* Create Docker images using Dockerfiles.
* Manage multiple containers with Docker Compose.
* Configure NGINX with TLS.
* Run WordPress with PHP-FPM.
* Run MariaDB as a database service.
* Use Docker networks and volumes.
* Manage persistent data.

# Project Description

## Docker

Docker is used to run each service in its own container.

Instead of installing NGINX, WordPress/PHP and MariaDB directly on the host machine, each service is isolated in its own container.

The project uses custom Dockerfiles to build the required images from a Debian or Alpine base image.

The main services are:

                    HTTPS
                      |
                      v
                 +---------+
                 |  NGINX  |
                 +---------+
                      |
                  FastCGI
                      |
                      v
              +---------------+
              |   WordPress   |
              |   PHP-FPM     |
              +---------------+
                      |
                   MySQL
                      |
                      v
              +---------------+
              |    MariaDB    |
              +---------------+

## Main Design Choices

Each service has a specific responsibility:

* NGINX handles HTTPS requests.
* WordPress handles the website and PHP execution.
* MariaDB stores WordPress data.
* Docker Compose manages the complete infrastructure.
* Docker volumes are used to persist important data.
* A private Docker network allows the containers to communicate.

# Technical Comparisons

## Virtual Machines vs Docker

### Virtual Machines

A virtual machine contains a complete operating system with its own kernel.

Host
 |
 +-- VM
 |    +-- Operating System
 |    +-- Application
 |
 +-- VM
      +-- Operating System
      +-- Application

VMs provide strong isolation but require more resources because each VM needs its own operating system.

### Docker

Docker containers share the host kernel and isolate applications at the process level.

Host
 |
 +-- Docker
      |
      +-- NGINX container
      +-- WordPress container
      +-- MariaDB container

Docker containers are generally lighter and faster to start than virtual machines.

For this project, Docker is useful because each service can run independently while using fewer resources.

# Secrets vs Environment Variables

## Environment Variables

Environment variables are useful for configuring applications.

For example:

MYSQL_DATABASE
MYSQL_USER
MYSQL_PASSWORD

They can be provided to containers through the `.env` file or Docker Compose configuration.

## Secrets

Secrets are designed to protect sensitive information such as passwords and private keys.

They are preferable when sensitive credentials need stronger protection.

In this project, environment variables are used for configuration and credentials according to the project requirements.

Sensitive files such as `.env` should not be committed to a public repository.

# Docker Network vs Host Network

## Docker Network

A Docker network allows containers to communicate with each other using container/service names.

For example:

NGINX
  |
  | wordpress:9000
  v
WordPress
  |
  | mariadb:3306
  v
MariaDB

The containers do not need to expose every internal port to the host.

## Host Network

With host networking, the container uses the host's network directly.

This provides less network isolation and can create port conflicts with services running on the host.

For this project, a Docker network is used because the services need private communication with each other.

# Docker Volumes vs Bind Mounts

## Docker Volumes

Docker volumes are managed by Docker and are commonly used to persist container data.

Container
    |
    v
Docker Volume
    |
    v
Persistent Data

They are useful when application data must survive container recreation.

## Bind Mounts

A bind mount connects a specific directory on the host to a directory inside the container.

Example:

Host directory
/home/user/data
       |
       v
Container
/var/www/wordpress

Bind mounts provide direct access to the files from the host.

In this project, volumes/bind mounts are used to keep important WordPress and database data persistent.

# Instructions

## Prerequisites

The project requires:

* Linux or a Linux virtual machine
* Docker
* Docker Compose
* Make
* Git

Check the installation:

docker --version
docker compose version
make --version


## Configuration

Configure the environment variables in:

srcs/.env

The file contains the required database and WordPress configuration.

Do not publish sensitive credentials in the repository.

## Build and Run

From the root of the repository:

 bash
make


This builds the Docker images and starts the services.

Docker Compose can also be used directly:

docker compose -f srcs/docker-compose.yml up -d --build

## Check the Containers

```bash
docker ps
```

The NGINX, WordPress and MariaDB containers should be running.

## View Logs

```bash
docker compose -f srcs/docker-compose.yml logs
```

To check one service:

```bash
docker compose -f srcs/docker-compose.yml logs nginx
docker compose -f srcs/docker-compose.yml logs wordpress
docker compose -f srcs/docker-compose.yml logs mariadb
```

## Stop the Project

```bash
docker compose -f srcs/docker-compose.yml down
```

Or use:

```bash
make down
```

if the `down` target exists in the Makefile.

# Project Structure

```text
Inception/
├── Makefile
├── README.md
├── USER_DOC.md
├── DEV_DOC.md
└── srcs/
    ├── .env
    ├── docker-compose.yml
    └── requirements/
        ├── nginx/
        │   ├── Dockerfile
        │   └── conf/
        ├── wordpress/
        │   ├── Dockerfile
        │   └── tools/
        └── mariadb/
            ├── Dockerfile
            └── tools/
```

The exact structure may vary depending on the implementation.

# Resources

## Docker

* Docker documentation: https://docs.docker.com/
* Docker Compose documentation: https://docs.docker.com/compose/

## NGINX

* NGINX documentation: https://nginx.org/en/docs/

## WordPress

* WordPress documentation: https://developer.wordpress.org/

## MariaDB

* MariaDB documentation: https://mariadb.com/docs/

## PHP-FPM

* PHP documentation: https://www.php.net/docs.php

## OpenSSL / TLS

* OpenSSL documentation: https://docs.openssl.org/

## AI Usage

AI tools were used as a learning and development assistant during this project.

They were used for:

* Understanding Docker and Docker Compose concepts.
* Understanding NGINX and PHP-FPM communication.
* Understanding MariaDB configuration.
* Troubleshooting Docker, NGINX, PHP-FPM and MariaDB errors.
* Understanding volumes, networks and environment variables.
* Improving the project documentation.
* Explaining commands and configuration files.

The project was implemented and tested by the student, and AI-generated explanations were used as assistance rather than as a replacement for understanding the project.

COMPOSE = docker compose -f srcs/docker-compose.yml
data_path = /home/aalimous/data
all: up

up:
	sudo mkdir -p $(data_path)/wordpress
	sudo mkdir -p $(data_path)/mariadb
	$(COMPOSE) up -d --build

down:
	$(COMPOSE) down

build:
	$(COMPOSE) build

start:
	$(COMPOSE) start

stop:
	$(COMPOSE) stop

restart:
	$(COMPOSE) down
	$(COMPOSE) up -d --build

logs:
	$(COMPOSE) logs -f

ps:
	$(COMPOSE) ps

images:
	$(COMPOSE) images

volumes:
	$(COMPOSE) volumes

clean:
	$(COMPOSE) down

fclean:
	$(COMPOSE) down --volumes --rmi all && sudo rm -rf /home/aalimous

re:
	$(MAKE) fclean
	$(MAKE) all

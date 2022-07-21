 start:
	@docker compose up -d;\
 stop:
	@docker compose down;\

install:
	echo "Docker Exec";\
	sudo docker exec -it php-aps composer install
enter:
	sudo docker exec -it php-aps /bin/sh
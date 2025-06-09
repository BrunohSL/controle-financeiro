help:
	@echo "Escolha um dos comandos abaixo:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

front:
	npm run dev

up:
	./vendor/bin/sail up

down:
	./vendor/bin/sail down

upd:
	./vendor/bin/sail up -d

recreate:
	./vendor/bin/sail up -d --build --force-recreate

mysql:
	docker exec -it controle-financeiro-mysql-1 mysql -usail -proot

mysqlroot:
	docker exec -it controle-financeiro-mysql-1 mysql -uroot -ppassword

bash:
	docker exec -it controle-financeiro-laravel.test-1 bash

permissao:
	sudo chown -R bruno:www-data .

# Rodar dentro do container
mfs:
	php artisan migrate:fresh --seed

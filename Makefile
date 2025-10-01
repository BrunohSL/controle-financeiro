help: ## Exibe esta ajuda
	@echo "Escolha um dos comandos abaixo:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

##@ Projeto

front: ## Inicia o frontend
	npm run dev

up: ## Sobe o docker do backend
	./vendor/bin/sail up

down: ## Para o docker do backend
	./vendor/bin/sail down

upd: ## Sobe o docker do backend sem ficar dentro do docker
	./vendor/bin/sail up -d

recreate: ## Recria os containers do docker do backend
	./vendor/bin/sail up -d --build --force-recreate

##@ Docker

mysql: ## Acessa o MySQL do docker
	docker exec -it controle-financeiro-mysql-1 mysql -usail -proot

mysqlroot: ## Acessa o MySQL do docker como root
	docker exec -it controle-financeiro-mysql-1 mysql -uroot -ppassword

bash: ## Acessa o bash do container do Laravel
	docker exec -it controle-financeiro-laravel.test-1 bash

##@ Utilitários

permissao: ## Concede permissões corretas para o Laravel
	sudo chown -R bruno:www-data .

dev: ## Sobe os containers e roda o front-end
	$(MAKE) upd
	$(MAKE) front

##@ Rodar dentro do container

mfs: ## Roda o comando de migration e seed do Laravel
	php artisan migrate:fresh --seed

cacheclear: ## Limpa o cache do Laravel
	php artisan cache:clear
	php artisan route:clear
	php artisan view:clear
	php artisan config:clear
	php artisan config:cache

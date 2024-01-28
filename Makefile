build:
	docker compose up -d --build
up:
	docker compose up -d
down:
	docker compose down
restart:
	@make down
	@make up
ps:
	docker compose ps
app:
	docker compose exec app bash
web:
	docker compose exec web bash
db:
	docker compose exec db bash
sql:
	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
destroy:
	docker compose down --rmi all --volumes --remove-orphans
remake:
	@make destroy
	@make init
init:
	docker compose up -d --build
	docker compose exec app composer install
	docker compose exec app cp .env.example .env
	docker compose exec app php artisan key:generate
	docker compose exec app php artisan storage:link
	docker compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
fresh:
	docker compose exec app php artisan migrate:fresh --seed
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-web:
	docker compose logs web
log-web-watch:
	docker compose logs --follow web
log-app:
	docker compose logs app
log-app-watch:
	docker compose logs --follow app
log-db:
	docker compose logs db
log-db-watch:
	docker compose logs --follow db
migrate:
	docker compose exec app php artisan migrate
seed:
	docker compose exec app php artisan db:seed
dacapo:
	docker compose exec app php artisan dacapo
rollback-test:
	docker compose exec app php artisan migrate:fresh
	docker compose exec app php artisan migrate:refresh
tinker:
	docker compose exec app php artisan tinker
test:
	docker compose exec app php artisan test
optimize:
	docker compose exec app php artisan optimize
optimize-clear:
	docker compose exec app php artisan optimize:clear
cache:
	docker compose exec app composer dump-autoload -o
	@make optimize
	docker compose exec app php artisan event:cache
	docker compose exec app php artisan view:cache
cache-clear:
	docker compose exec app composer clear-cache
	@make optimize-clear
	docker compose exec app php artisan event:clear
npm:
	@make npm-install
npm-install:
	docker compose exec web npm install
npm-dev:
	docker compose exec web npm run dev
npm-watch:
	docker compose exec web npm run watch
npm-watch-poll:
	docker compose exec web npm run watch-poll
npm-hot:
	docker compose exec web npm run hot
yarn:
	docker compose exec web yarn
yarn-install:
	@make yarn
yarn-dev:
	docker compose exec web yarn dev
yarn-watch:
	docker compose exec web yarn watch
yarn-watch-poll:
	docker compose exec web yarn watch-poll
yarn-hot:
	docker compose exec web yarn hot
ide-helper:
	docker compose exec app php artisan clear-compiled
	docker compose exec app php artisan ide-helper:generate
	docker compose exec app php artisan ide-helper:meta
	docker compose exec app php artisan ide-helper:models --nowrite
list:
	docker compose exec app php artisan route:list
create-controller:
	docker compose exec app php artisan make:controller $(name)
create-provider:
	docker compose exec app php artisan make:provider ${name}
create-middleware:
	docker compose exec app php artisan make:middleware ${name}
create-request:
	docker compose exec app php artisan make:request ${name}
create-migration:
	docker compose exec app php artisan make:migration ${name}
create-seeder:
	docker compose exec app php artisan make:seeder ${name}
create-model:
	docker compose exec app php artisan make:model ${name} --migration

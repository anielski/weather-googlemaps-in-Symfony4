
build:
	composer update && php bin/console doctrine:migrations:migrate

run: build
	bin/console server:start




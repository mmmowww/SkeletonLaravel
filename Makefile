UID=`id -u`
API_SPEC=spec/spec.yaml
API_OUTPUT=vendor/openapi

project:
	composer install

	php artisan migrate

	php artisan optimize:clear

	php artisan l5-swagger:generate

	./vendor/bin/codecept build

	./vendor/bin/codecept run


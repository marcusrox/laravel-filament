
## Laravel Filament Application

https://filamentphp.com/docs/3.x/panels/getting-started


## Comandos pós clone

$ composer install
$ npm install
$ npm run build
$ php artisan migrate
$ php artisan make:filament-user
$ cp .env.example .env
$ php artisan key:generate

## Comandos úteis para o desenvolvimento
$ php artisan make:filament-resource Customer --generate
$ php artisan make:model Permission --migration
$ php artisan make:filament-resource Permission --generate --simple
$ php artisan make:observer UserObserver --model=User
$ php artisan make:model Category -mfs // Criar model com migration, factory e seeder
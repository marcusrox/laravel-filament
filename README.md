
## Laravel Filament Application

https://filamentphp.com/docs/3.x/panels/getting-started


## Comandos pós clone

- composer install
- npm install
- npm run build
- php artisan migrate
- php artisan db:seed
- php artisan make:filament-user
- cp .env.example .env
- php artisan key:generate
- php artisan storage:link
- php artisan db:wipe

## Comandos úteis para o desenvolvimento
- php artisan make:filament-resource Cliente --generate
- php artisan make:model Permission --migration
- php artisan make:filament-resource Permission --generate --simple
- php artisan make:observer UserObserver --model=User
- php artisan make:model Category -mfs // Criar model com migration, factory e seeder
- php artisan make:filament-relation-manager ProductResource categories name


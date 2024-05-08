# Test App

## Installation

```sh
git clone https://github.com/m4voit/cv-1.git
cd cv-1
cp .env.example .env
composer install
php artisan key:generate
php artisan sail:install
./vendor/laravel/sail/bin/sail up -d
./vendor/laravel/sail/bin/sail npm install
./vendor/laravel/sail/bin/sail artisan migrate
./vendor/laravel/sail/bin/sail artisan db:seed --class=HouseSeeder
./vendor/laravel/sail/bin/sail npm run build
```
After installation site must be available on http://localhost

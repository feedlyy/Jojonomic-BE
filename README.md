# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## How to install

##### 1. Clone this repository with git command on your working directory (C:\xampp\htdocs on xampp or C:\laragon\www on laragon): git clone https://github.com/feedlyy/Jojonomic-BE.git
##### 2. Create file .env, copy this format and Change the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD parameter as your database configuration.
```ruby
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=Asia/Jakarta

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

##### 3. Install the dependencies: composer install --no-scripts
##### 4. Generate a random key for env file
- run the server, php -S localhost:8000 -t public
- access this url for generate random key and copy it to APP_KEY in .env file
```ruby
localhost:8000/key
```
##### 5. Migrate the tables to database and data(seeder) with artisan command php artisan migrate:fresh --seed

## API Blueprint
![How to use api](https://user-images.githubusercontent.com/33906363/78882510-5fcf9c00-7a82-11ea-87d9-28feba2bdf8f.png)

## Full list of api
(your project folder)/routes/web.php

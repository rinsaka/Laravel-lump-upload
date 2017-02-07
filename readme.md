## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



# lump-upload 一括アップロード

### プロジェクトの生成
~~~
php composer.phar create-project --prefer-dist laravel/laravel=5.1 lump-upload
~~~

### Git の登録
~~~
cd lump-upload
git init
git add .
git commit -m 'Initial commit'
git remote add origin ssh://git@bitbucket.org/rinsaka/lump-upload.git
git push -u origin master
~~~

### MySQLデータベースの作成
~~~
CREATE DATABASE laravel_lump_upload;
GRANT ALL on laravel_lump_upload.* to laraveluser@localhost identified by 'Secret.2016';
~~~

### 初期設定
- .env
~~~
DB_HOST=localhost
DB_DATABASE=laravel_lump_upload
DB_USERNAME=laraveluser
DB_PASSWORD=Secret.2016
~~~
- .gitignore
- config/app.php

### apacheに書き込み権限

### Paper モデルとコントローラー
~~~
php artisan make:model Paper
php artisan make:controller PapersController
~~~

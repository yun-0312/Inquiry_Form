# お問い合わせフォーム


## 環境構築
Dockerビルド
  1. git clone git@github.com:yun-0312/Inquiry_Form.git
  2. docker-compose up -d build

Laravel環境構築
  1. docker-compose exec php bash
  2. composer install
  3. env.exmampleファイルをコピーして.envを作成し、環境変数を変更
  4. php artisan key:generate
  5. php artisan migrate
  6. php artisan db:seed

## 使用技術
  <img src="https://img.shields.io/badge/-PHP-777BB4.svg?logo=php&style=plastic"> <img src="https://img.shields.io/badge/-Laravel-E74430.svg?logo=laravel&style=plastic"> <img src="https://img.shields.io/badge/-Mysql-4479A1.svg?logo=mysql&style=plastic"> <img src="https://img.shields.io/badge/-Nginx-269539.svg?logo=nginx&style=plastic"> <img src="https://img.shields.io/badge/-Docker-1488C6.svg?logo=docker&style=plastic"><br />
  ・php 8.4.12<br />
  ・Laravel 8.83.29<br />
  ・MySQL 8.0.43<br />
  ・nginx 1.21.1<br />
  ・Docker 28.4.0<br />

## ER図
<img width="711" height="391" alt="Image" src="https://github.com/user-attachments/assets/d4e05a02-1383-4059-b3df-6b69f32608f4" />

## URL
　・開発環境：http://localhost/< br>
  ・phpMyAdmin:http://localhost:8080/

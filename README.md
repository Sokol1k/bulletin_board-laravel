# Bulletin Board - Laravel
Для запуска проекта неоходимо:
- Настроить файл `.env`, для подключения к БД. Добавить Google Key для использования Google Maps
```sh
GOOGLE_API_KEY=
```
- Установить пакеты
```sh
$ composer install
```
- Создать хранилие для изображений
```sh
$ php artisan storage:link
```
- Создать таблицы в БД
```sh
$ php artisan migrate
```
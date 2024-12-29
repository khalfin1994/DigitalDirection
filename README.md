# Запуск проекта Laravel с использованием Docker

Для того чтобы запустить проект на вашем локальном окружении, выполните следующие шаги:

```bash
# Клонируйте репозиторий
git clone <URL_репозитория>
cd <название_папки_репозитория>

# Запустите контейнеры Docker
docker-compose up -d

# Выдать права на запись/чтение
docker exec -it laravel-app bash                                                                          
chmod -R 777 /var/www 

# Скопируйте содержимое .env.example, создайте .env и вставьте содержимое туда

# Установите зависимости Composer
docker exec -it laravel-app composer install

# Для создания символической ссылки использовать 
docker exec -it laravel-app php artisan storage:link

# Настроить mysql: дать права root, user - dd_test, пароль - password

# Запустите миграции и сиды
docker exec -it laravel-app php artisan migrate --seed

# Сгенерируйте ключ приложения
docker exec -it laravel-app php artisan key:generate

# Файл с коллекцией постман отправлю сообщением

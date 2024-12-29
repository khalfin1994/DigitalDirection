# Запуск проекта Laravel с использованием Docker

Для того чтобы запустить проект на вашем локальном окружении, выполните следующие шаги:

```bash
# Клонируйте репозиторий
git clone <URL_репозитория>
cd <название_папки_репозитория>

# Запустите контейнеры Docker
docker-compose up -d

# Установите зависимости Composer
docker exec -it laravel-app composer install

# Запустите миграции и сиды
docker exec -it laravel-app php artisan migrate --seed

# Сгенерируйте ключ приложения
docker exec -it laravel-app php artisan key:generate

1. скачать с репозитория
2. распаковать zip файл на компьютере
3. с помощью командной консоли (cmd как вариант), войти в 
папку где распакован архив.
4. запустить composer install (предварительно проверить установлен ли composer, 
если нет установить с официального сайта).
5. запустить npm install -y (проверить установлен ли node, https://nodejs.org/en, 
если нет установить)
6. создать базу данных под названием uuid средствами phpadmin 
7. запустить миграцию php artisan migrate
8. прописать в файле .env пользователя DB_USERNAME=root, 
и пароль DB_PASSWORD=root
9. запуск приложения в режиме developer
php artisan serve, затем открыть еще одну консоль (cmd) там запустить vite.

запуск приложения в режиме production, положить папку на веб-сервер
настроить так чтобы веб-сервер обращался к \имя_папки\public
(пример для веб-сервера open server, кладем распакованную папку в каталог 
domains назовем ее для примера uuid, в настройках сервера на вкладке домен 
указываем домен uuid, папка домена тогда \uuid\public)     
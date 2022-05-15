# CRUD Laravel 8
## versão 1.0
após clonar execute:

```
> composer update

> touch ./database/database.sqlite (se estiver usando o GIT Bash)

> cp ./.env.example ./.env

Edite o arquivo .env para cofigurar o banco de dados SQLite
	DB_CONNECTION=sqlite

> php artisan key:generate

> php artisan migrate --seed

> php artisan serve
```



Em seguida visite os links:

http://localhost:8000/equipamento
http://localhost:8000/setor
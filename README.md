# CRUD Laravel 8

## versão 2.0

### Inclusão de gráficos na Home Page

Após clonar execute:

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

Em seguida visite o link:

http://localhost:8000/

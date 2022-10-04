# Como rodar esta api com docker + sail
## Requisito
* composer
* docker e docker-compose
```shell
composer install
alias sail='bash vendor/bin/sail'
sail up -d
```
## .env
```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=tasks
DB_USERNAME=sail
DB_PASSWORD=password
```
### Aviso: os dados informados são os únicos que precisam ser trocados no .env.example

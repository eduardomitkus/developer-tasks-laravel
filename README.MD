Vamos preparar o ambiente?

- Mude as credenciais para a build do banco no arquivo "docker-compose" e mude as credenciais para acesso na aplicação pelo arquivo ".env"

- execute o comando "docker-compose up" na raiz da pasta.

- Caso não haja permissão, aplicar na pasta conforme o sistema operacional.
ex: chmod -R 755 developerTasks/

- Caso não consiga executar comandos no volume, acesssar bash do container.  ex: docker exec -i -t {ID} /bin/bash

- Migração: "php artisan migrate" para rodar as migrações;

- Teste Unitario: vendor/bin/phpunit


VERSÕES DAS TECNOLOGIAS UTILIZADAS:

- Laravel 5.7

- PHP 7.3

- PostGreSQL 11

- Docker 18.06.1

- PHPUnit 7.5

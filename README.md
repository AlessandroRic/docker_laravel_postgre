# BoilerPlate Laravel + Docker + PostgreSql + Redis

O sistema como base tem o intuito de simular uma loja de discos, e simular um escopo de JOB utilizando um sistema de
Queue com Horizon

# Sistema de Filas
O Laravel Horizon fornece um belo painel e configuração orientada por código para suas filas Redis com Laravel. O Horizon permite monitorar facilmente as principais métricas do seu sistema de filas, como taxa de transferência de trabalhos, tempo de execução e falhas de trabalhos.

Para acessar utilize: ```127.0.0.1:9000/horizon/dashboard```
## Versions

- PostgreSql: 12.0
- PHP: 7.4
- Redis: 6.2.5
- Laravel (FrameWork):

## Code To Install

Após baixar o git do código,

executar na pasta criada:

```bash
composer install
sudo chmod -R 777 .docker
sudo chmod -R 777 storage
docker-compose up --build
docker-compose exec laravel_app php artisan migrate
docker-compose exec -d laravel_app php artisan horizon
```

## Contributing
Thx Everything :D
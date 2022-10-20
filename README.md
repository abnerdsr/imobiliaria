# Imabiliária

Sistema para imobiliarias feito no Laravel com layout do Filament PHP, 


## Documentações para estudo necessário no projeto

Laravel https://laravel.com/

Filament PHP https://filamentphp.com/

Tailwind https://tailwindcss.com/

Liveware https://laravel-livewire.com/

AlpineJs https://alpinejs.dev/

## Requerimentos

- Docker

ou

- PHP 8.1 com extenções da documentação do Laravel 9.x https://laravel.com/docs/9.x/deployment#server-requirements

- Composer 2

- Swoole 4

- Redis 7

- MySQL 8

- Node 16

- MailiSearch 0.29

## Variavel de Ambiente

copie o arquivo de ambiente e configure caso necessário, se for utilizar o docker o .env ja estará correto para desenvolvimento local
```
cp .env.example .env
```

## Iniciando a apliação com o Docker

instale as dependencias do composer
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Inicie os containers
```
./vendor/bin/sail up -d
```

Crie as pastas no minio para armazenar os arquivo
```
Acesse http://minio:9000

Crie um bucket publico chamado "public" e um bucket privado chamado "private"
``` 

instale as dependencias do node
```
./vendor/bin/sail npm install
``` 

gere a chave unica do projeto
```
./vendor/bin/sail artisan key:generate
```

Reinicie os containers
```
./vendor/bin/sail down && ./vendor/bin/sail up -d
```

gere o link simbolico para a pasta storage
```
./vendor/bin/sail artisan storage:link
```

execute as migrações do banco de dados
```
./vendor/bin/sail artisan migrate
```

faça a build do projeto front
```
./vendor/bin/sail npm run build
```

crie o usuário admin para acesso
```
./vendor/bin/sail artisan orchid:admin
```

Acesse o projeto
```
http://localhost
```

## Iniciando o projeto sem o Docker

instale as dependencias do composer
```
composer install
```

gere a chave unica do projeto
```
php artisan key:generate
```

gere o link simbolico para a pasta storage
```
php artisan storage:link
```

execute as migrações do banco de dados
```
php artisan migrate
```

instale as dependencias do node
```
npm install
``` 

faça a build do projeto front
```
npm run build
```

inicie o Horizon para filas
```
php artisan horizon
```

inicie o servidor
```
php artisan octane:start --server=swoole --host=0.0.0.0 --port=80 --watch
```

crie o usuário admin para acesso
```
php artisan orchid:admin
```


Acesse o projeto
```
http://localhost
```
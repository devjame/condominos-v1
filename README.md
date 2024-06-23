# Condominos

## Setup

### Instalar o laravel Herd

link: https://herd.laravel.com/windows


### Confiugrar o projeto

Baixa o projeto no github
> Link: https://github.com/devjame/condominos-v1

> Criar uma pasta chamada `Projetos`. Guarda o projeto nesta pasta.

Abra o projeto com o Visual Studio Code.

Edita o ficheiro `.env`.

Adicionar as credenciais da Base de Dados.

>As credencias tem que ser identicas as que configuras-te para a tua Base de Dados

- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=condominos
- DB_USERNAME=root
- DB_PASSWORD=password

### Executar o comando abaixo para criar as tabelas

Abra um terminal e vai na pasta do projeto (`condominos-v1`) e execute o seguinte comando.

>Atenção! Só execute este comando uma vez.  Caso tens dados na Base de Dados, será apagado.

> `php artisan migrate`

Se ocorrer erro, verifique as credenciais da Base de Dados, ou, excute o seguinte comando:
> `php artisan migrate:fresh`

#### Compilar os assets

Na mesma pasta, execute no terminal
> `npm install`

>`npm run build`

### Adicionar o projeto ao aplicativo Herd

Na pasta `Projetos`, tenha a certeza que o pasta com os códigos já estaja lá, abra um terminal e digite:

> `herd park`

### Executar o programa

> `php artisan serve`

> Caso o comando acima não resultar, tente:

> `php -S localhost:8000 -t public/`

Depois de executar o comando acima, vá para o browser e digite o link
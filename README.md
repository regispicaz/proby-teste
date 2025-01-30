# Desafio vaga Desenvolvedor - ProbY

Autor: Régis Picáz.

Ano: 2025

# Descrição:

Este projeto é fruto do desafio para vaga de Desenvolvedor na ProbY.
Ele foi desenvolvido com o objetivo de entregar um produto, este é uma aplicação para gerenciamento de projetos internos para um empresa.
O sistema deve atender aos seguintes requisitos:

-   Cadastro, Listagem, Edição e Exclusão de projetos por usuários devidamente autenticados.

## Pré-requisitos:

-   Docker;
-   Docker compose;
-   Composer.

## Instalação:

1. Clone o repositório:

    ```bash
    git clone https://github.com/regispicaz/proby-teste.git
    ```

2. Acesse o diretório do projeto:

    ```bash
    cd proby-teste
    ```

3. Instalando as dependências do Composer:

    ```bash
    composer install
    ```

4. Crie um arquivo `.env` a partir do `.env.example`, observação as variáveis de ambiente já estão pré-setadas no .env.example:

    ```bash
    cp .env.example .env
    ```

5. Subindo os contêineres do Laravel e MySQL com Laravel Sail:

    ```bash
    ./vendor/bin/sail up -d
    ```

6. Gere a chave de aplicação:

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

7. Execute as migrações:

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

8. Populando o banco de dados com os seeders:

    ```bash
    ./vendor/bin/sail artisan db:seed
    ```

9. Compilando os assets:

    ```bash
    npm run dev
    ```

10. Acessando o projeto:

    [http://localhost](http://localhost)

11. Encerrando os contêineres:

    ```bash
    ./vendor/bin/sail down
    ```

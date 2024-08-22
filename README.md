<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel CRUD
Este projeto é uma aplicação Laravel que fornece uma implementação básica de operações CRUD (Criar, Ler, Atualizar e Excluir). Este repositório é ideal para quem deseja entender e implementar operações CRUD com o Laravel Framework.

## Requisitos
- PHP >= 7.3
- Docker Compose
- Composer
- Laravel >= 8.x
- PostgreSQL

## Instalação
Siga estas etapas para instalar e configurar a aplicação:

Clone o Repositório

`git clone https://github.com/behappyOS/LaravelCrud.git`
`cd LaravelCrud`

Instale as Dependências

`composer install`

Configure o Ambiente

Copie o arquivo .env.example para .env e ajuste as configurações conforme necessário.

`cp .env.example .env`

Gere a Chave de Aplicação

`php artisan key:generate`

Configure o Banco de Dados

No arquivo .env, defina suas credenciais de banco de dados:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
Execute as Migrações

`php artisan migrate`

Inicie o Servidor

`php artisan serve`

A aplicação estará acessível em http://localhost:8000.

## Funcionalidades
- Cadastro de Pacientes: Permite criar novos registros de Pacientes.
- Listagem de Pacientes: Exibe uma lista de todos os Pacientes cadastrados.
- Edição de Pacientes: Permite editar informações de Pacientes existentes.
- Exclusão de Pacientes: Permite excluir registros de Pacientes.

## Estrutura do Projeto
- app/Http/Controllers/ - Controladores responsáveis pelas operações CRUD.
- app/Models/ - Modelos Eloquent para interação com o banco de dados.
- resources/views/ - Views Blade para a interface do usuário.
- routes/web.php - Definição das rotas da aplicação.

## Testes
Para rodar os testes automatizados, utilize:

`php artisan test`

## Licença
Este projeto está licenciado sob a Licença MIT. Veja o arquivo LICENSE para mais detalhes.

Sinta-se à vontade para ajustar as informações conforme necessário. Se houver aspectos específicos da aplicação que você gostaria de destacar, sinta-se à vontade para adicioná-los ao README.

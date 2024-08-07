# API de Sabores de Sorvete

Cada etapa do desenvolvimento dessa API foi testada separadamente seguindo a ordem dos commits. 
<ol>
    
<li>Criação da API sem segurança + testes no Postman;</li>
<li>Inserção e configuração do swagger + testes no app/documentation ;</li>
<li>Inserção do JWT + testes no Postman;</li>
<li>Correção do Swagger(Inserindo a parte de Login e JWT em Authozire);</li>
<li>Documentação (README) e testes(clone + passos do README);</li>
</ol>

## Requisitos
<ul>
<li>PHP 8.0 ou superior</li>
<li>Composer</li>
<li>MySQL (ou outro banco de dados suportado pelo Laravel)</li>
<li>Laravel 10.x</li>
<li>Postman, insomnia ou até mesmo o Thunder Client(para testes)</li>
<li>JWTAuth</li>
<li>Swagger (para documentação)</li>
</ul>

## Instalação

1. Clone o repositório para sua máquina local:

```
git clone https://github.com/damiao-git/aquela-api-laravel.git
cd aquela-api-laravel
code .
```

2. Instale as dependências do projeto:

```
composer install
```
3. Crie um arquivo .env baseado no .env.example:

```
cp .env.example .env
```
4. Configure as variáveis de ambiente no arquivo .env, especialmente as configurações do banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_sabores
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
5. Gere a chave da aplicação:

```
php artisan key:generate
```
6. Execute as migrações e popule o banco de dados:

```
php artisan migrate --seed
```
7. Instale o pacote JWTAuth:

```
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```
## Uso
### 1. Rodando o Servidor

Inicie o servidor de desenvolvimento:

```
php artisan serve
```

A API estará disponível em http://127.0.0.1:8000.

### 2. Endpoints

Listar todos os sabores:


<li>Rota: GET /api/sabores
<li>Autenticação: Requer Token JWT</li><br>
<img src="https://github.com/user-attachments/assets/ecb27c05-7c39-4410-a78d-3ca5ef62a532" alt="Login">
<br>

<li>Exemplo de Requisição:</li><br>
<img src="https://github.com/user-attachments/assets/545cf924-3b8d-4e59-8aa6-cb0beb839a72" alt="Listar todos">
<br>


Buscar sabor por ID:

<li>Rota: GET /api/sabores/{id}</li>
<li>Autenticação: Requer Token JWT</li>
<li>Exemplo de Requisição:</li><br>
<img src="https://github.com/user-attachments/assets/30186a08-e859-498d-a104-fc10060a86db" alt="Busca por ID">

<br>

### 3. Autenticação
Para autenticar um usuário e obter o token JWT:

<li>Rota: POST /api/login</li>
<li>Corpo da Requisição:</li>

```
{
  "email": "damiao@gmail.com",
  "password": "senha123"
}
```

<li>Resposta:</li>

```
{
  "token": "seu_token_jwt"
}
```

### 4. Documentação da API
<br>
<img src="https://github.com/user-attachments/assets/021ffb8a-83cd-4d22-961c-a3bcd79769ec" alt="Swagger">
<br>

A documentação da API pode ser acessada em **/api/documentation** após configurar o Swagger.

## Testes
Foram feitos no total 5 testes de integração, dentre eles, temos 2 padrões criados pelo Laravel e 3 criados por mim para testar:
<li>Lista completa</li>
<li>Sabor individual</li>
<li>Erro 404 se não achar sabor pelo id</li><br>

Para executar os testes de integração:

```
php artisan test
```

Os testes cobrem os endpoints principais da API.

## Considerações finais

Fique a vontade para sugerir melhorias, relatar bugs ou até criticar de maneira produtiva. 

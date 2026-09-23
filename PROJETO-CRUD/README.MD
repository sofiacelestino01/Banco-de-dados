# API CRUD de Produtos

API REST desenvolvida em **PHP puro**, utilizando **PDO** para conexão com **PostgreSQL**.

O projeto implementa um CRUD de produtos, permitindo **cadastrar, consultar, atualizar e excluir produtos** através dos métodos HTTP `POST`, `GET`, `PUT` e `DELETE`.

## Tecnologias utilizadas

* PHP
* PostgreSQL
* PDO
* API REST
* JSON
* Variáveis de ambiente

## Estrutura do projeto

```text
PROJETO-CRUD/
│
├── conexao.php
├── produtos.php
└── README.md
```

### `conexao.php`

Responsável por realizar a conexão com o banco de dados PostgreSQL utilizando PDO.

As informações de conexão são obtidas por meio de variáveis de ambiente, evitando deixar usuário, senha e outros dados de acesso diretamente no código.

### `produtos.php`

É o arquivo principal da API. Ele identifica o método HTTP utilizado e executa a operação correspondente no banco de dados.

## Banco de dados

A API utiliza uma tabela chamada `produtos`.

Exemplo de estrutura:

```sql
CREATE TABLE produtos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco NUMERIC(10,2) NOT NULL
);
```

## Configuração das variáveis de ambiente

Antes de executar a API, é necessário configurar as informações do banco de dados.

Exemplo:

```text
DB_HOST=localhost
DB_USER=postgres
DB_PASSWORD=sua_senha
DB_NAME=seu_banco
```

Esses valores são utilizados pelo arquivo `conexao.php` através de `getenv()`.

> Não coloque senhas ou outras credenciais diretamente no código ou no GitHub.

## Métodos da API

### GET — Listar produtos

Retorna todos os produtos cadastrados no banco de dados.

**Requisição:**

```http
GET /produtos.php
```

**Resposta de exemplo:**

```json
[
    {
        "id": 1,
        "nome": "Notebook",
        "preco": "3500.00"
    },
    {
        "id": 2,
        "nome": "Mouse",
        "preco": "80.00"
    }
]
```

**Status:** `200 OK`

---

### POST — Cadastrar produto

Utilizado para cadastrar um novo produto.

**Requisição:**

```http
POST /produtos.php
```

**JSON enviado:**

```json
{
    "nome": "Teclado",
    "preco": 150.00
}
```

O campo `nome` deve ser uma string não vazia e `preco` deve possuir um valor numérico.

**Resposta:**

```json
{
    "Mensagem": "Produto Cadastrado com Sucesso!"
}
```

**Status:** `201 Created`

---

### PUT — Atualizar produto

Utilizado para alterar um produto existente.

**Requisição:**

```http
PUT /produtos.php
```

**JSON enviado:**

```json
{
    "id": 1,
    "nome": "Notebook Gamer",
    "preco": 4500.00
}
```

O `id` deve ser um número inteiro.

Caso o produto não exista, a API retorna:

```json
{
    "Mensagem": "Produto não encontrado."
}
```

**Status:** `404 Not Found`

Em caso de atualização realizada com sucesso:

**Status:** `200 O

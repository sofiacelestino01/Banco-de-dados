# API REST — Sistema de Chamados

## 📋 Sobre o projeto

Este projeto consiste no desenvolvimento de uma **API REST em PHP puro**, sem a utilização de frameworks, para gerenciamento de chamados técnicos.

A API realiza a comunicação com um banco de dados **PostgreSQL** utilizando **PDO** e trabalha com informações no formato **JSON** para receber requisições e retornar respostas.

Cada chamado possui informações sobre:

- Equipamento;
- Setor;
- Descrição;
- Prioridade;
- Status.

O projeto foi desenvolvido com foco na aplicação prática dos conceitos de **Backend, APIs REST, CRUD, banco de dados, HTTP, JSON, PDO e segurança de dados**.

---

## 🎯 Objetivo

O principal objetivo do projeto é criar uma API capaz de realizar as operações básicas de gerenciamento de chamados, permitindo:

- Cadastrar novos chamados;
- Consultar chamados cadastrados;
- Atualizar chamados existentes;
- Excluir chamados;
- Validar os dados recebidos;
- Tratar erros durante as operações;
- Utilizar uma conexão segura com o banco de dados.

As operações seguem o conceito de **CRUD**:

| Operação | Método HTTP | Função |
|----------|-------------|--------|
| Create | `POST` | Criar um chamado |
| Read | `GET` | Consultar chamados |
| Update | `PUT` | Atualizar um chamado |
| Delete | `DELETE` | Excluir um chamado |

---

## 🛠️ Tecnologias utilizadas

- **PHP**
- **PostgreSQL**
- **PDO**
- **API REST**
- **JSON**
- **HTTP**
- **Git e GitHub**
- **VS Code**

---

## 📁 Estrutura do projeto

```text
PROJETO-CRUD/
│
├── conexao.php
├── chamados.php
└── README.md

```

---

Print de Todo o Processo da Atividade

Aqui eu criei o Banco de Dados no Moba
![alt text](<Captura de tela 2026-09-23 104301-1.png>)
Aqui eu criei a Tabela 
![alt text](<Captura de tela 2026-09-23 104322.png>)
Depois eu fiz o o conexao.php para comecar
![alt text](<Captura de tela 2026-09-23 104332.png>)
Depos eu fiz a estrutura no chamados.php
![alt text](<Captura de tela 2026-09-23 104342.png>)
Depois eu conferi o meu Localhost
![alt text](<Captura de tela 2026-09-23 105833.png>)
Depois fui para o Thunder
![alt text](<Captura de tela 2026-09-23 110238.png>)
Depois eu fiz o Teste
![alt text](<Captura de tela 2026-09-23 110252.png>)
![alt text](<Captura de tela 2026-09-23 110337.png>)
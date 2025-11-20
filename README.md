# 🚀 Trial WMS - Sistema de Cadastro de Tarefas (CRUD)

Este projeto implementa o teste técnico de desenvolvedor trainee, entregando uma aplicação completa de lista de tarefas (To-Do List) com base em arquitetura RESTful.

## 🛠️ Stack Tecnológica

| Componente | Ferramenta | Função |
| **Backend** | Laravel 9 | API RESTful com rotas de Resource. |
| **Banco de Dados** | PostgreSQL | Persistência de dados (Rodando em Docker). |
| **Ambiente** | Docker / WSL2 | Ambiente de desenvolvimento isolado. |
| **Frontend** | Vue 3 | Lógica da aplicação (Composition API). |
| **Framework UI** | Quasar 2 | Componentes e layout. |
| **Comunicação** | Axios | Consumo da API pelo Front-end. |

---

## 1. Pré-Requisitos para Início Rápido

O projeto utiliza **Laravel Sail** para isolamento, sendo necessário apenas:

* ✅ **Docker Desktop** (Com WSL2 ativado).
* ✅ **Git** (Instalado no WSL).
* ✅ **Node.js/NPM** (Instalado no WSL para o Front-end).

## 2. Instalação e Configuração

Assumindo que você clonou o repositório e está na pasta raiz (`trialTarefas/`):

### 2.1. Back-end: Inicialização e Banco

1.  Entre na pasta do Backend:
    ```bash
    cd todo-backend
    ```
2.  Suba os contêineres e o banco de dados (PostgreSQL):
    ```bash
    ./vendor/bin/sail up -d
    ```
3.  Execute as Migrations (criação das tabelas no PostgreSQL):
    ```bash
    ./vendor/bin/sail artisan migrate
    ```

### 2.2. Front-end: Instalação de Dependências

1.  Abra um terminal separado e entre na pasta do Front-end:
    ```bash
    cd todo-frontend
    ```
2.  Instale as dependências:
    ```bash
    npm install
    ```

## 3. Comandos para Rodar o Projeto

### 3.1. API (Backend)

O servidor do Laravel já estará rodando em segundo plano após a instalação:
* **Endpoint Principal:** `http://localhost/api/tarefa`

### 3.2. Aplicação Visual (Frontend)

Rode o servidor de desenvolvimento do Quasar:
```bash
npx quasar dev

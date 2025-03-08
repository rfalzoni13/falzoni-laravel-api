# Projeto de Demonstração Web Api PHP por Renato Falzoni

Este projeto é de simples demonstração, desenvolvido com tecnologia Laravel 11 com PHP 8

O Projeto está no modelo MVC e consta com as seguintes camadas:

- Controllers: As Controllers da aplicação, responsável pelas rotas que receberão as requisições e farão as devidas tratativas
- Models: Coração do projeto com as entidades do negócio
- Providers: Camada responsável pelo controle das Injeções de Dependências
- Repositories: Camada responsável pela persistência dos dados
- Services: Responsável pela aplicação das regras de negócio.

O Projeto ainda possui testes automatizados, como testes de integração e testes unitários

Atualmente, o projeto suporte os seguintes bancos de dados:
- MySQL 8.0
- SQLite (Banco de dados em memória para testes).
# 🚗 Sistema de Reserva de Veículos

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange.svg)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

Sistema simples para gerenciamento de reservas de veículos, desenvolvido em PHP com MySQL. Permite cadastrar, listar e reservar veículos de forma prática e eficiente, ideal para pequenas empresas ou uso interno.

---

## 📋 Funcionalidades

- ✅ Cadastro de veículos
- ✅ Listagem de veículos disponíveis
- ✅ Reserva de veículos por data e horário
- ✅ Verificação de conflitos de horário
- ✅ Sistema simples, leve e rápido

---

## 🧰 Tecnologias Utilizadas

- **Linguagem:** PHP (sem frameworks)
- **Banco de Dados:** MySQL
- **Front-end:** HTML + CSS (sem Bootstrap)
- **Servidor Web:** Apache / PHP Built-in Server
- **Bibliotecas:** Composer (autoloader)
- **Compatibilidade:** Windows e Linux

---

## 📂 Estrutura do Projeto

```
Reserva-Veiculos/
├── conexao.php # Conexão com o banco de dados
├── pagina_listar.php # Página principal com listagem de veículos
├── processa.php # Lógica de inserção de reservas
├── reserva_carro.php # Formulário de reserva
├── banco.sql # Script para criação da tabela (opcional)
├── composer.json # Configuração do Composer (se usado)
└── vendor/ # Autoload do Composer
```

---

## 🚀 Como Executar o Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/Tecnologia-JNG/Reserva-Veiculos.git
cd Reserva-Veiculos
```

### 2. Configurar o Banco de Dados
Crie um banco no MySQL com nome reserva_veiculos

Importe o script SQL (banco.sql se existir)

## 🧪 Exemplo de Uso
Acesse a página inicial.

Veja a lista de veículos.

Clique em "Reservar" ao lado do veículo desejado.

Preencha data, horário e confirme.

O sistema verifica conflitos e salva a reserva.

## 📝 Licença
Este projeto é licenciado sob os termos da Licença MIT. Veja o arquivo LICENSE para mais detalhes.

## 🙋‍♂️ Autor
Desenvolvido por Tecnologia JNG 💻

Se este projeto te ajudou, deixe uma ⭐ no repositório!

---

## 📣 Contato

- **Autor:** Tecnologia JNG  
- **E-mail:** ti@jng.com  

---

> “O sucesso nasce do querer, da determinação e da vontade de se chegar a um ideal.” – Napoleon Hill

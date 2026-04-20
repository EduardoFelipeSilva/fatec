# 2024-1-sistema-gerenciamento-estoque

# ZenEstoques 📊

<p align="center">
   <img src="https://github.com/user-attachments/assets/637d882b-f516-4def-aa12-01b49f79213a" alt="Banner ZenEstoques" width="50%"/>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/STATUS-EM%20DESENVOLVIMENTO-green?style=for-the-badge"/>


<p align="center">
    <b>ZenEstoque</b> é um sistema web integrado para gerenciamento de estoques e visualização de dados gerenciais, focado na redução de desperdícios.
</p>
Link da prototipação: (https://www.figma.com/design/KXQOthT1VJ7MJtVzWpTMSF/CRM-Dashboard-Customers-List--Community-?node-id=0-1&p=f&t=wkuFL7zdl30CQow1-0)

---

## 🚀 Objetivo

O **ZenEstoque**, desenvolvido por alunos da **Fatec Ferraz de Vasconcelos**, tem como objetivo digitalizar e otimizar a gestão de estoque (com foco em alimentos perecíveis). A missão é evitar prejuízos, reduzir desperdícios e contribuir para práticas sustentáveis.

### 🎯 Objetivos Específicos

- ✅ **Notificações Inteligentes:** Lembretes pontuais e dicas de reposição.
- ✅ **Análise de Dados:** Dashboards amigáveis para análise de vendas e métricas.
- ✅ **Controle de Fluxo:** Gerenciamento completo de entrada (compras) e saída (vendas).
- ✅ **Previsão de Desperdício:** Análise de histórico de consumo e ranking de "urgência de uso" para itens próximos ao vencimento.

## 📋 Funcionalidades Principais

### 1. Dashboard Interativa
Painel visual para acompanhamento de métricas em tempo real.
*   **📈 Cards de Resumo:** Visualização rápida de estatísticas.
*   **🎨 Interface:** Menu lateral (Sidebar) fixo e responsivo, barra de pesquisa e notificações.

<p align="center">
   <img src="https://github.com/user-attachments/assets/de847f84-5042-4b7c-8076-1936c823e75e" width="50%"/>
</p>

### 2. Gestão de Estoque (Zen Estoques)
Módulo dedicado ao cadastro detalhado de produtos.
*   **📦 Formulário Completo:** Cadastro de Informações Financeiras, Logística (Validade, Armazenamento) e Dados Técnicos.
*   **🛡️ Validação:** Verificação robusta de tipos de dados (front-end e back-end).

<p align="center">
   <img src="https://github.com/user-attachments/assets/5c9c4444-3f76-46ea-86f8-680abe84807c" width="50%"/>
</p>

### 3. Perfil de Usuário e Configurações
*   **👤 Gestão de Conta:** Edição de avatar e dados pessoais.
*   **⚙️ Preferências:** Interface com Modal para configurações rápidas e transições suaves.

### 4. Central de Ajuda
*   **❓ Suporte:** Página estilizada com Grid Layout responsivo e cards interativos.

## 🛠 Tecnologias Utilizadas

| Categoria | Tecnologias |
| :--- | :--- |
| **Front-end** | HTML5, CSS3, JavaScript, **Bootstrap 5** |
| **Back-end** | **PHP** (Processamento e lógica de servidor) |
| **Banco de Dados** | **MySQL** (Conexão via PDO) |

## 📂 Estrutura do Projeto

> ⚠️ **Nota:** O projeto está em processo de migração para a arquitetura MVC.


*   `resources/css/`: Contém os estilos modulares (`navbar.css`, `perfil.css`, `ajuda.css`, `editar.css`).

*   `test antigo/Zen_Estoques/`: Lógica do sistema de estoque (ex: `cadastro.php`).

*   `test antigo/dashboard/`: Arquivos estruturais da dashboard visual.

*   `resources/js/`: Scripts para validação (`cadastro_produto.js`).

## 🔧 Como Executar o Projeto

1.  **Pré-requisitos:** Tenha instalado um servidor local como XAMPP, WAMP ou Laragon.
2.  **Clonagem:** Clone este repositório na pasta pública do servidor (ex: `htdocs`).
3.  **Banco de Dados:**
    *   Importe o arquivo `zenestoque.sql`.
    *   Configure o arquivo `conexao.php` com suas credenciais.
4.  **Execução:** Acesse `http://localhost/seu-projeto/` no navegador.

## 👥 Desenvolvedores

[Eduardo Eduardo Felipe](https://github.com/EduardoFelipeSilva)
    
[Vinicius Evangelista de Souza](https://github.com/ViniciusEva)

[Rafaela dos Santos Marques](https://github.com/Rafa15MQS)

 👥 Orientadores

[Jeferson](https://github.com/jefersonrl)

[Francisco](https://github.com/franciscodouglas/franciscodouglas)

[Marcia]()

---

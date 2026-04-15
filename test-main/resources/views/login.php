<?php 
$mensagem = "";

// Simulação de validação
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // Aqui você faria a validação no banco
        if ($email == "admin@teste.com" && $senha == "123456") {
            $mensagem = "Login realizado com sucesso!";
        } else {
            $mensagem = "Usuário ou senha incorretos!";
        }
    } elseif (isset($_POST['cadastro'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // Aqui você faria o INSERT no banco de dados
        $mensagem = "Cadastro realizado com sucesso para $email!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="container">
    <h2 id="form-titulo">Login / Cadastro</h2>

    <div id="mensagem" class="mensagem"></div>

    <!-- Seção do formulário de Login -->
    <div id="loginSection" class="form-section">
        <form id="loginForm">
            <input type="email" id="emailLogin" name="email" placeholder="E-mail" required>
            <input type="password" id="senhaLogin" name="senha" placeholder="Senha" required>
            
            <div>
                <button type="submit" id="btn-login">Login</button>
                <button type="button" id="btn-toggle-cadastro">Cadastrar</button>
            </div>
        </form>
    </div>

    <!-- Seção do formulário de Cadastro -->
    <div id="cadastroSection" class="form-section hidden">
        <form id="cadastroForm">
            <input type="text" id="nomeCadastro" name="nome" placeholder="Nome Completo" required>
            <input type="text" id="cpfCadastro" name="cpf" placeholder="CPF" required>
            <input type="date" id="dataNascimentoCadastro" name="data_nascimento" placeholder="Data de Nascimento" required>
            <input type="email" id="emailCadastro" name="email" placeholder="E-mail" required>
            <input type="password" id="senhaCadastro" name="senha" placeholder="Senha" required>
            <input type="password" id="confirmaSenhaCadastro" name="confirma_senha" placeholder="Confirmar Senha" required>
            
            <div>
                <button type="submit" id="btn-cadastro">Cadastrar</button>
                <button type="button" id="btn-voltar">Voltar</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>

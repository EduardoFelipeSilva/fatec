<?php
    if(!session_status() == PHP_SESSION_NONE) {
        Header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../public/Logo/logo.png" type="image/png">
    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="container">
    <h2 id="form-titulo">Login</h2>

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
            <input type="text" id="nome" name="nome" placeholder="Nome Completo">
            <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            <input type="text" id="telefone" name="telefone" placeholder="Telefone" required>
            <input type="text" id="endereco" name="endereco" placeholder="endereco" required>
            <input type="text" id="cargo" name="cargo" placeholder="Cargo" >

            <input type="text" id="foto" name="foto" placeholder="Foto" required>

            

            <div>
                <button type="submit" id="btn-cadastro">Cadastrar</button>
                <button type="button" id="btn-voltar">Voltar</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>


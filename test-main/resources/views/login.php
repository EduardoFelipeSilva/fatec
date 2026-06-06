<?php
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    if (isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../public/Logo/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px 10px;
        }
        .login-card {
            width: 100%;
            max-width: 480px;
            padding: 1rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin: auto;
        }
        .hidden { display: none !important; }
        .btn-purple { background-color: #6f42c1; color: white; }
        .btn-purple:hover { background-color: #5a32a3; color: white; }
        .form-label { font-weight: 500; color: #495057; margin-bottom: 0.05rem; font-size: 0.8rem; }
        .form-control { padding: 0.35rem 0.75rem; font-size: 0.9rem; }
        .form-section { transition: opacity 0.3s ease; }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-1">
        <img src="../public/Logo/logo.png" alt="Logo" width="50" class="mb-1">
        <h2 id="form-titulo" class="fw-bold mb-0" style="font-size: 1.25rem;">Entrar no Sistema</h2>
    </div>

    <div id="mensagem" class="mensagem mb-1 text-center small" style="min-height: 18px;"></div>

    <!-- Seção do formulário de Login -->
    <div id="loginSection" class="form-section">
        <form id="loginForm" class="row g-2">
            <div class="col-12">
                <label for="emailLogin" class="form-label">E-mail</label>
                <input type="email" id="emailLogin" name="email" class="form-control" placeholder="exemplo@email.com" required>
            </div>
            <div class="col-12 mb-1">
                <label for="senhaLogin" class="form-label">Senha</label>
                <input type="password" id="senhaLogin" name="senha" class="form-control" placeholder="Sua senha" required>
            </div>
            
            <div class="col-12 d-grid gap-2">
                <button type="submit" id="btn-login" class="btn btn-purple py-1 fw-bold">Login</button>
                <button type="button" id="btn-toggle-cadastro" class="btn btn-link text-decoration-none text-muted py-0 small">Não tem conta? Cadastre-se</button>
            </div>
        </form>
    </div>

    <!-- Seção do formulário de Cadastro -->
    <div id="cadastroSection" class="form-section hidden">
        <form id="cadastroForm" class="row g-1">
            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome completo" required>
            </div>
            <div class="col-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>
            <div class="col-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(00) 00000-0000" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>
            <div class="col-6">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="col-6">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Cidade / Estado" required>
            </div>
            <div class="col-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Mínimo 8 caracteres" required>
            </div>
            <input type="hidden" id="foto" name="foto" value="">
            <div class="col-12 d-grid gap-1 mt-1">
                <button type="submit" id="btn-cadastro" class="btn btn-purple py-1 fw-bold">Cadastrar</button>
                <button type="button" id="btn-voltar" class="btn btn-link text-decoration-none text-muted py-0 small">Voltar ao Login</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>

<?php
session_start();


require_once '../model/Usuario.php';
require_once '../dao/UsuarioDao.php';

    if ($_POST['acao'] === "Salvar") {

        $erros = [];
    if (empty($_POST['cpf'])) {

        $erros[] = "Digite um CPF!";

    } else {

        $cpf = ($_POST['cpf']);

        if (strlen($cpf) != 11) {
            $erros[] = "O CPF deve conter 11 dígitos!";
        }
    }

        if (empty($_POST['email'])) {
        $erros[] = "Digite um email!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Digite um email válido!";
    } elseif (UsuarioDao::emailExiste($_POST['email'])) {
        $erros[] = "Este email já está cadastrado!";
    }

    if (empty($_POST['senha'])) {
        $erros[] = "Digite uma senha!";
    } elseif (strlen($_POST['senha']) < 8) {
        $erros[] = "A senha deve conter pelo menos 8 caracteres!";
    }

    if (!empty($erros)) {

        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }

    } else {

        $usuario = new Usuario();

        $usuario->setNome($_POST['nome']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setEndereco($_POST['endereco']);
        $usuario->setCargo($_POST['cargo'] ?? null);
        $usuario->setNivelAcesso($_POST['nivel_acesso'] ?? null);
        $usuario->setFoto($_POST['foto'] ?? null);
        $usuario->setStatus($_POST['id_status'] ?? $_POST['status'] ?? null);

        try {

            $UsuarioDao = UsuarioDao::insert($usuario);

            echo "sucesso";

        } catch (Exception $e) {

            echo "Erro ao salvar usuário!";
        }
    }
}

    if ($_POST['acao'] === "Delete"){
        try {
            $UsuarioDao = UsuarioDao::delete($_POST['id']);
            header("Location: index.php");
        }catch(Exception $e) {
                echo 'Exceção capturada: ', $e->getMessage(), "\n";
        }
    }

    if ($_POST['acao'] === "Update") {

        $erros = [];
    if (empty($_POST['cpf'])) {

        $erros[] = "Digite um CPF!";

    } else {

        $cpf = ($_POST['cpf']);

        if (strlen($cpf) != 11) {
            $erros[] = "O CPF deve conter 11 dígitos!";
        }
    }

        if (empty($_POST['email'])) {
        $erros[] = "Digite um email!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Digite um email válido!";
    } elseif (UsuarioDao::emailExiste($_POST['email'])) {
        $erros[] = "Este email já está cadastrado!";
    }

    if (empty($_POST['senha'])) {
        $erros[] = "Digite uma senha!";
    } elseif (strlen($_POST['senha']) < 8) {
        $erros[] = "A senha deve conter pelo menos 8 caracteres!";
    }

    if (!empty($erros)) {

        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }

    } else {

        $usuario = new Usuario();

        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setEndereco($_POST['endereco']);
        $usuario->setCargo($_POST['cargo'] ?? null);
        $usuario->setNivelAcesso($_POST['nivel_acesso'] ?? null);
        $usuario->setFoto($_POST['foto'] ?? null);
       $usuario->setStatus($_POST[2]);

        try {

            $UsuarioDao = UsuarioDao::update($usuario);

            echo "sucesso";

        } catch (Exception $e) {

            echo "Erro ao salvar usuário!";
        }
    }
}

    if ($_POST['acao'] === "Login") {

        $usuario = UsuarioDao::login($_POST['email'], $_POST['senha']);

    if ($usuario) {

        $_SESSION['usuario_id'] = $usuario['id_user'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];

        echo "sucesso";

    } else {
        echo "Email ou senha incorretos!";
    }
    }

    if ($_POST['acao'] === "UpdatePerfil") {

    $usuario = new Usuario();

    $usuario->setId($_POST['id']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setTelefone($_POST['telefone']);
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    $nomeArquivo = time() . "_" . $_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../imagens/" . $nomeArquivo
    );

    $caminhoFoto = "../imagens/" . $nomeArquivo;

} else {

    $caminhoFoto = $_POST['foto_atual'];

}

$usuario->setFoto($caminhoFoto);
    

    try {
        $UsuarioDao = UsuarioDao::updatePerfil($usuario);
        header("Location: ../views/perfil.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/perfil.php?erro=1");
        exit();
    }
}


?> 




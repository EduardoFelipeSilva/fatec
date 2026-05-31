<?php include "../database.php";

    $nome = $_POST ['nome'];
    $cpf = $_POST ['cpf'];
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];
    $telefone = $_POST ['telefone'];
    $endereco = $_POST ['endereco'];
    $cargo = $_POST ['cargo'];
    $nivel_acesso = $_POST ['nivel_acesso'];
    $foto = $_POST ['foto'];
    $id_status = 1;

    $sql = "INSERT INTO users (nome, cpf, email, senha, telefone, endereco, cargo, nivel_acesso, foto, id_status) VALUES ('$nome', '$cpf', '$email', '$senha', '$telefone', '$endereco', '$cargo', '$nivel_acesso', '$foto', '$id_status')";

    if(mysqli_query($conexao,$sql))
    {
        echo "Cadastro realizado com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar o Cadastro";
        header("Location: ../../form_cadas_usuario.php");

    }


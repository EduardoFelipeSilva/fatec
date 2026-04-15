<?php include "../database.php";

    $id_user = $_GET ['id_user'];
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

    $sql_update = "UPDATE users SET nome = '$nome', cpf = '$cpf', email = '$email', senha = '$senha', telefone = '$telefone', endereco = '$endereco', cargo = '$cargo', nivel_acesso = '$nivel_acesso', foto = '$foto', id_status = '$id_status' WHERE users.id_user = '$id_user'";
    if(mysqli_query($conexao,$sql_update))
    {
        echo "Atualização realizada com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar a Atualização";
        header("Location: ../../form_atualiza_usuario.php");

    }
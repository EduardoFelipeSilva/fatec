<?php include "../database.php";

    $nome = $_POST ['nome'];
    $local = $_POST ['local'];
    $capacidade = $_POST ['capacidade'];
    $id_status = 1;

    $sql = "INSERT INTO armazenamento (nome, local, capacidade, id_status) VALUES ('$id_user', '$tipo_armazenamento', '$nome', '$local', '$capacidade', '$id_status')";

    if(mysqli_query($conexao,$sql))
    {
        echo "Cadastro realizado com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar o Cadastro";
        header("Location: ../../form_cadas_armazenamento.php");

    }
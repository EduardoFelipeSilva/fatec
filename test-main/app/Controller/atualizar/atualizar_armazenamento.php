<?php include "../database.php";

    $id_user = $_GET ['id_user'];
    $tipo_armazenamento = $_POST ['tipo_armazenamento'];
    $nome = $_POST ['nome'];
    $local = $_POST ['local'];
    $capacidade = $_POST ['capacidade'];
    $id_status = 1;

    $sql_update = "UPDATE armazenamento SET tipo_armazenamento = '$tipo_armazenamento', nome = '$nome', local = '$local', capacidade = '$capacidade', id_status = '$id_status' WHERE armazenamento.id_armazenamento = '$id_armazenamento'";
    if(mysqli_query($conexao,$sql_update))
    {
        echo "Atualização realizada com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar a Atualização";
        header("Location: ../../form_atualiza_armazenamento.php");

    }
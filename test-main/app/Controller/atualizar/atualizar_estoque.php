<?php include "../database.php";

    $id_produto = $_GET ['id_produto'];
    $id_armazenamento = $_POST ['id_armazenamento'];
    $quantidade = $_POST ['quantidade'];
    $id_status = 1;

    $sql_update = "UPDATE estoque SET id_produto = '$id_produto', id_armazenamento = '$id_armazenamento', quantidade = '$quantidade', id_status = '$id_status' WHERE estoque.id_estoque = '$id_estoque'";
    if(mysqli_query($conexao,$sql_update))
    {
        echo "Atualização realizada com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar a Atualização";
        header("Location: ../../form_atualiza_estoque.php");

    }
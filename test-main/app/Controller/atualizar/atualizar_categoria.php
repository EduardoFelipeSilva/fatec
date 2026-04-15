<?php include "../database.php";

    $id_categoria = $_GET ['id_categoria'];
    $nome = $_POST ['nome'];

    $sql_update = "UPDATE categoria SET nome = '$nome' WHERE categoria.id_categoria = '$id_categoria'";
    if(mysqli_query($conexao,$sql_update))
    {
        echo "Atualização realizada com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar a Atualização";
        header("Location: ../../form_atualiza_categoria.php");

    }
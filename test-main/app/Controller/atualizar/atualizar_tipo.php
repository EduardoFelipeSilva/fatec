<?php include "../database.php";

    $id_tipo = $_GET ['id_tipo'];
    $nome = $_POST ['nome'];

    $sql_update = "UPDATE tipo SET nome = '$nome' WHERE tipo.id_tipo = '$id_tipo'";
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
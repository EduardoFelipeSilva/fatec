<?php include "../database.php";

    $id_marca = $_GET ['id_marca'];
    $nome = $_POST ['nome'];

    $sql_update = "UPDATE marca SET nome = '$nome' WHERE marca.id_marca = '$id_marca'";
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
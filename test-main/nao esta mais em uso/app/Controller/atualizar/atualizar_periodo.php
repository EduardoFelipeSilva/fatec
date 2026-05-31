<?php include "../database.php";

    $id_periodo = $_GET ['id_periodo'];
    $nome = $_POST ['nome'];

    $sql_update = "UPDATE periodo SET nome = '$nome' WHERE periodo.id_periodo = '$id_periodo'";
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
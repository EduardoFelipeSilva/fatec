<?php include "../database.php";

    $id_marca = $_GET['id_marca'];
    $sql_excluir = "DELETE FROM marca WHERE marca.id_marca = '$id_marca'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location: ../../index.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
        header("location: ../../index.php");
    }
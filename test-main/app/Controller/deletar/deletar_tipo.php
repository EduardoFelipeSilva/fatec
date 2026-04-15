<?php include "../database.php";

 $id_tipo = $_GET['id_tipo'];
    $sql_excluir = "DELETE FROM tipo WHERE tipo.id_tipo = '$id_tipo'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location: ../../index.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
        header("location: ../../index.php");
    }
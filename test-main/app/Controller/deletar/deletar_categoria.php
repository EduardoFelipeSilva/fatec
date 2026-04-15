<?php include "../database.php";

    $id_categoria = $_GET['id_categoria'];
    $sql_excluir = "DELETE FROM categoria WHERE categoria.id_categoria = '$id_categoria'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location: ../../index.php");   
    }else
    {
        echo "Falha ao excluir o cadastro";
        header("location: ../../index.php");
    }
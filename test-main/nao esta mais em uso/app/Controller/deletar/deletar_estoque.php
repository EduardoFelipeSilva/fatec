<?php include "../database.php";

    
    $id_estoque = $_GET['id_estoque'];
    $id_status = 2;

    
    $sql_excluir = "UPDATE estoque SET id_status = '$id_status' WHERE estoque.id_estoque = '$id_estoque'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location:PraVerainda.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
    }
?>
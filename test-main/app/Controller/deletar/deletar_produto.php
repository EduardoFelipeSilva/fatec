<?php include "../database.php";

    
    $id_produto = $_GET['id_produto'];
    $id_status = 2;

    
    $sql_excluir = "UPDATE produto SET id_status = '$id_status' WHERE produtos.id_produto = '$id_produto'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location:PraVerainda.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
    }
?>
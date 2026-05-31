<?php include "../database.php";

    
    $id_armazenamento = $_GET['id_armazenamento'];
    $id_status = 2;

    
    $sql_excluir = "UPDATE armazenamento SET id_status = '$id_status' WHERE armazenamento.id_armazenamento = '$id_armazenamento'";

    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location:PraVerainda.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
    }
?>
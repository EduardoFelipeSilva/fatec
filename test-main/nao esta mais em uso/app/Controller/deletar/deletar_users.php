<?php include "../database.php";

    
    $id_user = $_GET['id_user'];
    $id_status = 2;



    $sql_excluir = "UPDATE users SET id_status = '$id_status' WHERE users.id_user = '$id_user'";

    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location:PraVerainda.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
    }
?>
<?php include "../database.php";

    $id_periodo = $_GET['id_periodo'];
    $sql_excluir = "DELETE FROM periodo WHERE periodo.id_periodo = '$id_periodo'";
    if(mysqli_query($conexao,$sql_excluir))
    { 
        echo "Exclusão realizada com sucesso";
        header("location: ../../index.php");
    }else
    {
        echo "Falha ao excluir o cadastro";
        header("location: ../../index.php");
    }
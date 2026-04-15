<?php include "../database.php";

    $nome = $_POST ['nome'];

    $sql = "INSERT INTO marca (nome) VALUES ('$nome')";
    
    if(mysqli_query($conexao,$sql))
    {
        echo "Cadastro realizado com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar o Cadastro";
        header("Location: ../../form_cadas_usuario.php");

    }
?>
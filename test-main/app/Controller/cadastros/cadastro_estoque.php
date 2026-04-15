<?php include "../database.php";

    $id_produto = $_POST ['id_produto'];
    $id_armazenamento = $_POST ['id_armazenamento'];
    $quantidade = $_POST ['quantidade'];
    $id_status = 1;

    $sql = "INSERT INTO estoque (id_produto, id_armazenamento, quantidade, id_status) VALUES ('$id_produto', '$id_armazenamento', '$quantidade', '$id_status')";
    if(mysqli_query($conexao,$sql))
    {
        echo "Cadastro realizado com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar o Cadastro";
        header("Location: ../../form_cadas_estoque.php");

    }

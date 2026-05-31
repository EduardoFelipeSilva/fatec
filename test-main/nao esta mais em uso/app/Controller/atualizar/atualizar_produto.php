<?php include "../database.php";

    $id_produto = $_GET ['id_produto'];
    $nome = $_POST ['nome'];
    $preco = $_POST ['preco'];
    $custo = $_POST ['custo'];
    $lucro = $_POST ['lucro'];
    $descricao = $_POST ['descricao'];
    $id_categoria = $_POST ['id_categoria'];
    $id_tipo = $_POST ['id_tipo'];
    $id_marca = $_POST ['id_marca'];
    $id_status = 1;

    $sql_update = "UPDATE produtos SET nome = '$nome', preco = '$preco', custo = '$custo', lucro = '$lucro', descricao = '$descricao', id_categoria = '$id_categoria', id_tipo = '$id_tipo', id_marca = '$id_marca' WHERE produtos.id_produto = '$id_produto'";
    if(mysqli_query($conexao,$sql_update))
    {
        echo "Atualização realizada com sucesso";
        header("location: ../../index.php");
    }

    else
    {
        echo "Falha ao realizar a Atualização";
        header("Location: ../../form_atualiza_produto.php");

    }
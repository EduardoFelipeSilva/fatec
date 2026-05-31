<?php include "../database.php";

    $nome = $_POST ['nome'];
    $preco = $_POST ['preco'];
    $custo = $_POST ['custo'];
    $lucro = $_POST ['lucro'];
    $descricao = $_POST ['descricao'];
    $id_categoria = $_POST ['id_categoria'];
    $id_tipo = $_POST ['id_tipo'];
    $id_marca = $_POST ['id_marca'];
    $id_status = 1;

    $sql = "INSERT INTO produtos (nome, preco, custo, lucro, descricao, id_categoria, id_tipo, id_marca, id_status) VALUES ('$nome', '$preco', '$custo', '$lucro', '$descricao', '$id_categoria', '$id_tipo', '$id_marca', '$id_status')";
    
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
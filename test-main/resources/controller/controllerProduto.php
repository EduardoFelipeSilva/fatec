<?php


require_once '../model/Produto.php';
require_once '../dao/ProdutoDao.php';
if ($_POST['acao'] === "Salvar"){
    $produto = new  Produto(); 


    $produto->setNome($_POST['nome']); 
    $produto->setPreco($_POST['preco']); 
    $produto->setCusto($_POST['custo']); 
    $produto->setDescricao($_POST['descricao']); 
    $produto->setIdCategoria($_POST['idCategoria']); 
    $produto->setIdTipo($_POST['idTipo']); 
    $produto->setIdMarca($_POST['idMarca']); 
    $produto->setIdStatus(1); 

    try {
        ProdutoDao::insert($produto);

        header("Location: ../views/produtos.php?sucesso=1");
        exit();

    } catch(Exception $e) {

        header("Location: ../views/cadastroProduto.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Delete"){
    try {
        $ProdutoDao = ProdutoDao::delete($_POST['id']);
        header("Location: ../views/produtos.php?excluido=1");
        exit();
    }catch(Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}


if ($_POST['acao'] === "Update") {

    $produto = new Produto();

    $produto->setId($_POST['id']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setCusto($_POST['custo']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setIdCategoria($_POST['idCategoria']);
    $produto->setIdTipo($_POST['idTipo']);
    $produto->setIdMarca($_POST['idMarca']);

    try {

        ProdutoDao::Update($produto);

        header("Location: ../views/produtos.php?update=1");
        exit();

    } catch(Exception $e) {
        echo 'Exceção capturada: ', $e->getMessage();
    }
}
?> 


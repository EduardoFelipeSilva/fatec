<?php

require_once '../model/Estoque.php';
require_once '../dao/EstoqueDao.php';
require_once '../dao/VendaDao.php';

if ($_POST['acao'] === "Salvar") {

    try {

        $idProduto = $_POST['idProduto'];
        $idArmazenamento = $_POST['idArmazenamento'];
        $quantidade = intval($_POST['quantidade']);

        $estoqueExistente = EstoqueDao::buscarProdutoArmazenamento(
            $idProduto,
            $idArmazenamento
        );

        if ($estoqueExistente) {

            $novaQuantidade = intval($estoqueExistente['quantidade']) + $quantidade;

            EstoqueDao::alterarQuantidade(
                $estoqueExistente['id_estoque'],
                $novaQuantidade
            );

            header("Location: ../views/estoque.php?entrada=1");
            exit();

        } else {

            $estoque = new Estoque();

            $estoque->setIdProduto($idProduto);
            $estoque->setIdArmazenamento($idArmazenamento);
            $estoque->setQuantidade($quantidade);
            $estoque->setStatus(1);

            EstoqueDao::insert($estoque);

            header("Location: ../views/estoque.php?sucesso=1");
            exit();
        }

    } catch(Exception $e) {
        header("Location: ../views/estoque.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Delete") {
    try {
        EstoqueDao::delete($_POST['id']);
        header("Location: ../views/estoque.php?excluido=1");
        exit();
    } catch(Exception $e) {
        echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}

if ($_POST['acao'] === "Update") {

    $estoque = new Estoque();

    $estoque->setIdProduto($_POST['idProduto']);
    $estoque->setIdArmazenamento($_POST['idArmazenamento']);
    $estoque->setQuantidade($_POST['quantidade']);
    $estoque->setStatus($_POST['status']);
    $estoque->setId($_POST['id']);

    try {
        EstoqueDao::update($estoque);
        header("Location: ../views/estoque.php?update=1");
        exit();
    } catch(Exception $e) {
        echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}

if ($_POST['acao'] === "AdicionarQuantidade") {

    $estoqueAtual = EstoqueDao::selectById($_POST['id']);

    $novaQuantidade = intval($estoqueAtual['quantidade']) + intval($_POST['quantidade']);

    try {
        EstoqueDao::alterarQuantidade($_POST['id'], $novaQuantidade);

        header("Location: ../views/estoque.php?entrada=1");
        exit();

    } catch (Exception $e) {
        header("Location: ../views/estoque.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "RemoverQuantidade") {

    $estoqueAtual = EstoqueDao::selectById($_POST['id']);

    $quantidadeRemovida = intval($_POST['quantidade']);
    $novaQuantidade = intval($estoqueAtual['quantidade']) - $quantidadeRemovida;

    if ($novaQuantidade < 0) {
        header("Location: ../views/estoque.php?erro=1");
        exit();
    }

    try {

        EstoqueDao::alterarQuantidade($_POST['id'], $novaQuantidade);

        $venda = [
            'id_estoque' => $_POST['id'],
            'id_produto' => $estoqueAtual['id_produto'],
            'id_armazenamento' => $estoqueAtual['id_armazenamento'],
            'id_periodo' => $_POST['id_periodo'],
            'quantidade' => $quantidadeRemovida,
            'data_venda' => date('Y-m-d')
        ];

        VendaDao::insert($venda);

        header("Location: ../views/estoque.php?saida=1");
        exit();

    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }
}

?>
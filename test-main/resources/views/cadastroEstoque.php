<?php
include 'sessao.php';
require_once "../dao/EstoqueDao.php";
require_once "../dao/ProdutoDao.php";
require_once '../dao/ArmazenamentoDao.php';
$produto = ProdutoDao::selectById($_POST['id']);
$armazenamentos = ArmazenamentoDao::selectAll();


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estoque</title>
    <link rel="icon" href="../public/logo/logo.png" type="image/png">
    <link rel="stylesheet" href="../cadastro_produto/style_cadastr.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/cadastro_produto.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>

    
    <div class="container-fluid p-0 dashboard-container">
        <div class="row g-0">
            <aside class="col-14 col-md-2">
                <?php include 'navbarLateral.php'; ?>

                
            </aside>       
            
            
            <main class="content col-12 col-md-10">

                <div class="page-header">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <a href="javascript:history.back()" 
                        class="btn text-white d-inline-flex align-items-center justify-content-center cursor-pointer" 
                        style="width: 40px; height: 40px; border-radius: 50%; background-color: #6f42c1; border: none; transition: background-color 0.2s;"
                        onmouseover="this.style.backgroundColor='#5a32a3'"
                        onmouseout="this.style.backgroundColor='#6f42c1'">
                            <i class="bi bi-arrow-left" style="font-size: 1.25rem; line-height: 1;"></i>
                        </a>
                        <h1 class="m-0">Cadastrar Estoque</h1>
                    </div>
                        <p class="text-muted m-0" style="padding-left: 52px;">Preencha o formulário abaixo para cadastrar no estoque!</p>
                </div>

            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success">
                    Estoque cadastrado com sucesso!
                </div>
                    <?php } ?>

                    <?php if(isset($_GET['erro'])) { ?>
                        <div class="alert alert-danger">
                            Erro ao cadastrar estoque.
                        </div>
            <?php } ?>

                <form action="../Controller/controllerEstoque.php" method="POST" class="form-container">
                    <input type="hidden" name="acao" value="Salvar">
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="hidden" id="id_produto" name="idProduto" placeholder="Nome do Produto" value="<?= $produto['id_produto'] ?>">
                                <label for="nome">Nome</label>
                                <input
                                type="text"
                                value="<?= $produto['nome'] ?>"
                                readonly>
                            </div>
                            <div class="form-group">
                                <label for="armazenamento">Armazenamento</label>
                                <select id="id_armazenamento" name="idArmazenamento">
                                    <option value="">Armazenamento</option>

                                    <?php foreach($armazenamentos as $armazenamento) { ?>
                                        <option value="<?= $armazenamento['id_armazenamento'] ?>">
                                            <?= $armazenamento  ['nome'] ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="capacidade">Quantidade</label>
                                <input type="number" id="quantidade" name="quantidade" placeholder="Quantidade no Estoque" step="0.01">
                            </div>
                        </div>

                        

                    
                    
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Cadastrar Estoque</button>
                        </div>
                    </div>
                </form>
            </main>
    </div>

    <script src="../js/cadastro_produto.js"></script>
</body>
</html>

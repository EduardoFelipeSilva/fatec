<?php
include 'sessao.php';
require_once "../dao/CategoriaDao.php";
require_once "../dao/TipoDao.php";
require_once "../dao/MarcaDao.php";
require_once "../dao/ProdutoDao.php";
$categorias = CategoriaDao::selectAll();
$tipos = TipoDao::selectAll();
$marcas = MarcaDao::selectAll();
$produto = ProdutoDao::selectById($_POST['id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar de Produtos</title>
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
        </div>    
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
                        <h1 class="m-0">Editar Produto</h1>
                    </div>
                        <p class="text-muted m-0" style="padding-left: 52px;">Preencha o formulário abaixo para atualizar o produto de sua loja!</p>
                    </div>

            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success">
                    Produto atualizado com sucesso!
                </div>
                    <?php } ?>

                    <?php if(isset($_GET['erro'])) { ?>
                        <div class="alert alert-danger">
                            Erro ao atualizar produto.
                        </div>
            <?php } ?>

                <form action="../controller/controllerProduto.php" method="POST" class="form-container">
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>" placeholder="Nome do Produto" required>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" id="preco" name="preco" value="<?= $produto['preco'] ?>" placeholder="Preço do Produto" step="0.01" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="custo">Custo</label>
                                <input type="number" id="custo" name="custo" value="<?= $produto['custo'] ?>" placeholder="Custo do Produto" step="0.01">
                            </div>

                        </div>

                        <div class="form-group full-width">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" placeholder="Detalhes do Produto" required><?= $produto['descricao'] ?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                    <select id="id_categoria" name="idCategoria">

                                        <?php foreach($categorias as $categoria) { ?>
                                            <option
                                                value="<?= $categoria['id_categoria'] ?>"
                                                <?= ($categoria['id_categoria'] == $produto['id_categoria']) ? 'selected' : '' ?>
                                            >
                                                <?= $categoria['nome'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                            </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                        <select id="id_tipo" name="idTipo">

                                            <?php foreach($tipos as $tipo) { ?>
                                                <option
                                                    value="<?= $tipo['id_tipo'] ?>"
                                                    <?= ($tipo['id_tipo'] == $produto['id_tipo']) ? 'selected' : '' ?>
                                                >
                                                    <?= $tipo['nome'] ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                </div>
                        </div>
                        

                            
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                        <select id="id_marca" name="idMarca">

                                            <?php foreach($marcas as $marca) { ?>
                                                <option
                                                    value="<?= $marca['id_marca'] ?>"
                                                    <?= ($marca['id_marca'] == $produto['id_marca']) ? 'selected' : '' ?>
                                                >
                                                    <?= $marca['nome'] ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                </div>

                            <input type="hidden" name="acao" value="Update">
                            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Atualizar Produto</button>
                        </div>
                    </div>
                </form>
            </main>
    </div>

    <script src="../js/cadastro_produto.js"></script>
</body>
</html>

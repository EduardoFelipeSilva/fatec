<?php



require_once "../dao/CategoriaDao.php";
require_once "../dao/TipoDao.php";
require_once "../dao/MarcaDao.php";

$categorias = CategoriaDao::selectAll();
$tipos = TipoDao::selectAll();
$marcas = MarcaDao::selectAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="icon" href="../../logo/logo.png" type="image/png">
    <link rel="stylesheet" href="../cadastro_produto/style_cadastr.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/cadastro_produto.css">
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
                        <h1 class="m-0">Cadastro de Produtos</h1>
                    </div>
                    <p class="text-muted m-0" style="padding-left: 52px;">Preencha os formulários abaixo para cadastrar o produto de sua loja!</p>
                </div>

            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success">
                    Produto cadastrado com sucesso!
                </div>
                    <?php } ?>

                    <?php if(isset($_GET['erro'])) { ?>
                        <div class="alert alert-danger">
                            Erro ao cadastrar produto.
                        </div>
            <?php } ?>

                <form action="../controller/controllerProduto.php" method="POST" class="form-container">
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do Produto">
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" id="preco" name="preco" placeholder="Preço do Produto" step="0.01">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="custo">Custo</label>
                                <input type="number" id="custo" name="custo" placeholder="Custo do Produto" step="0.01">
                            </div>

                        </div>

                        <div class="form-group full-width">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" placeholder="Detalhes do Produto"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="id_categoria" name="idCategoria">
                                    <option value="">Categoria</option>

                                    <?php foreach($categorias as $categoria) { ?>
                                        <option value="<?= $categoria['id_categoria'] ?>">
                                            <?= $categoria['nome'] ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <select id="id_tipo" name="idTipo">
                                        <option value="">Tipo</option>

                                        <?php foreach($tipos as $tipo) { ?>
                                            <option value="<?= $tipo['id_tipo'] ?>">
                                                <?= $tipo['nome'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                        </div>
                        

                            
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <select id="id_marca" name="idMarca">
                                        <option value="">Marca</option>

                                        <?php foreach($marcas as $marca) { ?>
                                            <option value="<?= $marca['id_marca'] ?>">
                                                <?= $marca['nome'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                            <input type="hidden" name="acao" value="Salvar">
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Cadastrar Produto</button>
                        </div>
                    </div>
                </form>
            </main>
    </div>

    <script src="../js/cadastro_produto.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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
                    <h1>Cadastro de Produtos</h1>
                    <p>Preencha os formulários abaixo para cadastrar o produto de sua loja!</p>
                </div>

                <form action="../../app/Controller/cadastros/cadastro_produto.php" method="POST" class="form-container">
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
                            <div class="form-group">
                                <label for="lucro">Lucro</label>
                                <input type="number" id="lucro" name="lucro" placeholder="Valor de Venda do Produto" step="0.01">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" placeholder="Detalhes do Produto"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="id_categoria" name="id_categoria">
                                    <option value="">Categoria</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select id="id_tipo" name="id_tipo">
                                    <option value="">Tipo</option>
                                    </select>
                            </div>
                        </div>
                        

                            
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <select id="id_marca" name="id_marca">
                                    <option value="">Marca</option>
                                    </select>
                            </div>
                        

                    
                    
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
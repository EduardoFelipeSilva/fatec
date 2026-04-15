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
                    <h1>Cadastro de Periodos</h1>
                    <p>Preencha o formulário abaixo para cadastrar o período!</p>
                </div>

                <form action="../../app/Controller/cadastros/cadastro_periodo.php" method="POST" class="form-container">
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do Período">
                            </div>
                        
                        </div>
                    
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Cadastrar Período</button>
                        </div>
                    </div>
                </form>
            </main>
    </div>

    <script src="../js/cadastro_produto.js"></script>
</body>
</html>
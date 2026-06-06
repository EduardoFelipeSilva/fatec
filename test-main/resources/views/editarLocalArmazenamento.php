<?php
include 'sessao.php';
require_once "../dao/ArmazenamentoDao.php";
$local = ArmazenamentoDao::selectById($_POST['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Local </title>
    <link rel="icon" href="../public/Logo/logo.png" type="image/png">
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
                        <h1 class="m-0">Editar Local de Armazenamento</h1>
                        </div>
                        <p class="text-muted m-0" style="padding-left: 52px;">Preencha o formulário abaixo para editar o local de armazenamento!</p>
                </div>

            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success">
                    Local de armazenamento atualizado com sucesso!
                </div>
                    <?php } ?>

                    <?php if(isset($_GET['erro'])) { ?>
                        <div class="alert alert-danger">
                            Erro ao atualizar local de armazenamento.
                        </div>
            <?php } ?>

                <form action="../controller/controllerArmazenamento.php" method="POST" class="form-container">
                    <input type="hidden" name="acao" value="Update">
                    <input type="hidden" name="id" value="<?= $local['id_armazenamento'] ?>">
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?= $local['nome'] ?>" placeholder="Nome do Local de Armazenamento">
                            </div>
                            <div class="form-group">
                                <label for="local">Local</label>
                                <input type="text" id="local" name="local" value="<?= $local['local'] ?>" placeholder="Local do Local de Armazenamento">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="capacidade">Capacidade</label>
                                <input type="number" id="capacidade" name="capacidade" value="<?= $local['capacidade'] ?>" placeholder="Capacidade do Local de Armazenamento" step="0.01">
                            </div>
                        </div>

                        

                    
                    
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Atualizar Local de Armazenamento</button>
                        </div>
                    </div>
                </form>
            </main>
    </div>

    <script src="../js/cadastro_produto.js"></script>
</body>
</html>

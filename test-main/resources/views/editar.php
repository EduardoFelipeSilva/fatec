<?php include 'sessao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="icon" href="../../logo/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/editar.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>

<div class="dashboard-container">
    <?php include 'navbarLateral.php'; ?>

    <main class="content-area">
    
    <div class="help-container">
        

        <div class="help-card">
            <a href="produtos.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Produtos</h3>
                        <p>
                            Clique para acessar o gerenciamento de produtos do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>

                    </div>

                </div>
            </a>
        </div>
        <div class="help-card">
            <a href="categorias.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-tags-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Categorias</h3>
                        <p>
                            Clique para acessar o gerenciamento de categorias do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot "></span>
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>

                    </div>

                </div>
            </a>
        </div>
        <div class="help-card">
            <a href="armazenamentos.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-building-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Armazenamentos</h3>
                        <p>
                            Clique para acessar o gerenciamento de armazenamentos do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot "></span>
                        <span class="dot"></span>
                        <span class="dot active" ></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>

                    </div>

                </div>
            </a>
        </div>
        <div class="help-card">
            <a href="marcas.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-bookmark-star-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Marcas</h3>
                        <p>
                            Clique para acessar o gerenciamento de marcas do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>

                    </div>

                </div>
            </a>
        </div>
        <div class="help-card">
            <a href="periodos.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Períodos</h3>
                        <p>
                            Clique para acessar o gerenciamento de períodos do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot active"></span>
                        <span class="dot"></span>

                    </div>

                </div>
            </a>
        </div>
        <div class="help-card">
            <a href="tipos.php" style="text-decoration: none; color: inherit;">
                <div class="help-card">

                    <div class="icon-wrapper">
                        <div class="icon-placeholder">
                            <i class="bi bi-diagram-3-fill"></i>
                        </div>
                    </div>

                    <div class="card-body-content">
                        <h3>Tipos</h3>
                        <p>
                            Clique para acessar o gerenciamento de tipos do sistema.
                        </p>
                    </div>

                    <div class="pagination-dots">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot active"></span>
                    </div>

                </div>
            </a>
        </div>
    


    </div>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
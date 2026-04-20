<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>

<div class="container-fluid">
    
    <div class="row">

        <?php include 'navbarLateral.php'; ?>
        <!-- Main Content -->
        <main class="col-12 col-md-12 d-flex flex-column align-items-center justify-content-center main-content" style="height: 100vh;">
            
<a href="cadastroProduto.php" class="btn-link active">
    <button class="action-btn">
        <i class="bi bi-person-plus action-icon"></i>
<span>Cadastro</span>
    </button>
</a>
            <a href="vendas.php"><button class="action-btn">
                <i class="bi bi-bookmark action-icon"></i> Consultar
            </button></a>
            <a href="login.php"><button class="action-btn">
                <i class="bi bi-pencil-square action-icon"></i> Login
            </button></a>
            <a href="navbarLateral.php"><button class="action-btn">
                <i class="bi bi-download action-icon"></i> Remover
            </button></a>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
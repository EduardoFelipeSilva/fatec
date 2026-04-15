<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    
        <!-- Sidebar -->
        <nav class="col-12 col-md-2 sidebar d-flex flex-column justify-content-between">
            <div>
                <!-- Adição dos icones da sidebar e os textos -->
                <h4 class="px-3">Dashboard <small class="text-muted"></small></h4>
                <a href="index.php"><i class="bi bi-house-door action-icon"></i>Home</a>
                <a href="#"><i class="bi bi-speedometer2 action-icon"></i>Dashboard</a>
                <a href="produtos.php"><i class="bi bi-person-plus action-icon"></i>Produtos</a>
                <a href="vendas.php"><i class="bi bi-cart action-icon"></i>Vendas</a>
                <a href="editar.php"><i class="bi bi-pencil-square action-icon"></i>Editar</a>
                <a href="ajuda.php"><i class="bi bi-question-circle action-icon"></i>Ajuda</a>
            </div>

            <!-- Adição do Drop-up do mini perfil de usuário -->
            <?php include 'drop_up.php'; ?>

            
    </nav>
    
    

    


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/navbar.js"></script>
</body>

</html>


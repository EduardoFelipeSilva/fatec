<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda</title>
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
        <a href="../views/admin.php">
            <div class="icon-wrapper" >
                <div class="icon-placeholder">
                    <i class="bi bi-person-badge-fill"></i>
                </div></a>
            </div>
    
            <div class="card-body-content">
                <h3>Administrador</h3>
                <p>Lorem ipsum dolor sit amet, mea regione diamet principes at. Cum no movi lorem ipsum dolor sit dim.</p>
            </div>

            <div class="pagination-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    
        <div class="help-card">
            <div class="icon-wrapper">
                <div class="icon-placeholder">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
            
            <div class="card-body-content">
                <h3>Usuário Comum</h3>
                <p>Lorem ipsum dolor sit amet, mea regione diamet principes at. Cum no movi lorem ipsum dolor sit dim.</p>
            </div>

            <div class="pagination-dots">
                <span class="dot"></span>
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

    </div>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema - Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/perfil.css"> 
</head>
<body>

    <div class="main-wrapper">
        <nav class="sidebar d-flex flex-column justify-content-between">
            <div>
                <div class="sidebar-header px-3 mb-4">
                    <h4>Dashboard</h4>
                </div>
                <a href="index.php" class="active"><i class="bi bi-house-door action-icon"></i>Home</a>
                <a href="#"><i class="bi bi-speedometer2 action-icon"></i>Dashboard</a>
                <a href="cadastroProduto.php"><i class="bi bi-person-plus action-icon"></i>Cadastro Produto</a>
                <a href="vendas.php"><i class="bi bi-cart action-icon"></i>Vendas</a>
                <a href="#"><i class="bi bi-pencil-square action-icon"></i>Editar</a>
                <a href="ajuda.php"><i class="bi bi-question-circle action-icon"></i>Ajuda</a>
            </div>

            <div class="px-3 pb-4">
                <?php include 'drop_up.php'; ?>
            </div>
        </nav>

        <main class="content-area">
            <div class="profile-card">
                <button class="close-btn">&times;</button>
                
                <div class="profile-header">
                    <div class="avatar-wrapper">
                        <img src="https://via.placeholder.com/100" alt="Foto de Perfil" id="profile-img">
                        <label for="upload-photo" class="edit-icon">✎</label>
                        <input type="file" id="upload-photo" accept="image/*" hidden>
                    </div>
                    <div class="header-info">
                        <h2 id="display-name">Vinicius Evangelista</h2>
                        <p id="display-email">vinicius@email.com</p>
                    </div>
                </div>

                <hr>

                <form id="profile-form">
                    <div class="input-group-custom">
                        <label>Nome</label>
                        <input type="text" name="name" value="Vinicius Evangelista">
                    </div>
                    <div class="input-group-custom">
                        <label>E-mail</label>
                        <input type="email" name="email" value="vinicius@email.com">
                    </div>
                    <div class="input-group-custom">
                        <label>Número de Telefone</label>
                        <input type="text" name="phone" placeholder="Adicionar número">
                    </div>
                    <div class="input-group-custom">
                        <label>Localização</label>
                        <input type="text" name="location" value="Brasil">
                    </div>

                    <button type="submit" class="save-btn">Salvar Alterações</button>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
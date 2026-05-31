<?php


require_once '../dao/UsuarioDao.php';


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema - Perfil</title>
    <link rel="icon" href="../../logo/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/navbar.css"> <link rel="stylesheet" href="../css/perfil.css"> 
</head>
<body>

    <div class="dashboard-container">
        
        <?php include 'navbarLateral.php'; ?>

        <main class="content">
            <div class="profile-card">

            <?php if(isset($_GET['update'])) { ?>
                <div class="alert alert-success">
                    Usuario atualizado com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['erro'])) { ?>
                <div class="alert alert-danger">
                    Ocorreu um erro na operação.
                </div>
            <?php } ?>

                <button class="close-btn" onclick="window.history.back()">&times;</button>
                
                <div class="profile-header">
                    <div class="avatar-wrapper">
                        <img src="<?= $usuario['foto'] ?>"  alt="Foto de Perfil" id="profile-img">
                        <label for="upload-photo" class="edit-icon">✎</label>
                        <input type="file" id="upload-photo" accept="image/*" hidden>
                    </div>


                    <div class="header-info">
                        <h2 id="display-name"><?= $usuario['nome'] ?></h2>
                        <p id="display-email"><?= $usuario['email'] ?></p>
                    </div>
                </div>

                <hr>


                <form id="profile-form" action="../Controller/controllerUsuario.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="UpdatePerfil">
                    <input type="hidden" name="id" value="<?= $usuario['id_user'] ?> ">
                    <div class="input-group-custom">
                        <label>Nome</label>
                        <input type="text" name="nome"  value="<?= $usuario['nome'] ?>">
                    </div>
                    <div class="input-group-custom">
                        <label>E-mail</label>
                        <input type="email" name="email" value="<?= $usuario['email'] ?>">
                    </div>
                    <div class="input-group-custom">
                        <label>Número de Telefone</label>
                        <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" placeholder="Adicionar número">
                    </div>

                    <div class="input-group-custom">
                        <label>Foto de Perfil</label>
                            <input type="hidden" name="foto_atual" value="<?= $usuario['foto'] ?>">
                            <input type="file" name="foto" accept="image/*">
                    </div>

                    <button type="submit" class="save-btn">Salvar Alterações</button>
                </form>


            </div>


        </main>
    </div>

    <script>
setTimeout(() => {
    const alerta = document.querySelector('.alert');

    if(alerta){
        alerta.remove();
    }
}, 3000);
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
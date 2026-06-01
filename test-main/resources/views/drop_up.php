<?php


require_once '../dao/UsuarioDao.php';
$id_usuario = $_SESSION['usuario_id'];
$usuario = UsuarioDao::selectById($id_usuario);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Perfil e Configurações</title>
    <link rel="icon" href="../../logo/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/drop_up.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script>
        const savedAppTheme = localStorage.getItem('appTheme');
        if (savedAppTheme === 'dark') {
            document.documentElement.classList.add('dark-theme');
        }
        const savedFontSize = localStorage.getItem('appFontSize');
        if (savedFontSize === 'large') {
            document.documentElement.classList.add('large-font');
        }
    </script>
</head>
<body>

    <div class="trigger" id="trigger-profile">
        <div class="profile-trigger-area">
            <img src="../../logo/logo.png" class="rounded-circle" alt="User" width="60">
            <p class="mt-2 mb-0"><?= $usuario['nome'] ?></p>
            <small class="text-muted"><?= $usuario['cargo'] ?></small>
        </div>

        <div class="dropup-container" id="main-contai">
            <div class="profile-container" id="profile-container">
                <div class="profile-header">
                    <div class="profile-avatar-wrapper">
                        <img src="../../logo/logo.png" alt="Foto de Perfil" class="profile-avatar">
                    </div>
                    <div class="profile-info">
                        <h3 class="profile-name"><?= $usuario['nome'] ?></h3>
                        <p class="profile-email"><?= $usuario['email'] ?></p>
                    </div>
                </div>

                <div class="menu-items">
                    <a href="perfil.php" class="menu-item" style="text-decoration: none; color: inherit;">
                        <i class='bx bxs-user'></i>
                        <span>Meu Perfil</span>
                        <i class='bx bx-chevron-right arrow'></i>
                    </a>
                    <div class="menu-item" id="settings-item">
                        <i class='bx bxs-cog'></i>
                        <span>Configurações</span>
                        <i class='bx bx-chevron-right arrow'></i>
                    </div>




                    <div class="menu-item notification-item" id="notification-toggle">
                        <i class='bx bxs-bell'></i>
                        <span>Notificação</span>
                        <span class="notification-status">Permitir</span>
                        <i class='bx bx-chevron-right arrow'></i>
                        
                        <div class="notification-options" id="notification-options">
                            <div class="option">Permitir</div>
                            <div class="option">Silenciar</div>
                        </div>
                    </div>


                    <!-- Arrumar, coloca a div onclick como div principal -->
                    <div class="menu-item logout-item">
                        <i class='bx bx-log-out'></i>
                        <div onclick="window.location='../controller/logout.php'">
                            Sair
                        </div>
                    </div>
                </div>
            </div>

            <div class="settings-modal" id="settings-modal">
                <div class="settings-header">
                    <h3>Configurações</h3>
                    <i class='bx bx-x close-btn' id="close-settings"></i>
                </div>
                <hr>
                <div class="settings-item theme-item">
                    <div class="setting-text">Tema</div>
                    <div class="setting-value theme-select">
                        <span id="theme-value">Claro</span>
                        <button type="button" class="theme-toggle-btn" id="theme-toggle-btn">Usar Escuro</button>
                    </div>
                </div>
                <div class="settings-item font-item">
                    <div class="setting-text">Fonte</div>
                    <div class="setting-value font-select">
                        <span id="font-size-value">Normal</span>
                        <button type="button" class="font-toggle-btn" id="font-toggle-btn">Aumentar Fonte</button>
                    </div>
                </div>
                <div class="settings-item">
                    <div class="setting-text">Idioma</div>
                    <div class="setting-value">
                        <span>PT-BR</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </div>
    </div>
    </div>

    <script src="../js/drop_up.js"></script>
</body>
</html>
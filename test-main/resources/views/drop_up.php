<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Perfil e Configurações</title>
    <link rel="stylesheet" href="../css/drop_up.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="trigger" id="trigger-profile">
        <div class="profile-trigger-area">
            <img src="../Imagens/bluesky.svg" class="rounded-circle" alt="User" width="60">
            <p class="mt-2 mb-0">Marival</p>
            <small class="text-muted">Administrador</small>
        </div>

        <div class="dropup-container" id="main-contai">
            <div class="profile-container" id="profile-container">
                <div class="profile-header">
                    <div class="profile-avatar-wrapper">
                        <img src="https://via.placeholder.com/150" alt="Foto de Perfil" class="profile-avatar">
                    </div>
                    <div class="profile-info">
                        <h3 class="profile-name">Seu nome</h3>
                        <p class="profile-email">seuemail@gmail.com</p>
                    </div>
                </div>

                <div class="menu-items">
                    <div class="menu-item">
                        <i class='bx bxs-user'></i>
                        <span>Meu Perfil</span>
                        <i class='bx bx-chevron-right arrow'></i>
                    </div>
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
                        <div onclick="window.location='http://localhost/test5-main/test5-main/test-main/resources/views/login.php'">
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
                <div class="settings-item">
                    <div class="setting-text">Tema</div>
                    <div class="setting-value"><span>Claro</span>
                        <i class='bx bx-chevron-down'></i>
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
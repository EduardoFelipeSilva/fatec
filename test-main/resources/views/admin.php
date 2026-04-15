<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="dashboard-container">

        <?php include 'navbarLateral.php'; ?>

        <main class="content-area">
            <div class="container-fluid pt-4">
                <div class="row g-4">
                    
                    <div class="col-12 col-md-4">
                        <div class="admin-card">
                            <div class="card-header-blue text-center">Base de Dados</div>
                            <div class="card-body-custom">
                                <i class="bi bi-database-fill admin-icon"></i>
                                <p class="card-description">
                                    Aqui você pode realizar o envio de novas bases de dados para aprovação, ou caso seja um administrador do sistema você também pode aprovar as bases de dados enviadas.
                                </p>
                                <a href="#" class="btn-outline-custom">Enviar</a>
                                <a href="#" class="btn-outline-custom">Aprovar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="admin-card">
                            <div class="card-header-blue text-center">Novos Usuários</div>
                            <div class="card-body-custom">
                                <i class="bi bi-person-fill admin-icon"></i>
                                <p class="card-description">
                                    Aqui você pode realizar a aprovação de novos usuários ao sistema.
                                </p>
                                <div style="margin-top: auto; width: 100%;">
                                    <a href="#" class="btn-outline-custom">Novos usuários</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="admin-card">
                            <div class="card-header-blue text-center">Busca de Cálculos</div>
                            <div class="card-body-custom">
                                <i class="bi bi-search admin-icon"></i>
                                <p class="card-description">
                                    Aqui você pode realizar os cálculos do sistema, sejam eles betas ou premiums.
                                </p>
                                <a href="#" class="btn-outline-custom">Cálculos beta</a>
                                <a href="#" class="btn-outline-custom">Cálculos premium</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
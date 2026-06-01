<?php

include 'sessao.php';
require_once '../dao/VendaDao.php';

$limite = 10;

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;

$buscaVenda = $_GET['buscaVenda'] ?? '';
$ordenarPor = $_GET['ordenarPor'] ?? 'id_venda';
$ordem = $_GET['ordem'] ?? 'DESC';

$vendas = VendaDao::selectDashboard(
    $inicio,
    $limite,
    $buscaVenda,
    $ordenarPor,
    $ordem
);

$totalVendasFiltro = VendaDao::totalDashboard($buscaVenda);
$totalPaginas = max(1, ceil($totalVendasFiltro / $limite));

$totalVendas = VendaDao::totalVendas();
$totalVendidoHoje = VendaDao::totalVendidoHoje();
$totalQuantidadeVendida = VendaDao::totalQuantidadeVendida();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <link rel="icon" href="../../logo/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/venda.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>

<div class="dashboard-container">

    <?php include "navbarLateral.php"; ?>

    <main class="content">

        <header class="main-header">

            <div class="header-left">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <a href="javascript:history.back()" 
                       class="btn text-white d-inline-flex align-items-center justify-content-center cursor-pointer" 
                       style="width: 40px; height: 40px; border-radius: 50%; background-color: #6f42c1; border: none; transition: background-color 0.2s;"
                       onmouseover="this.style.backgroundColor='#5a32a3'"
                       onmouseout="this.style.backgroundColor='#6f42c1'">

                        <i class="bi bi-arrow-left" style="font-size: 1.25rem; line-height: 1;"></i>

                    </a>

                    <h1 class="m-0">Vendas</h1>
                </div>

                <p class="text-muted m-0" style="padding-left: 52px;">
                    Abaixo estão as vendas registradas no sistema.
                </p>
            </div>

        </header>

        <section class="summary-cards">

            <div class="card">
                <div class="card-icon">
                    <span class="material-icons">shopping_cart</span>
                </div>

                <div class="card-info">
                    <div class="card-title">Total de Vendas</div>
                    <div class="card-value"><?= $totalVendas ?></div>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <span class="material-icons">inventory_2</span>
                </div>

                <div class="card-info">
                    <div class="card-title">Itens Vendidos</div>
                    <div class="card-value"><?= $totalQuantidadeVendida ?></div>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <span class="material-icons">today</span>
                </div>

                <div class="card-info">
                    <div class="card-title">Vendido Hoje</div>
                    <div class="card-value"><?= $totalVendidoHoje ?></div>
                </div>
            </div>

        </section>

        <section class="sales-table-container">

            <div class="table-header">

                <h2>Vendas no Sistema</h2>

                <form method="GET" class="table-controls">

                    <div class="search-box small">
                        <span class="material-icons">search</span>

                        <input
                            type="text"
                            name="buscaVenda"
                            placeholder="Buscar venda..."
                            value="<?= htmlspecialchars($buscaVenda) ?>"
                        >
                    </div>

                    <select name="ordenarPor" class="form-select">
                        <option value="id_venda" <?= ($ordenarPor == 'id_venda') ? 'selected' : '' ?>>
                            ID
                        </option>

                        <option value="produto" <?= ($ordenarPor == 'produto') ? 'selected' : '' ?>>
                            Produto
                        </option>

                        <option value="armazenamento" <?= ($ordenarPor == 'armazenamento') ? 'selected' : '' ?>>
                            Armazenamento
                        </option>

                        <option value="periodo" <?= ($ordenarPor == 'periodo') ? 'selected' : '' ?>>
                            Período
                        </option>

                        <option value="quantidade" <?= ($ordenarPor == 'quantidade') ? 'selected' : '' ?>>
                            Quantidade
                        </option>

                        <option value="data_venda" <?= ($ordenarPor == 'data_venda') ? 'selected' : '' ?>>
                            Data
                        </option>
                    </select>

                    <select name="ordem" class="form-select">
                        <option value="DESC" <?= ($ordem == 'DESC') ? 'selected' : '' ?>>
                            Desc
                        </option>

                        <option value="ASC" <?= ($ordem == 'ASC') ? 'selected' : '' ?>>
                            Asc
                        </option>
                    </select>

                    <button type="submit" class="btn btn-purple">
                        Filtrar
                    </button>

                </form>

            </div>

            <?php if(isset($_GET['saida'])) { ?>
                <div class="alert alert-success">
                    Venda registrada com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['erro'])) { ?>
                <div class="alert alert-danger">
                    Ocorreu um erro na operação.
                </div>
            <?php } ?>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Armazenamento</th>
                            <th>Período</th>
                            <th>Quantidade</th>
                            <th>Data da Venda</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if(count($vendas) > 0): ?>

                        <?php foreach($vendas as $venda): ?>

                            <tr>
                                <td><?= $venda['id_venda'] ?></td>

                                <td>
                                    <?= htmlspecialchars($venda['produto'] ?? 'Não informado') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($venda['armazenamento'] ?? 'Não informado') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($venda['periodo'] ?? 'Não informado') ?>
                                </td>

                                <td>
                                    <?= $venda['quantidade'] ?>
                                </td>

                                <td>
                                    <?= date('d/m/Y', strtotime($venda['data_venda'])) ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="text-center py-5">

                                <div class="d-flex flex-column align-items-center">

                                    <i class="bi bi-search" style="font-size: 50px; color: #999;"></i>

                                    <h5 class="mt-3 mb-1">
                                        Nenhuma venda encontrada
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Tente pesquisar outro produto, período ou limpar os filtros.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <?php if(count($vendas) > 0 && $totalPaginas > 1): ?>

                <div class="pagination-container">

                    <div class="pagination-info">
                        Página <?= $pagina ?> de <?= $totalPaginas ?>
                    </div>

                    <div class="pagination-links">

                        <?php if($pagina > 1): ?>

                            <a href="?pagina=<?= $pagina - 1 ?>&buscaVenda=<?= urlencode($buscaVenda) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_left</span>
                            </a>

                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>

                            <a
                                href="?pagina=<?= $i ?>&buscaVenda=<?= urlencode($buscaVenda) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>"
                                class="page-link <?= ($i == $pagina) ? 'active' : '' ?>">

                                <?= $i ?>

                            </a>

                        <?php endfor; ?>

                        <?php if($pagina < $totalPaginas): ?>

                            <a href="?pagina=<?= $pagina + 1 ?>&buscaVenda=<?= urlencode($buscaVenda) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_right</span>
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endif; ?>

        </section>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
setTimeout(() => {
    const alerta = document.querySelector('.alert');

    if(alerta){
        alerta.remove();
    }
}, 3000);
</script>

</body>
</html>
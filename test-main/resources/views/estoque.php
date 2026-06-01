<?php

include 'sessao.php';
require_once '../dao/EstoqueDao.php';
require_once "../dao/PeriodoDao.php";

$periodos = PeriodoDao::selectAll();

$limite = 10;

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

if ($pagina < 1) {
    $pagina = 1;
}

$inicio = ($pagina - 1) * $limite;

$buscaEstoque = $_GET['buscaEstoque'] ?? '';
$ordenarPor = $_GET['ordenarPor'] ?? 'id_estoque';
$ordem = $_GET['ordem'] ?? 'DESC';

$estoques = EstoqueDao::selectDashboard(
    $inicio,
    $limite,
    $buscaEstoque,
    $ordenarPor,
    $ordem
);

$totalEstoques = EstoqueDao::totalDashboard($buscaEstoque);
$totalPaginas = ceil($totalEstoques / $limite);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
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
                <h1>Olá <?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário') ?></h1>
            </div>
        </header>

        <section class="sales-table-container">

            <div class="table-header">

                <h2>Estoque</h2>

                <form method="GET" class="table-controls">

                    <div class="search-box small">
                        <span class="material-icons">search</span>

                        <input
                            type="text"
                            name="buscaEstoque"
                            placeholder="Buscar estoque..."
                            value="<?= htmlspecialchars($buscaEstoque) ?>"
                        >
                    </div>

                    <select name="ordenarPor" class="form-select">

                        <option value="produto_nome" <?= ($ordenarPor == 'produto_nome') ? 'selected' : '' ?>>
                            Produto
                        </option>

                        <option value="armazenamento_nome" <?= ($ordenarPor == 'armazenamento_nome') ? 'selected' : '' ?>>
                            Armazenamento
                        </option>

                        <option value="quantidade" <?= ($ordenarPor == 'quantidade') ? 'selected' : '' ?>>
                            Quantidade
                        </option>

                        <option value="id_status" <?= ($ordenarPor == 'id_status') ? 'selected' : '' ?>>
                            Status
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

            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success">
                    Estoque cadastrado com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['update'])) { ?>
                <div class="alert alert-success">
                    Estoque atualizado com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['entrada'])) { ?>
                <div class="alert alert-success">
                    Entrada adicionada ao estoque com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['saida'])) { ?>
                <div class="alert alert-success">
                    Saída removida do estoque com sucesso!
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
                            <th>Quantidade</th>
                            <th>Status</th>
                            <th>Adicionar</th>
                            <th>Remover </th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if(count($estoques) > 0): ?>

                        <?php foreach($estoques as $estoque): ?>

                            <tr>
                                <td>
                                    <?= $estoque['id_estoque'] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($estoque['produto_nome']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($estoque['armazenamento_nome']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($estoque['quantidade']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($estoque['id_status']) ?>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="icon-action border-0 bg-transparent btnEntradaEstoque"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEntradaEstoque"

                                        data-id="<?= $estoque['id_estoque'] ?>"
                                        data-produto="<?= htmlspecialchars($estoque['produto_nome']) ?>"
                                        data-armazenamento="<?= htmlspecialchars($estoque['armazenamento_nome']) ?>"
                                        data-quantidade="<?= htmlspecialchars($estoque['quantidade']) ?>"

                                        title="Adicionar quantidade">

                                        <i class="bi bi-plus-circle-fill text-success"></i>

                                    </button>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="icon-action border-0 bg-transparent btnSaidaEstoque"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalSaidaEstoque"

                                        data-id="<?= $estoque['id_estoque'] ?>"
                                        data-produto="<?= htmlspecialchars($estoque['produto_nome']) ?>"
                                        data-armazenamento="<?= htmlspecialchars($estoque['armazenamento_nome']) ?>"
                                        data-quantidade="<?= htmlspecialchars($estoque['quantidade']) ?>"

                                        title="Remover quantidade">

                                        <i class="bi bi-dash-circle-fill text-danger"></i>

                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="text-center py-5">

                                <div class="d-flex flex-column align-items-center">

                                    <i class="bi bi-search" style="font-size: 50px; color: #999;"></i>

                                    <h5 class="mt-3 mb-1">
                                        Nenhum estoque encontrado
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Tente pesquisar outro item ou limpar os filtros.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

                <div class="table-footer">

                    <div class="pagination-info">
                        Mostrando página <?= $pagina ?> de <?= $totalPaginas ?>
                    </div>

                    <div class="pagination-controls">

                        <?php if($pagina > 1): ?>
                            <a href="?pagina=<?= $pagina - 1 ?>&buscaEstoque=<?= urlencode($buscaEstoque) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_left</span>
                            </a>
                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
                            <a href="?pagina=<?= $i ?>&buscaEstoque=<?= urlencode($buscaEstoque) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>"
                               class="page-link <?= ($i == $pagina) ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <?php if($pagina < $totalPaginas): ?>
                            <a href="?pagina=<?= $pagina + 1 ?>&buscaEstoque=<?= urlencode($buscaEstoque) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_right</span>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

        </section>

    </main>

</div>

<div class="modal fade" id="modalEntradaEstoque" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 shadow">

            <div class="modal-header bg-success text-white">

                <h5 class="modal-title">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Adicionar Estoque
                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form action="../controller/controllerEstoque.php" method="POST">

                <div class="modal-body p-4">

                    <input type="hidden" name="acao" value="AdicionarQuantidade">
                    <input type="hidden" name="id" id="entradaIdEstoque">

                    <p class="mb-1">
                        Produto:
                        <strong id="entradaProdutoEstoque"></strong>
                    </p>

                    <p class="mb-1">
                        Armazenamento:
                        <strong id="entradaArmazenamentoEstoque"></strong>
                    </p>

                    <p class="mb-3">
                        Quantidade atual:
                        <strong id="entradaQuantidadeAtual"></strong>
                    </p>

                    <div class="mb-3">
                        <label class="form-label">
                            Quantidade para adicionar
                        </label>

                        <input
                            type="number"
                            name="quantidade"
                            class="form-control"
                            min="1"
                            required
                        >
                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Adicionar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade" id="modalSaidaEstoque" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 shadow">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    <i class="bi bi-dash-circle-fill me-2"></i>
                    Remover Estoque
                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form action="../controller/controllerEstoque.php" method="POST">

                <div class="modal-body p-4">

                    <input type="hidden" name="acao" value="RemoverQuantidade">
                    <input type="hidden" name="id" id="saidaIdEstoque">

                    <p class="mb-1">
                        Produto:
                        <strong id="saidaProdutoEstoque"></strong>
                    </p>

                    <p class="mb-1">
                        Armazenamento:
                        <strong id="saidaArmazenamentoEstoque"></strong>
                    </p>

                    <p class="mb-3">
                        Quantidade atual:
                        <strong id="saidaQuantidadeAtual"></strong>
                    </p>

                    <div class="mb-3">
                        <label class="form-label">
                            Quantidade para remover
                        </label>

                        <input
                            type="number"
                            name="quantidade"
                            class="form-control"
                            min="1"
                            required
                        >
                    </div>

                                        <div class="mb-3">
                        <label class="form-label">
                            Período da venda
                        </label>

                        <select name="id_periodo" class="form-control" required>
                            <option value="">Selecione o período</option>

                            <?php foreach ($periodos as $periodo) { ?>
                                <option value="<?= $periodo['id_periodo']; ?>">
                                    <?= $periodo['nome']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Remover
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const botoesEntrada = document.querySelectorAll('.btnEntradaEstoque');

botoesEntrada.forEach(botao => {
    botao.addEventListener('click', function () {
        document.getElementById('entradaIdEstoque').value = this.getAttribute('data-id');
        document.getElementById('entradaProdutoEstoque').innerText = this.getAttribute('data-produto');
        document.getElementById('entradaArmazenamentoEstoque').innerText = this.getAttribute('data-armazenamento');
        document.getElementById('entradaQuantidadeAtual').innerText = this.getAttribute('data-quantidade');
    });
});

const botoesSaida = document.querySelectorAll('.btnSaidaEstoque');

botoesSaida.forEach(botao => {
    botao.addEventListener('click', function () {
        document.getElementById('saidaIdEstoque').value = this.getAttribute('data-id');
        document.getElementById('saidaProdutoEstoque').innerText = this.getAttribute('data-produto');
        document.getElementById('saidaArmazenamentoEstoque').innerText = this.getAttribute('data-armazenamento');
        document.getElementById('saidaQuantidadeAtual').innerText = this.getAttribute('data-quantidade');
    });
});
</script>

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
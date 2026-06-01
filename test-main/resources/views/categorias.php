<?php
include 'sessao.php';



require_once '../dao/CategoriaDao.php';

$limite = 10;

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;

$buscaCategoria = $_GET['buscaCategoria'] ?? '';
$ordenarPor = $_GET['ordenarPor'] ?? 'id_categoria';
$ordem = $_GET['ordem'] ?? 'DESC';

$categorias = CategoriaDao::selectDashboard(
    $inicio,
    $limite,
    $buscaCategoria,
    $ordenarPor,
    $ordem
);

$totalCategorias = CategoriaDao::totalDashboard($buscaCategoria);
$totalPaginas = max(1, ceil($totalCategorias / $limite));

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Categorias</title>
    <link rel="icon" href="../public/Logo/logo.png" type="image/png">

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
                <h1 class="m-0">Categorias</h1>
                </div>
                <p class="text-muted m-0" style="padding-left: 52px;">Abaixo estão todas categorias .</p>
            </div>

            <a class="dropdown-item" href="cadastroCategoria.php">
            <div class="dropdown">
                <button type="button" class="btn btn-purple dropdown-toggle">
                    Nova
                </button></a>


            </div>

        </header>

        <section class="sales-table-container">

            <div class="table-header">

                <h2>Categorias no Sistema</h2>

                <form method="GET" class="table-controls">

                    <div class="search-box small">
                        <span class="material-icons">search</span>

                        <input
                            type="text"
                            name="buscaCategoria"
                            placeholder="Buscar categoria..."
                            value="<?= htmlspecialchars($buscaCategoria) ?>"
                        >
                    </div>

                    <select name="ordenarPor" class="form-select">
                        <option value="id_categoria" <?= ($ordenarPor == 'id_categoria') ? 'selected' : '' ?>>
                            ID
                        </option>

                        <option value="nome" <?= ($ordenarPor == 'nome') ? 'selected' : '' ?>>
                            Nome
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
                    Categoria cadastrada com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['update'])) { ?>
                <div class="alert alert-success">
                    Categoria atualizada com sucesso!
                </div>
            <?php } ?>

            <?php if(isset($_GET['excluido'])) { ?>
                <div class="alert alert-success">
                    Categoria excluída com sucesso!
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
                            <th>Nome</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if(count($categorias) > 0): ?>

                            <?php foreach($categorias as $categoria): ?>

                                <tr>

                                    <td><?= $categoria['id_categoria'] ?></td>

                                    <td>
                                        <?= htmlspecialchars($categoria['nome']) ?>
                                    </td>

                                    <td>
                                        <div class="action-buttons">

                                            <form action="editarCategoria.php" method="POST">

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?= $categoria['id_categoria'] ?>"
                                                >

                                                <button
                                                    type="submit"
                                                    class="icon-action border-0 bg-transparent"
                                                    title="Editar">

                                                    <i class="bi bi-pencil-square"></i>

                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                    <td>

                                        <button
                                            type="button"
                                            class="icon-action delete border-0 bg-transparent btnDeletarCategoria"

                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteCategoria"

                                            data-id="<?= $categoria['id_categoria'] ?>"
                                            data-nome="<?= htmlspecialchars($categoria['nome']) ?>"

                                            title="Excluir">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <div class="d-flex flex-column align-items-center">

                                        <i
                                            class="bi bi-search"
                                            style="font-size: 50px; color: #999;">
                                        </i>

                                        <h5 class="mt-3 mb-1">
                                            Nenhuma categoria encontrada
                                        </h5>

                                        <p class="text-muted mb-0">
                                            Tente pesquisar outro nome ou limpar os filtros.
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
                            <a href="?pagina=<?= $pagina - 1 ?>&buscaCategoria=<?= urlencode($buscaCategoria) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_left</span>
                            </a>
                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
                            <a href="?pagina=<?= $i ?>&buscaCategoria=<?= urlencode($buscaCategoria) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>"
                               class="page-link <?= ($i == $pagina) ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <?php if($pagina < $totalPaginas): ?>
                            <a href="?pagina=<?= $pagina + 1 ?>&buscaCategoria=<?= urlencode($buscaCategoria) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_right</span>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>



        </section>

    </main>

</div>

<div class="modal fade" id="modalDeleteCategoria" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 shadow">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    <i class="bi bi-trash3-fill me-2"></i>
                    Excluir Categoria
                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body text-center p-4">

                <i
                    class="bi bi-exclamation-triangle-fill text-danger"
                    style="font-size: 60px;">
                </i>

                <h4 class="mt-3">
                    Deseja realmente excluir esta categoria?
                </h4>

                <p class="text-muted mt-2">
                    Categoria:
                    <strong id="deleteNomeCategoria"></strong>
                </p>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancelar
                </button>

                <form action="../controller/controllerCategoria.php" method="POST">

                    <input type="hidden" name="id" id="deleteIdCategoria">
                    <input type="hidden" name="acao" value="Delete">

                    <button type="submit" class="btn btn-danger">
                        Sim, excluir
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const botoesDelete = document.querySelectorAll('.btnDeletarCategoria');

botoesDelete.forEach(botao => {
    botao.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const nome = this.getAttribute('data-nome');

        document.getElementById('deleteIdCategoria').value = id;
        document.getElementById('deleteNomeCategoria').innerText = nome;
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

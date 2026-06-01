<?php
include 'sessao.php';

require_once '../dao/ProdutoDao.php';

$limite = 10;

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;

$buscaProduto = $_GET['buscaProduto'] ?? '';
$ordenarPor = $_GET['ordenarPor'] ?? 'id_produto';
$ordem = $_GET['ordem'] ?? 'DESC';

$produtos = ProdutoDao::selectDashboard($inicio, $limite, $buscaProduto, $ordenarPor, $ordem);

$totalProdutos = ProdutoDao::totalDashboard($buscaProduto);
$totalPaginas = ceil($totalProdutos / $limite);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Produtos</title>
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
                <h1>Olá <?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário') ?></h1>
                <p class="text-muted m-0" style="padding-left: 52px;">Abaixo estão os produtos cadastrados.</p>
            </div>

            <div class="dropdown">
                <button type="button" class="btn btn-purple dropdown-toggle" data-bs-toggle="dropdown">
                    Novo
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastroProduto.php">Produto</a></li>
                    <li><a class="dropdown-item" href="cadastroMarca.php">Marca</a></li>
                    <li><a class="dropdown-item" href="cadastroTipo.php">Tipo</a></li>
                    <li><a class="dropdown-item" href="cadastroLocalArmazenamento.php">Local</a></li>
                    <li><a class="dropdown-item" href="cadastroCategoria.php">Categoria</a></li>
                    <li><a class="dropdown-item" href="cadastroPeriodo.php">Período</a></li>
                </ul>
            </div>

        </header>

        <section class="sales-table-container">

            <div class="table-header">


                <h2>Produtos no Sistema</h2>

                <form method="GET" class="table-controls">

                    <div class="search-box small">
                        <span class="material-icons">search</span>
                        <input 
                            type="text" 
                            name="buscaProduto" 
                            placeholder="Pesquisar"
                            value="<?= htmlspecialchars($buscaProduto) ?>"
                        >
                    </div>

                    <div class="sort-by">
                        <span>Ordenar</span>

                        <select name="ordenarPor" onchange="this.form.submit()">
                            <option value="id_produto" <?= $ordenarPor == 'id_produto' ? 'selected' : '' ?>>ID</option>
                            <option value="nome" <?= $ordenarPor == 'nome' ? 'selected' : '' ?>>Nome</option>
                            <option value="preco" <?= $ordenarPor == 'preco' ? 'selected' : '' ?>>Preço</option>
                            <option value="custo" <?= $ordenarPor == 'custo' ? 'selected' : '' ?>>Custo</option>
                            <option value="lucro" <?= $ordenarPor == 'lucro' ? 'selected' : '' ?>>Lucro</option>
                            <option value="categoria" <?= $ordenarPor == 'categoria' ? 'selected' : '' ?>>Categoria</option>
                            <option value="tipo" <?= $ordenarPor == 'tipo' ? 'selected' : '' ?>>Tipo</option>
                            <option value="marca" <?= $ordenarPor == 'marca' ? 'selected' : '' ?>>Marca</option>
                            <option value="status" <?= $ordenarPor == 'status' ? 'selected' : '' ?>>Status</option>
                        </select>

                        <select name="ordem" onchange="this.form.submit()">
                            <option value="DESC" <?= $ordem == 'DESC' ? 'selected' : '' ?>>Mais novos</option>
                            <option value="ASC" <?= $ordem == 'ASC' ? 'selected' : '' ?>>Mais antigos</option>
                        </select>
                    </div>

                </form>

            </div>

            

            <div class="table-responsive-wrapper">

                <table class="sales-table">

                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Custo</th>
                            <th>Preço</th>
                            <th>Lucro</th>
                            <th>Marca</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                            <th>Estoque</th>
                        </tr>
                    </thead>

                    <tbody id="sales-data">

                    <?php if (!empty($produtos)): ?>

                        <?php foreach($produtos as $produto): ?>

                            <tr>

      
                                <td>
                                    <a href="#"
                                    class="visualizar-produto"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalProduto"

                                    data-id="<?= $produto['id_produto'] ?>"
                                    data-nome="<?= htmlspecialchars($produto['nome']) ?>"
                                    data-categoria="<?= htmlspecialchars($produto['categoria']) ?>"
                                    data-tipo="<?= htmlspecialchars($produto['tipo']) ?>"
                                    data-custo="R$ <?= number_format($produto['custo'], 2, ',', '.') ?>"
                                    data-preco="R$ <?= number_format($produto['preco'], 2, ',', '.') ?>"
                                    data-lucro="R$ <?= number_format($produto['lucro'], 2, ',', '.') ?>"
                                    data-marca="<?= htmlspecialchars($produto['marca']) ?>"
                                    data-status="<?= htmlspecialchars($produto['status']) ?>"
                                    data-descricao="<?= htmlspecialchars($produto['descricao'] ?? 'Sem descrição') ?>"
                                    >
                                        <?= $produto['nome'] ?>
                                    </a>
                                </td>
                                <td><?= $produto['categoria'] ?></td>
                                <td><?= $produto['tipo'] ?></td>

                                <td>R$ <?= number_format($produto['custo'], 2, ',', '.') ?></td>
                                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                                <td>R$ <?= number_format($produto['lucro'], 2, ',', '.') ?></td>

                                <td><?= $produto['marca'] ?></td>

                                <td>
                                    <div class="action-buttons">
                                        <form action="editarProduto.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">

                                            <button type="submit" class="icon-action border-0 bg-transparent" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <form action="../controller/controllerProduto.php" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">

                                            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">
                                            <input type="hidden" name="acao" value="Delete">

                                            <button
                                                type="button"
                                                class="icon-action delete border-0 bg-transparent btnDeletarProduto"

                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteProduto"

                                                data-id="<?= $produto['id_produto'] ?>"
                                                data-nome="<?= htmlspecialchars($produto['nome']) ?>"

                                                title="Excluir">

                                                <i class="bi bi-trash"></i>

                                            </button>
                                        </form>
                                    </div>
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <form action="cadastroEstoque.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">

                                            <button type="submit" class="icon-action border-0 bg-transparent" title="Editar">
                                                <i class="bi bi-box-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="11" class="text-center text-danger">
                                Nenhum produto encontrado.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

                <div class="table-footer">

                    <div class="pagination-info">
                        Mostrando página <?= $pagina ?> de <?= $totalPaginas ?>
                    </div>

                    <div class="pagination-controls">

                        <?php if($pagina > 1): ?>
                            <a href="?pagina=<?= $pagina - 1 ?>&buscaProduto=<?= urlencode($buscaProduto) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_left</span>
                            </a>
                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
                            <a href="?pagina=<?= $i ?>&buscaProduto=<?= urlencode($buscaProduto) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>"
                               class="page-link <?= ($i == $pagina) ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <?php if($pagina < $totalPaginas): ?>
                            <a href="?pagina=<?= $pagina + 1 ?>&buscaProduto=<?= urlencode($buscaProduto) ?>&ordenarPor=<?= $ordenarPor ?>&ordem=<?= $ordem ?>" class="page-link">
                                <span class="material-icons">chevron_right</span>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

    <div class="modal fade"
        id="modalDeleteProduto"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content rounded-4 shadow">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">
                        <i class="bi bi-trash3-fill me-2"></i>
                        Excluir Produto
                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body text-center p-4">

                    <i class="bi bi-exclamation-triangle-fill text-danger"
                    style="font-size: 60px;">
                    </i>

                    <h4 class="mt-3">
                        Deseja realmente excluir este produto?
                    </h4>

                    <p class="text-muted mt-2">

                        Produto:
                        <strong id="deleteNomeProduto"></strong>

                    </p>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <form action="../controller/controllerProduto.php"
                        method="POST">

                        <input type="hidden"
                            name="acao"
                            value="Delete">

                        <input type="hidden"
                            name="id"
                            id="deleteIdProduto">

                        <button type="submit"
                                class="btn btn-danger">

                            Excluir Produto

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="modalProduto" tabindex="-1" aria-labelledby="modalProdutoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">

                <div class="modal-header text-white rounded-top" style="background-color: #6f42c1">
                    <h5 class="modal-title" id="modalProdutoLabel">
                        <i class="bi bi-box-seam me-2"></i>Detalhes do Produto
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="row mb-3 border-bottom pb-3">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="me-2">Identificação</h6>
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <div class="col-md-6">
                            <p><strong>ID:</strong> <span id="modalIdProduto"></span></p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Nome:</strong> <span id="modalNomeProduto"></span></p>
                        </div>
                    </div>

                    <div class="row mb-3 border-bottom pb-3">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="me-2">Valores</h6>
                            <i class="bi bi-cash-coin"></i>
                        </div>

                        <div class="col-md-4">
                            <p><strong>Custo:</strong> <span id="modalCustoProduto"></span></p>
                        </div>

                        <div class="col-md-4">
                            <p><strong>Preço:</strong> <span id="modalPrecoProduto"></span></p>
                        </div>

                        <div class="col-md-4">
                            <p><strong>Lucro:</strong> <span id="modalLucroProduto"></span></p>
                        </div>
                    </div>

                    <div class="row mb-3 border-bottom pb-3">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="me-2">Classificação</h6>
                            <i class="bi bi-tags-fill"></i>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Categoria:</strong> <span id="modalCategoriaProduto"></span></p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Tipo:</strong> <span id="modalTipoProduto"></span></p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Marca:</strong> <span id="modalMarcaProduto"></span></p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span id="modalStatusProduto"></span></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="me-2">Descrição</h6>
                            <i class="bi bi-card-text"></i>
                        </div>

                        <div class="col-md-12">
                            <p><span id="modalDescricaoProduto"></span></p>
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                        Fechar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const botoesDelete = document.querySelectorAll('.btnDeletarProduto');

    botoesDelete.forEach(botao => {

        botao.addEventListener('click', function () {

            const id = this.dataset.id;
            const nome = this.dataset.nome;

            document.getElementById('deleteIdProduto').value = id;

            document.getElementById('deleteNomeProduto').textContent = nome;

        });

    });

});
</script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const links = document.querySelectorAll('.visualizar-produto');

        links.forEach(link => {
            link.addEventListener('click', function () {

                document.getElementById('modalIdProduto').textContent = this.dataset.id;
                document.getElementById('modalNomeProduto').textContent = this.dataset.nome;
                document.getElementById('modalCategoriaProduto').textContent = this.dataset.categoria;
                document.getElementById('modalTipoProduto').textContent = this.dataset.tipo;
                document.getElementById('modalCustoProduto').textContent = this.dataset.custo;
                document.getElementById('modalPrecoProduto').textContent = this.dataset.preco;
                document.getElementById('modalLucroProduto').textContent = this.dataset.lucro;
                document.getElementById('modalMarcaProduto').textContent = this.dataset.marca;
                document.getElementById('modalStatusProduto').textContent = this.dataset.status;
                document.getElementById('modalDescricaoProduto').textContent = this.dataset.descricao;

            });
        });

    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['excluido'])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesso!',
    text: 'Produto excluído com sucesso!',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php } ?>

<?php if(isset($_GET['update'])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesso!',
    text: 'Produto Atualizado com sucesso!',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php } ?>

<?php if(isset($_GET['sucesso'])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesso!',
    text: 'Produto Cadastrado com sucesso!',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php } ?>


</body>
</html>

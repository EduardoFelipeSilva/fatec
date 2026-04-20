<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Vendas</title>

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
                    <h1>Olá Marival</h1>
                </div>
<div class="dropdown">
  <button type="button" 
          class="btn btn-purple dropdown-toggle" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
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
                    <div class="table-controls">
                        <div class="search-box small">
                            <span class="material-icons">search</span>
                            <input type="text" placeholder="Search">
                        </div>
                        <div class="sort-by">
                            <span>short by</span>
                            <select>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive-wrapper">
    <table class="sales-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Custo</th>
                <th>Valor</th>
                <th>Total</th>
                <th>Opções</th>
            </tr>
        </thead>

        <tbody id="sales-data">
            
            <tr>
                <td>Coca Cola</td>
                <td>Bebida</td>
                <td>R$ 5,70</td>
                <td>R$ 9,00</td>
                <td>R$ 3,30</td>
                <td>
                    <div class="action-buttons">
                        <a href="atualizar_Produto.php" title="Atualizar" class="icon-action">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" title="Excluir" class="icon-action delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Hamburguer</td>
                <td>Comida</td>
                <td>R$ 5,50</td>
                <td>R$ 8,50</td>
                <td>R$ 3,00</td>
                <td>
                    <div class="action-buttons">
                        <a href="atualizar_Produto.php" title="Atualizar" class="icon-action">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" title="Excluir" class="icon-action delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="table-footer">
        <div class="pagination-info">
            Mostrando Página 1 de 1
        </div>
        <div class="pagination-controls">
            <a href="#" class="page-link disabled">
                <span class="material-icons">chevron_left</span>
            </a>
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">
                <span class="material-icons">chevron_right</span>
            </a>
        </div>
    </div>
</div>

            </section>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Produto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir este produto?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-danger">Excluir</button>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
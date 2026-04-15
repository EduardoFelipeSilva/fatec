<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Vendas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap Icons -->
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
                                <?php
// Simulação de dados de vendas que viriam de um banco de dados
function getVendas() {
    return [
        ['nome' => 'Coca Cola', 'tipo' => 'Bebida', 'custo' => '5,70', 'valor' => '9,00', 'total' => '3,30'],
        ['nome' => 'Cozinha', 'tipo' => 'Comida', 'custo' => '2,50', 'valor' => '6,50', 'total' => '4,50'],
        ['nome' => 'Salgadinho', 'tipo' => 'Doce',  'custo' => '1,20', 'valor' => '2,20', 'total' => '1,00'],
        ['nome' => 'Hamburguer', 'tipo' => 'Comida',  'custo' => '5,50', 'valor' => '8,50', 'total' => '3,50'],
        ['nome' => 'Bolacha', 'tipo' => 'Doce', 'custo' => '1,50', 'valor' => '3,00', 'total' => '1,50'],
        ['nome' => 'Frios', 'tipo' => 'Comida',  'custo' => '1,50', 'valor' => '2,50', 'total' => '1,00'],
        ['nome' => 'Bolo', 'tipo' => 'Doce',  'custo' => '2,50', 'valor' => '3,50', 'total' => '1,00'],
        ['nome' => 'Bala', 'tipo' => 'Doce', 'custo' => '0,10', 'valor' => '0,25', 'total' => '0,10'],
    ];
}

// O código abaixo seria colocado diretamente no <tbody> da sua tabela HTML
$vendas = getVendas();
foreach ($vendas as $venda) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($venda['nome']) . "</td>";
    echo "<td>" . htmlspecialchars($venda['tipo']) . "</td>";
    echo "<td>" . htmlspecialchars($venda['custo']) . "</td>";
    echo "<td>" . htmlspecialchars($venda['valor']) . "</td>";
    echo "<td>" . htmlspecialchars($venda['total']) . "</td>";
    echo "</tr>";
}
?>
                        </tr>
                    </thead>
                    <tbody id="sales-data">
                        </tbody>
                </table>
                
                <div class="table-footer">
                    <div class="pagination-info">
                        Mostrando Página 1 de 8
                    </div>
                    <div class="pagination-controls">
                        <a href="#" class="page-link disabled">
                            <span class="material-icons">chevron_left</span>
                        </a>
                        <a href="#" class="page-link active">1</a>
                        <a href="#" class="page-link">2</a>
                        <a href="#" class="page-link">3</a>
                        <a href="#" class="page-link">4</a>
                        <a href="#" class="page-link">...</a>
                        <a href="#" class="page-link">40</a>
                        <a href="#" class="page-link">
                            <span class="material-icons">chevron_right</span>
                        </a>
                    </div>
                </table>
                </div>
            </section>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>
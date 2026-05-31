<?php
require_once '../dao/ProdutoDao.php';
$produtos = ProdutoDao::selectAll();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZenEstoque - Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/venda.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    
</head>

<body style="justify-content: center; align-items: center; height: 100vh; overflow:hidden">
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
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
                    </thead>

        <tbody id="sales-data">

        
              <tr>
                <?php foreach($produtos as $produto) { ?>

              <tr>
                <td><?=$produto[0]?></td>
                <td><?=$produto[1]. " ". $produto[2]?></td>
                <td><?=$produto[5]?></td>
                <td><?=$produto[3]?></td>
                <td><?=$produto[3]?></td>



                <td class="text-center">
                  <form action="../controller/controllerProduto.php" method="POST">
                    <input type="hidden" value=<?=$produto[0]?> name="id">
                    <input type="hidden" value='Uptade' name="acao">
                    <button type="submit" class="dropdown-item"><i class="bi bi-pencil-square"></i>
                    </button>
                  </form>
                </td>



                <td class="text-center">
                <form action="../controller/controllerProduto.php" method="POST">
                    <input type="hidden" value=<?=$produto[0]?> name="id">
                    <input type="hidden" value='Delete' name="acao">
                    <button type="submit" class="dropdown-item "><i class="bi bi-trash" ></i>
                    </form>
                </td>
              <tr>
              <?php } ?>
              <tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalExcluir" role="dialog">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Usuário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  ">
          <form action="controller.php" method="post">
            <input type="hidden" class="form-control" id="idDeletar" name="id" type="text">
            <p>Tem certeza que deseja excluir o item selcionado?
            <div class=" text-end">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-warning ms-3" value="Deletar">Sim </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?= require './../../componentes/modal.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src='../../js/personalizar.js'></script>
</body>

</html>
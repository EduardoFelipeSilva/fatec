<?php


require_once '../model/Categoria.php';
require_once '../dao/CategoriaDao.php';
if ($_POST['acao'] === "Salvar"){
    $categoria = new  Categoria(); 


    $categoria->setNome($_POST['nome']); 



    try {
        $CategoriaDao = CategoriaDao::insert($categoria);
        header("Location: ../views/categorias.php?sucesso=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/cadastroCategoria.php?erro=1");
        exit();
    }
}
if ($_POST['acao'] === "Delete"){
    try {
        $CategoriaDao = CategoriaDao::delete($_POST['id']);
        header("Location: ../views/categorias.php?excluido=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/categorias.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Update"){
    $categoria = new  Categoria(); 


    $categoria->setNome($_POST['nome']); 
    $categoria->setid($_POST['id']); 



    try {
        $CategoriaDao = CategoriaDao::update($categoria);
        header("Location: ../views/categorias.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/categorias.php?erro=1");
        exit();
    }
}
?> 


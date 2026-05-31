<?php


require_once '../model/Marca.php';
require_once '../dao/MarcaDao.php';
if ($_POST['acao'] === "Salvar"){
    $marca = new  Marca(); 


    $marca->setNome($_POST['nome']); 


    try {
        $MarcaDao = MarcaDao::insert($marca);
        
        header("Location: ../views/marcas.php?sucesso=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/marcas.php?erro=1");
        exit();
    }
}


if ($_POST['acao'] === "Delete"){
    try {
        $MarcaDao = MarcaDao::delete($_POST['id']);
        header("Location: ../views/marcas.php?excluido=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/marcas.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Update"){
    $marca = new  Marca(); 

    $marca->setId($_POST['id']);
    $marca->setNome($_POST['nome']); 


    try {
        MarcaDao::Update($marca);
        
        header("Location: ../views/marcas.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/marcas.php?erro=1");
        exit();
    }
}
?> 


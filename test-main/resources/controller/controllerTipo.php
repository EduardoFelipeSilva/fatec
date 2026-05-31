<?php


require_once '../model/Tipo.php';
require_once '../dao/TipoDao.php';
if ($_POST['acao'] === "Salvar"){
    $tipo = new  Tipo(); 


    $tipo->setNome($_POST['nome']); 



    try {
        $TipoDao = TipoDao::insert($tipo);
        header("Location: ../views/tipos.php?sucesso=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/tipos.php?erro=1");
        exit();
    }
}
if ($_POST['acao'] === "Delete"){
    try {
        $TipoDao = TipoDao::delete($_POST['id']);
        header("Location: ../views/tipos.php?excluido=1");
    }catch(Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}

if ($_POST['acao'] === "Update"){
    $tipo = new  Tipo(); 


    $tipo->setNome($_POST['nome']); 
    $tipo->setId($_POST['id']); 
    try {
        $TipoDao = TipoDao::update($tipo);
        header("Location: ../views/tipos.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/tipos.php?erro=1");
        exit();
    }
}
?> 


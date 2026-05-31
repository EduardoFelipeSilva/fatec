<?php


require_once '../model/Status.php';
require_once '../dao/StatusDao.php';
if ($_POST['acao'] === "Salvar"){
    $status = new  Status(); 


    $status->setNome($_POST['nome']); 



    try {
        $StatusDao = StatusDao::insert($status);
        header("Location: index.php");
    }catch(Exception $e) {
        echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}
if ($_POST['acao'] === "Delete"){
    try {
        $StatusDao = StatusDao::delete($_POST['id']);
        header("Location: index.php");
    }catch(Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}

if ($_POST['acao'] === "Update"){
    $status = new  Status(); 


    $status->setNome($_POST['nome']); 
    $status->setId($_POST['id']); 



    try {
        $StatusDao = StatusDao::update($status);
        header("Location: index.php");
    }catch(Exception $e) {
        echo 'Exceção capturada: ', $e->getMessage(), "\n";
    }
}
?> 


<?php


require_once '../model/Armazenamento.php';
require_once '../dao/ArmazenamentoDao.php';
if ($_POST['acao'] === "Salvar"){
    $armazenamento = new  Armazenamento(); 


    $armazenamento->setNome($_POST['nome']);
    $armazenamento->setLocal($_POST['local']); 
    $armazenamento->setCapacidade($_POST['capacidade']); 
    $armazenamento->setStatus(1); 
    try {
        $ArmazenamentoDao = ArmazenamentoDao::insert($armazenamento);
        header("Location: ../views/armazenamentos.php?sucesso=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/armazenamentos.php?erro=1");
        exit();
    }
}
if ($_POST['acao'] === "Delete"){
    try {
        $ArmazenamentoDao = ArmazenamentoDao::delete($_POST['id']);
        header("Location: ../views/armazenamentos.php?excluido=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/armazenamentos.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Update"){
    $armazenamento = new  Armazenamento(); 


    $armazenamento->setid($_POST['id']);
    $armazenamento->setNome($_POST['nome']);
    $armazenamento->setLocal($_POST['local']); 
    $armazenamento->setCapacidade($_POST['capacidade']); 
    $armazenamento->setStatus(1); 
    try {
        $ArmazenamentoDao = ArmazenamentoDao::Update($armazenamento);
        header("Location: ../views/armazenamentos.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/armazenamentos.php?erro=1");
        exit();
    }
}
?> 


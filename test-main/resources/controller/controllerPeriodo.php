<?php


require_once '../model/Periodo.php';
require_once '../dao/PeriodoDao.php';
if ($_POST['acao'] === "Salvar"){
    $periodo = new  Periodo(); 


    $periodo->setNome($_POST['nome']); 



    try {
        $PeriodoDao = PeriodoDao::insert($periodo);
        header("Location: ../views/periodos.php?sucesso=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/periodos.php?erro=1");
        exit();
    }
}
if ($_POST['acao'] === "Delete"){
    try {
        $PeriodoDao = PeriodoDao::delete($_POST['id']);
        header("Location: ../views/periodos.php?excluido=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/periodos.php?.php?erro=1");
        exit();
    }
}

if ($_POST['acao'] === "Update"){
    $periodo = new  Periodo(); 
    
    $periodo->setId($_POST['id']); 
    $periodo->setNome($_POST['nome']); 


    try {
        $PeriodoDao = PeriodoDao::update($periodo);
        header("Location: ../views/periodos.php?update=1");
        exit();
    }catch(Exception $e) {
        header("Location: ../views/periodos.php?erro=1");
        exit();
    }
}
?> 


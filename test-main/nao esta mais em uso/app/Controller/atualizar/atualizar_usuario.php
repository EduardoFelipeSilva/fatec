<?php
include "../../../database.php";

$id_user = $_POST['id_user'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Se digitou senha, atualiza também
if (!empty($senha)) {
    $senha_hash = md5($senha);

    $sql = "UPDATE usuarios 
            SET nome='$nome', email='$email', senha='$senha_hash'
            WHERE id='$id_user'";
} else {
    $sql = "UPDATE usuarios 
            SET nome='$nome', email='$email'
            WHERE id='$id_user'";
}

if (mysqli_query($conexao, $sql)) {
    header("Location: ../../../resources/views/meu_perfil.php");
} else {
    echo "Erro ao atualizar perfil";
}
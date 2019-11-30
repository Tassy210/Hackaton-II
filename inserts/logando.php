<?php

session_start();
include_once "conectar.php";

$log = $_POST['login'];
$senha = $_POST['senha'];

if(empty($log) or empty($senha)){
    header("location:../login_adm.php?Campos não podem ser nulos");
    exit();
} else{ 
    $log = mysqli_real_escape_string($conexao, $log);
    $senha = mysqli_real_escape_string($conexao, $senha);
    $querry = "SELECT * FROM administrador WHERE login = '{$log}' and senha = '{$senha}' ";
    $result = mysqli_query($conexao, $querry);
    $row = mysqli_num_rows($result);
    header('location:../teste.php'); 
}



?>
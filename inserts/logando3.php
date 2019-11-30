<?php

session_start();
include_once "../conectar.php";

$log = $_POST['cpf'];
$senha = $_POST['senha'];

if(empty($log) or empty($senha)){
    header("location:../login_motorista.php?Campos não podem ser nulos");
    exit();
} else{ 
    $log = mysqli_real_escape_string($conexao, $log);
    $senha = mysqli_real_escape_string($conexao, $senha);
    $querry = "SELECT * FROM motorista WHERE cpf = '{$log}' and senha = '{$senha}' ";
    $result = mysqli_query($conexao, $querry);
    $dados = mysqli_fetch_array($result);
    $_SESSION['cpf'] = $dados["cpf"];
    $row = mysqli_num_rows($result);
    //echo $dados["id"];
    header('location:../pagina_motorista.php'); 
}



?>
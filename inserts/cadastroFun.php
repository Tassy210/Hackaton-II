<?php

session_start();

include_once "../conectar.php";
mysqli_set_charset($conexao,"utf8");

$nome = $_POST['nome'] ;
$cpf = $_POST['cpf'] ;
$senha = $_POST['senha'] ;

$sql = "INSERT INTO funcionario (login, cpf, senha) values ('$nome',  '$cpf', '$senha') " ;

$query = mysqli_query($conexao, $sql );

if ($query){

	header("location:../login_funcionario.php");
}
else{
	echo "Erro ao inserir registro." . mysqli_error($conexao);
}

mysqli_close($conexao);


?>
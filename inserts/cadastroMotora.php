<?php

session_start();

include_once "../conectar.php";
mysqli_set_charset($conexao,"utf8");

$nome = $_POST['nome'] ;
$email = $_POST['email'];
$cnpj = $_POST['cnpj'] ;
$cpf = $_POST['cpf'] ;
$placa = $_POST['placa'] ;
$banco = $_POST['banco'] ;
$senha = $_POST['senha'] ;

$sql = "INSERT INTO motorista (nome,email, cnpj, cpf, placa, contabancaria, senha) values ('$nome', '$email', '$cnpj', '$cpf', '$placa', '$banco', '$senha') " ;

$query = mysqli_query($conexao, $sql );

if ($query){

	header("location:../login_motorista.php");
}
else{
	echo "Erro ao inserir registro." . mysqli_error($conexao);
}

mysqli_close($conexao);


?>
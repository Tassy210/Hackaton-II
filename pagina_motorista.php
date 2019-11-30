<?php 

session_start(); 
include "conectar.php";

$sql = "select * from motorista where id =".$_SESSION['id'];
$query= mysqli_query($conexao, $sql);
$user = mysqli_fetch_array($query);
?>

<html>
<meta charset="utf-8">

<head>
    <title>Perfil motorista</title>

</head>

<body>
    <center>
    <h2>Bem vindo, <?= $user['nome']?> ! </h2>
    <br>
    </center>
    <b><label>E-mail para contato: <?= $user['email'] ?> </label></b>
    <br><br>
    <b><label>CPF: <?= $user['cpf'] ?> </label></b>
    <br><br>
    <b><label>CNPJ: <?= $user['cnpj'] ?> </label></b>
    <br><br>
    <b><label>Conta bancária: <?= $user['contabancaria'] ?> </label></b>
    <br><br>
    <b><label>Placa do veículo: <?= $user['placa'] ?> </label></b>
    <center>
    <table>
    <h3>Histórico de entregas: </h3>
    <a href="#">Adicionar entrega</a>
    <br><br>
    <b><label>Data da entrega: </label></b>
    <br><br>
    <b><label>Entrega mais recente: </label></b>
    <br><br>
    <b><label>Entrega mais antiga (Precisar tirar eu tiro depois, já era):</label></b>
    </table>
    <br><br> 
    <table>
    <h3>Rotas realizadas:</h3>
    <br><br>
    <b><label>Quilometragem realizada: </label></b>

    </table>
    <a href="inserts/logouting.php">Logout</a>
    </center>
</body>



</html>
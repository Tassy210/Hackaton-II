<?php 

session_start(); 
include "conectar.php";

$sql = "select * from motorista where id =".$_SESSION['id'];
echo $sql;
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
    <h4>Bem vindo, (Nome do motorista)! </h4>
    <br>

    <label>Placa do veículo: <?= $user['placa'] ?> </label>

    <table>
    <h3>Histórico de entregas: </h3>
    <b><label>Data da entrega: </label></b>
    <br><br>
    <b><label>Entrega mais recente: </label></b>
    <br><br>
    <b><label>Entrega mais antiga (Precisar tirar eu tiro depois, já era):</label></b>
    </table>
    <a href="inserts/logouting.php">Logout</a>
    </center>
</body>



</html>
<?php 

session_start(); 
include "conectar.php";

$sql = "select * from funcionario where login ='".$_SESSION['login']."'";
$query= mysqli_query($conexao, $sql);
$user = mysqli_fetch_array($query);
?>

<html>
<meta charset="utf-8">

<head>
    <title>Funcionário</title>

</head>

<body>
    <center>
        <h2>Fala, <?= $user['login']?>. Bem vindo ao nosso sistema. Bem massa, né? </h2>
        <br>
        <b><label>CPF: <?= $user['cpf']?></label></b>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="inserts/logouting.php">Logout</a>
        <br>
        <br><br>
        <h4>Desenvolvido por: Matheus Nicolay, Leon Tassinari e Bruno Dutra (A.K.A Equipe 5)</h4>
    </center>
</body>



</html>
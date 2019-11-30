<?php
session_start();
unset($_SESSION["cpf"]);
header("location:../home.php");
?>
<?php
    include "conectar.php";
    $id= $_GET['id'];

    $delete = "DELETE FROM carga WHERE idCarga='$id'";
    $delgo = mysqli_query($conexao, $delete) or die("Erro ao deletar");
    header('location:selects/listarEnvios.php')
?>
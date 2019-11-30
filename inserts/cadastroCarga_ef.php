<?php
require '../conectar.php';

    $numeroNota = $_POST['numeroNota'];
    $destino = $_POST['destino'];
    $localSaida = $_POST['localSaida'];
    $dt_saida = $_POST['dt_saida'];
    $motorista = $_POST['motorista'];
    $dt_cadastro = date('Y-m-d');
    $d_tracada = $_POST['d_tracada'];
    $destinatario = $_POST['destinatario'];
    $nomeProduto = $_POST['nomeProduto'];

    $insert = "INSERT INTO carga (numeroNota, destino, localSaida, dt_saida, id, dt_cadastro, d_tracada, destinatario, nomeProduto) VALUES ('$numeroNota', '$destino', '$localSaida', '$dt_saida', '$motorista', '$dt_cadastro', '$d_tracada', '$destinatario','$nomeProduto')";
            
    $result = mysqli_query($conexao, $insert) or die ("Erro ao executar o comando SQL $insert");

		
	// Se os dados forem inseridos com sucesso
	if ($result){
        echo "<script>alert('Você cadastrou o anúncio com sucesso')</script>";
        
        //echo '<meta http-equiv="refresh" content="5;URL=../home.php"/>';

	}
?>
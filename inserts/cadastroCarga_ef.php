<?php
require 'conectar.php';

    echo $numeroNota = $_POST['numeroNota'];
    echo $destino = $_POST['destino'];
    echo $localSaida = $_POST['localSaida'];
    echo $dt_saida = $_POST['dt_saida'];
    echo $motorista = $_POST['motorista'];
    echo $dt_cadastro = date('Y-m-d');
    echo $d_tracada = $_POST['d_tracada'];
    echo $destinatario = $_POST['destinatario'];
    echo $nomeProduto = $_POST['nomeProduto'];

    $insert = "INSERT INTO carga (numeroNota, destino, localSaida, dt_saida, id, dt_cadastro, d_tracada, destinatario, nomeProduto) VALUES ('$numeroNota', '$destino', '$localSaida', '$dt_saida', '$motorista', '$dt_cadastro', '$d_tracada', '$destinatario','$nomeProduto')";
            
    $result = mysqli_query($conexao, $insert) or die ("Erro ao executar o comando SQL $insert");

		
	// Se os dados forem inseridos com sucesso
	if ($result){
        echo "<script>alert('Você cadastrou o anúncio com sucesso')</script>";
        
        echo '<meta http-equiv="refresh" content="5;URL=index.php" />';

	}
?>
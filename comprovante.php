<?php	
    require "conectar.php";

    $idCarga=$_GET['idCarga'];
    $select = "SELECT * FROM carga WHERE idCarga='$idCarga'";
    $result = mysqli_query($conexao, $select);
	$row = mysqli_fetch_assoc($result);

	

	include ('mpdf/mpdf.php');

	$pagina = 
		"<html>
			<body>
				<h1>Comprovante de entrega</h1>
				<ul>
					<li>".$row['nomeProduto']."</li>
					<li>".$row['destinatario']."</li>
					<li>".$row['dt_chegada']."</li>
				</ul>
			</body>
		</html>
		";

$arquivo = "Cadastro01.pdf";

$mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>
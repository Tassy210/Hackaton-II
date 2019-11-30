<?php	
    require "conectar.php";

    $idCarga=$_GET['id'];
    $select = "SELECT * FROM carga WHERE idCarga='$idCarga'";
    $result = mysqli_query($conexao, $select);
    $html = "";

    while($row = mysqli_fetch_array($result)){
        $html .=  $row['nomeProduto']; echo '<br>';
        $html .=  $row['localSaida']; echo '<br>';
        $html .=  $row['destino']; echo '<br>';
        $html .=  $row['numeroNota']; echo '<br>';
        $html .=  $row['destinatario']; echo '<br>';
        $html .=   $row['dt_cadastro']; echo '<br>';
        $html .=   $row['dt_saida']; echo '<br>';
        $html .=  $row['dt_chegada']; echo '<br>';
        $html .=  $row['d_tracada']; echo '<br>';
    }

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html($html);

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"comprovante.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
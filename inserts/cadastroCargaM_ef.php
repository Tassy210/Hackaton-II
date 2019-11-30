<?php
require '../conectar.php';

    $idCarga = $_POST['idCarga'];
    $condicao = $_POST['condicao'];
    $foto = $_FILES['foto'];
    $descricao = $_POST['descricao'];
	$dt_chegada = date('Y-m-d H:i:s');

	if(isset($_POST['c_entrega'])){
    	$estatus = "Entregue";
	}else{
		$estatus = null;
	}

	if(isset($_POST['p_entrega'])){
		$estatus = "Danificada";
	}else{
		$estatus = null;
	}

	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		$largura = 1500;
		// Altura máxima em pixels
		$altura = 1800;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 10000000;
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                
            $update = "UPDATE carga SET condicao='$condicao', foto='$nome_imagem', descricao='$descricao', dt_chegada='$dt_chegada', estatus='$estatus' WHERE idCarga=$idCarga";
            
            $result = mysqli_query($conexao, $update) or die ('Erro ao executar o comando SQL');

            // Se os dados forem inseridos com sucesso
			if ($result){
				echo "<script>alert('Você cadastrou a chegada do produto com sucesso')</script>";
                echo '<meta http-equiv="refresh" content="5;URL=../home.php"/>';

			}
		}
	   

		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
?>
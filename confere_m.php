<?php
if(!isset($_SESSION)) session_start();{
		if(isset($_SESSION['id'])){
			 $login_session = $_SESSION['id'];
		}
			if(isset($login_session)){

			}else{
					echo '<script> alert("Você precisa estar logado como motorista para acessar essa página");window.location.href="login_motorista.php"</script>';
			  }
			 }
?>
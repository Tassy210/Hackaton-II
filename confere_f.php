<?php
session_start();


		if(isset($_SESSION['login'])){
			 $login_sessionf = $_SESSION['login'];
        }
        
        if(isset($login_sessionf)){

		}else{
            echo '<script> alert("Você precisa estar logado como funcionario para acessar essa página");</script>';
            //window.location.href="../login_funcionario.php"
		}
			 
?>
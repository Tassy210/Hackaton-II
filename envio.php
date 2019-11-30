

<html lang="pt-br"> 
<head>
 <meta charset="utf-8">
 <title>Teste email</title>
 <!--Bootstrap -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="container">

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true
if ($_POST) 
 {

 
 //envia o e-mail para o visitante do site
 $mailDestino = $_POST['txtEmail']; 
 $nome = $_POST['txtNome']; 
 $mensagem = "Obrigado pelo seu contato, responderemos ASAP!";
 $assunto = "Obrigado pelo seu contato!";
 include("./envio.php");
 
 //envia o e-mail para o administrador do site
 $mailDestino = 'leontassinari@gmail.com'; 
 $nome = 'Leon'; 
 $assunto = "Mensagem recebida do site";
 $mensagem = "Recebemos uma mensagem no site <br/>
 <strong>Nome:</strong> $_POST[txtNome]<br/>
 <strong>e-mail:</strong> $_POST[txtEmail]<br/>
 <strong>mensagem:</strong> $_POST[txtMensagem]";
 include("./envio.php");
 
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); // envia por SMTP 
 $mail->CharSet = 'UTF-8';
 $mail->Host = "smtp.gmail.com.br"; // Servidor SMTP
 $mail->Port = 465; 
 $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
 $mail->Username = "leontassinari@gmail.com"; // SMTP username
 $mail->Password = "senha"; // SMTP password
 $mail->From = "leontassinari@gmail.com.br"; // From
 $mail->FromName = "Eu" ; // Nome de quem envia o email
 $mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
 $mail->WordWrap = 50; // Definir quebra de linha
 $mail->IsHTML = true ; // Enviar como HTML
 $mail->Subject = $assunto ; // Assunto
 $mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
 $mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

if(!$mail->Send()) // Envia o email
 { 
 echo "Erro no envio da mensagem";
 } 
}
?>

<form method="POST" name="formContato">

<label>Informe seu nome: </label>
 <input type="text" name="txtNome" placeholder="João" class="form-control" required>

 <label>Informe seu e-mail: </label>
 <input type="email" name="txtEmail" placeholder="a@a.com" class="form-control" required>

 <label>Deixe sua mensagem: </label>
 <textarea rows="6" class="form-control" name="txtMensagem"></textarea>
 <br/>

<div style="text-align:center">
 <button type="submit" class="btn btn-default btn-lg"> Enviar Mensagem </button>
 </div>
 
 </form> 
</div>
</body>
</html>
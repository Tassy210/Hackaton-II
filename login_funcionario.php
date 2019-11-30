<html>
<meta charset="utf-8">

<head>
    <title>Bakof</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>

<body>
<a href="home.php">Voltar para a página inical</a>
    <center>
    <h4>Preencha seus dados nos campos abaixo: </h4>
    <br>


        <form action ="inserts/logando2.php" method="POST">
            
            <label>Login: </label>
            <input type="text" name="login" placeholder="Informe seus dados" >
            <br><br>
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Informe seus dados">
            <br><br>
            <button type="submit" name="botao">Enviar</button>
        </form>
    </center>
</body>



</html>
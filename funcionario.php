<html>
<meta charset="utf-8">

<head>
    <title>Cadastro funcionário</title>

</head>

<body>
<a href="home.php">Voltar para a página inical</a>
    <center>
    <h4>Preencha o formulário abaixo: </h4>
    <br>


        <form action="inserts/cadastroFun.php" method="POST">
            
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Informe seus dados">
            <br><br>
            <label>CPF: </label>
            <input type="text" name="cpf" placeholder="(Números somente)">
            <br><br>
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Informe seus dados">
            <br><br>
            <button type="submit" name="botao">Enviar</button>

        </form>

        <h5>Já é cadastrado? Clique <a href ="login_funcionario.php">aqui</a> para logar-se</h5>
    </center>
</body>



</html>
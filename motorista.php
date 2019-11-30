<html>
<meta charset="utf-8">

<head>
    <title>Cadastro motorista</title>

</head>

<body>
<a href="home.php">Voltar para a página inical</a>
    <center>
    <h4>Preencha o formulário abaixo: </h4>
    <br>


        <form action="inserts/cadastroMotora.php" method="POST">
            
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Informe seus dados">
            <br><br>
            <label>Email para contato: </label>
            <input type="text" name="email" placeholder="Informe seus dados">
            <br><br>
            <label>CNPJ: </label>
            <input type="text" name="cnpj" placeholder="(Números somente)">
            <br><br>
            <label>CPF: </label>
            <input type="text" name="cpf" placeholder="(Números somente)">
            <br><br>
            <label>Placa do veículo: </label>
            <input type="text" name="placa" placeholder="(Números somente)">
            <br><br>
            <label>Conta bancária: </label>
            <input type="text" name="banco" placeholder="Informe seus dados">
            <br><br>
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Informe seus dados">
            <br><br>
            <button type="submit" name="botao">Enviar</button>

        </form>

        <h5>Já é cadastrado? Clique <a href ="login_motorista.php">aqui</a> para logar-se</h5>
    </center>
</body>



</html>
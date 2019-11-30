<DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de cargas</title>
        <meta charset="UTF-8">
        <?php include 'confere_f.php';?>
        <?php include 'conectar.php';?>
    </head>
    <body>
    <?php
        $select = "SELECT id FROM motorista";
        $query = mysqli_query($conexao, $select) or die("Erro na conexão");
        $row = mysqli_fetch_assoc($query);
    ?>
    <form action="cadastroCarga_ef.php" method="POST">
        <input type="text" id="numeroNota" name="numeroNota" placeholder="Número da nota do produto"><p></p>

        <label>Destino</label><br>
            <input type="text" id="destino" name="destino"><p></p>

        <label>Destinatário</label><br>
            <input type="text" id="destinatario" name="destinatario"><p></p> 

        <label>Nome do produto</label><br>
            <input type="text" id="nomeProduto" name="nomeProduto"><p></p>       
        
        <label>Local de Saída</label><br>
            <input type="text" id="localSaida" name="localSaida"><p></p>

        <label>Data de Saída</label><br>
            <input type="date" id="dt_saida" name="dt_saida"><p></p>

        <?php
            echo '<label>Motorista</label><br>
            <select name="motorista">
                <option value='.$row["id"].'>'.$row["nome"].'</option>
            </select><p></p>';
        ?>    

        <label>Distância traçada</label><br>
            <input type="text" name="d_tracada"><p></p>

        <input type="submit" value="Cadastrar">
    </form>
    </body>
</html>
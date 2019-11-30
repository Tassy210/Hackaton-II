<html>
<meta charset="utf-8">

<head>
    <title>Perfil motorista</title>

</head>

<body>
    <center>
    <h4>Bem vindo, (Nome do motorista)! </h4>
    <br>
    <?php
        require "conectar.php";
        include "confere_m.php";

        $select = "SELECT * FROM carga WHERE id='$login_session'";
        $result = mysqli_query($conexao, $select) or die ("Erro ao selecionar");

        while($row = mysqli_fetch_array($result)){
            echo '<tr>';
            echo    '<td>'; echo $row['nomeProduto']; echo '</td>';
            echo   ' <td>'; echo $row['localSaida']; echo '</td>';
            echo    '<td>'; echo $row['destino']; echo '</td>';
            echo    '<td>'; echo $row['numeroNota']; echo '</td>';
            echo '<td><a href="inserts/cadastroCargaM.php?id='.$row['idCarga'].'">Cadastrar entrega</a></td>';
            echo  '</tr><br>';
        }
    ?>
    <label>Placa do veículo: ABC-1234 (Placa fictícia DÃÃÃÃ)</label>

    <table>
    <h3>Histórico de entregas: </h3>
    <b><label>Data da entrega: </label></b>
    <br><br>
    <b><label>Entrega mais recente: </label></b>
    <br><br>
    <b><label>Entrega mais antiga (Precisar tirar eu tiro depois, já era):</label></b>
    </table>
    <a href="inserts/logouting.php">Logout</a>
    </center>
</body>



</html>
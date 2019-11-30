<html>
    <head> 
        <meta charset="UTF-8">
        <title>Listagem de envios</title>
        <?php require "../conectar.php"; ?>
        <?php include "../confere_f.php"; ?>
    </head>
    <body>
        <table class="table table-bordered">
        <tbody>
        <?php
            $select = "SELECT * FROM carga";
            $result = mysqli_query($conexao, $select) or die("Erro na conexão");

                while($row = mysqli_fetch_array($result)){
                    $condicao = $row['condicao'];
            
                    if($condicao==0){
                        $condicao="normal";
                        $comprovante = '<td><a href="comprovante.php?id='.$row['idCarga'].'">Gerar comprovante de entrega</a></td>';
                    }
                    if($condicao==1){
                        $condicao="pouco danificado";
                    }
                    if($condicao==2){
                        $condicao="muito danificado";
                    }

                    echo '<tr>';
                    echo    '<td>'; echo 'Produto '.$condicao; echo '</td>';
                    echo    '<td>'; echo $row['nomeProduto']; echo '</td>';
                    echo   ' <td>'; echo $row['localSaida']; echo '</td>';
                    echo    '<td>'; echo $row['destino']; echo '</td>';
                    echo    '<td>'; echo $row['numeroNota']; echo '</td>';
                    echo    '<td>'; echo $row['destinatario']; echo '</td>';
                    echo    '<td>'; echo $row['dt_cadastro']; echo '</td>';
                    echo    '<td>'; echo $row['dt_saida']; echo '</td>';
                    echo    '<td>'; echo $row['dt_chegada']; echo '</td>';
                    echo    '<td>'; echo $row['d_tracada']; echo '</td>';
                    echo    '<td>';  echo '<img src="../fotos/'.$row['foto'].'">'; echo '</td>';
                    echo $comprovante;
                    echo '<td><a href="remove_carga.php?id='.$row['idCarga'].'">Remover</a></td>';
                    echo  '</tr><br>';
                }
        ?>
        </tbody>
        </table>
    </body>
</html>
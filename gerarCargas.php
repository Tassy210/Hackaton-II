echo '<tr>';
            echo    '<td>'; echo $row['nomeProduto']; echo '</td>';
            echo   ' <td>'; echo $row['localSaida']; echo '</td>';
            echo    '<td>'; echo $row['destino']; echo '</td>';
            echo    '<td>'; echo $row['numeroNota']; echo '</td>';
            echo '<td><a href="inserts/cadastroCargaM.php?id='.$row['idCarga'].'">Cadastrar entrega</a></td>';
            echo  '</tr><br>';
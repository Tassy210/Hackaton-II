<html>
    <head> 
        <meta charset="UTF-8">
        <title>Listagem de envios</title>
        <?php require "../conectar.php"; ?>
        <?php include "../confere_f.php"; ?>
        <?php include "../navbar.php"; ?>
        <script src="http://code.jquery.com/jquery-1.8.1.js" type="text/javascript"></script>
       
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <table class="table table-bordered"><thead>
            <th scope="col" > Condição</th>
            <th scope="col" >Produto</th>
            <th scope="col" >Local saída</th>
            <th scope="col" >Destino</th>
            <th scope="col" >Número da nota</th>
            <th scope="col" >Destinatário</th>
            <th  scope="col" >Data de Cadastro</th>
            <th scope="col" >Data de Saida</th>
            <th scope="col"  >Data de Chegada</th>
            <th scope="col" >Distância Traçada</th>
            <th scope="col" >Imagem</th>
            <th scope="col" >Remover</th>
        </thead>
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
                    echo    '<td scope="row" >'; echo 'Produto '.$condicao; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['nomeProduto']; echo '</td>';
                    echo   ' <td scope="row"  >'; echo $row['localSaida']; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['destino']; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['numeroNota']; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['destinatario']; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['dt_cadastro']; echo '</td>';
                    echo    '<td scope="row"  >'; echo $row['dt_saida']; echo '</td>';
                    echo    '<td  scope="row"   >'; echo $row['dt_chegada']; echo '</td>';
                    echo    '<td scope="row"   >'; echo $row['d_tracada']; echo '</td>';
                    echo    '<td  scope="row" >';  echo '<img width="200" height="150" src="../fotos/'.$row['foto'].'">'; echo '</td>';
                    echo '<td><a href="../remove_carga.php?id='.$row['idCarga'].'">Remover</a></td>';
                    echo  '</tr><br>';
                }
        ?>
        </tbody>
        </table>
    </body>
</html>
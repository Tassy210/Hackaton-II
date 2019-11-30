<DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de cargas</title>
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery-1.8.1.js" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyADLsL46CQaEu2smB3EMpEV1eEbInd0ASs"></script>
        <?php include '../confere_f.php';?>
        <?php include '../conectar.php';?>
        <script type="text/javascript">

                var duracao
                  var origem
                  var destino
                  var distancia  

            function CalculaDistancia() {
                $('#litResultado').html('Aguarde...');
                //Instanciar o DistanceMatrixService
                var service = new google.maps.DistanceMatrixService();
                //executar o DistanceMatrixService
                service.getDistanceMatrix(
                  {
                      //Origem
                      origins: [$("#txtOrigem").val()],
                      //Destino
                      destinations: [$("#txtDestino").val()],
                      //Modo (DRIVING | WALKING | BICYCLING)
                      travelMode: google.maps.TravelMode.DRIVING,
                      //Sistema de medida (METRIC | IMPERIAL)
                      unitSystem: google.maps.UnitSystem.METRIC
                      //Vai chamar o callback
                  }, callback);
            }
            //Tratar o retorno do DistanceMatrixService
            function callback(response, status) {
                //Verificar o Status
                if (status != google.maps.DistanceMatrixStatus.OK)
                    //Se o status não for "OK"
                    $('#litResultado').html(status);
                else {
                    //Se o status for OK
                    //Endereço de origem = response.originAddresses
                    //Endereço de destino = response.destinationAddresses
                    //Distância = response.rows[0].elements[0].distance.text
                    //Duração = response.rows[0].elements[0].duration.text
                    $('#litResultado').html("<input type='hidden' name='localSaida' value='" + response.originAddresses +
                        "'><input type='hidden' name='destino' value='" + response.destinationAddresses +
                        "'><input type='hidden' name='d_tracada' value='" + response.rows[0].elements[0].distance.text +"'>"
                        );
                    //Atualizar o mapa
                    $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
                    
                    
                }
            }

            function submeter(){
                    var destinatario = document.getElementById('destinatario').value;
                    var nomeProduto  = document.getElementById('nomeProduto').value;
                    var dt_saida     = document.getElementById('dt_saida').value;
                    var numeroNota   = document.getElementById('numeroNota').value;
                    var motorista    = document.getElementById('motorista').value;

                    var url = "cadastroCarga_ef.php?localSaida="+response.originAddresses+"&destino="+response.destinationAddresses+"&d_tracada="+response.distance.text+"&destinatario="+destinatario+"&nomeProduto="+nomeProduto+"&dt_saida="+dt_saida+"&numeroNota="+numeroNota+"&motorista="+motorista

                    window.location.href = url
            }



        </script>
    </head>
    <body>
    <?php
        $select = "SELECT id, nome FROM motorista";
        $query = mysqli_query($conexao, $select) or die("Erro na conexão");
    ?>
    <form action="cadastroCarga_ef.php" method="POST">

        <div><span id="litResultado">&nbsp;</span></div>
        <div style="padding: 10px 0 0; clear: both">
            
        </div>
        <input type="text" id="numeroNota" name="numeroNota" placeholder="Número da nota do produto"><p></p>

        <label>Destinatário</label><br>
            <input type="text" id="destinatario" name="destinatario"><p></p> 

        <label>Nome do produto</label><br>
            <input type="text" id="nomeProduto" name="nomeProduto"><p></p>       

        <label>Data de Saída</label><br>
            <input type="date" id="dt_saida" name="dt_saida"><p></p>

        <?php
            echo '<label>Motorista</label><br>
                    <select name="motorista">';

            while($row = mysqli_fetch_array($query)){
                echo '<option value='.$row["id"].' id="motorista">'.$row["nome"].'</option>';
            }
            echo '</select><p></p>';   
        ?>    

<table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td>
                        <label for="txtOrigem"><strong>Endere&ccedil;o de origem</strong></label>
                        <input type="text" id="txtOrigem" class="field" style="width: 400px" />

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtDestino"><strong>Endere&ccedil;o de destino</strong></label>
                        <input type="text" style="width: 400px" class="field" id="txtDestino" />

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Calcular dist&acirc;ncia" onclick="CalculaDistancia()" class="btnNew" />
                    </td>
                </tr>
            </tbody>
        </table>
        <div><span id="litResultado">&nbsp;</span></div>
        <div style="padding: 10px 0 0; clear: both">
            <iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=são paulo&daddr=rio de janeiro&output=embed"></iframe>
        </div>

    <input type="submit" value="Cadastrar">
    </form>
    </body>
</html>
<DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de cargas</title>
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery-1.8.1.js" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyADLsL46CQaEu2smB3EMpEV1eEbInd0ASs"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <?php include '../confere_f.php';?>
        <?php include '../conectar.php';?>
        <style>
        .note
        {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }
        .form-content
        {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }
        .form-control{
            border-radius:1.5rem;
        }
        .btnSubmit
        {
            border:none;
            border-radius:1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
        }
        </style>
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
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Cadastro de Carga para envio</p>
                </div>
                <div class="form-content">
                    <div class="row">
                    <form action="cadastroCarga_ef.php" method="POST">
                        <div><span id="litResultado">&nbsp;</span></div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="numeroNota" placeholder="Número da nota do produto"/>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Destinatário"/>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Nome do Produto"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                            <label>Data de Saída</label>
                                <input type="date" id="dt_saida" name="dt_saida" class="form-control"/>
                            </div>
                            <div class="input-group mb-3">
                            <?php
                                echo '<label>Motorista</label><br>
                                        <select name="motorista" class="form-control"/>';

                                while($row = mysqli_fetch_array($query)){
                                    echo '<option value='.$row["id"].' id="motorista">'.$row["nome"].'</option>';
                                }
                                echo '</select><p></p>';   
                            ?>
                            </div>
                        </div>
                    </form>
                    </div>
                    <hr>
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
                    <button type="button" class="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </body>
</html>
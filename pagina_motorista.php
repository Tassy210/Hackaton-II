<?php 

session_start(); 
include "conectar.php";

$sql = "select * from motorista where cpf =".$_SESSION['cpf'];
$query= mysqli_query($conexao, $sql);
$user = mysqli_fetch_array($query);

$id=$user['id'];
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width, initial-scale= 1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perfil</title>

  <!-- Custom fonts for this template-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <style type="text/css">
      .profile-pic img {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        border: 3px solid #fff;
        margin: 0 auto;
      }

      .btn-group{
        float: right !important;
      }


  </style>
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body>
    <center>
    <h4>Bem vindo motorista <?= $user['nome'] ?></h4>
    <br>
    <!-------------->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            Entregas a serem feitas
          </div>
          <div class="card-body">
    <?php
        require "conectar.php";
        include "confere_m.php";

        $select = "SELECT * FROM carga WHERE id='$id'";
        $result = mysqli_query($conexao, $select) or die ("Erro ao selecionar");

        while($row = mysqli_fetch_array($result)){
            echo '<div class="jumbotron text-center hoverable p-4">';

                  echo '<div class="row">
                        <div class="col-md-4 offset-md-1 mx-3 my-3">';

              
                  echo  '<br><div class="view overlay">
                              <img src="fotos/'.$row['foto'].'" class="img-fluid" alt="Sample image for first version of blog listing">
                              <a>
                                <div class="mask rgba-white-slight"></div>
                              </a>
                              </div>
                            </div>';

                  echo '<div class="col-md-7 text-md-left ml-3 mt-3">


                              <h2 class="h4 mb-4">'.$row['nomeProduto'].'</h2>

                              <p class="font-weight-normal">'.$row['nomeProduto'].'</p>
                              <p class="font-weight-normal">'.$row['localSaida'].'</p>
                              <p class="font-weight-normal">'.$row['destino'].'</p>
                              <p class="font-weight-normal">'.$row['numeroNota'].'</p>
                              
                              <br>

                              <form method="GET" action="inserts/cadastroCargaM.php">
                              <input type="hidden" name="id" value='.$row['idCarga'].'>
                              <a class="botao"><input type="submit" class="btn btn-primary" value="Cadastrar entrega"></a>
                              </form>
                              <br><br>';



                            echo '</div>
                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                        </div>
                        <!-- News jumbotron -->
                        </div>';
    
                echo '</div>';
        }
    ?>
    </div>
    </div>
    <a href="inserts/logouting.php" class="btn login_btn">Logout</a>
    </center>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
  <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(".selection-1").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>


<!--===============================================================================================-->
  <script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
  <script type="text/javascript">
        $('.parallax100').parallax100();
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>
<DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de entrega da carga</title>
        <meta charset="UTF-8">
        <?php include '../confere_m.php';?>
    </head>
    <body>
    <form  enctype="multipart/form-data" action="cadastroCargaM_ef.php" method="POST">
        <label>Condição da carga</label><br>
            <input type="radio" name="condicao" value="0">Normal<br>
            <input type="radio" name="condicao"  value="1">Pouco Danificada<br>
            <input type="radio" name="condicao"  value="2">Muito Danificada<p></p>

        <label>Foto da carga:</label><br>
            <input type="file" name="foto"><p></p>

        <label>Descrição adicional sobre a carga</label><br>
            <input type="text" name="descricao"><p></p>

        <label>Confirmar entrega da carga</label>
            <input type="checkbox" name="c_entrega"><p></p>

        <label>Confirmar confirmar problema com a carga</label>
            <input type="checkbox" name="p_entrega"><p></p>

        <?php
            $idCarga = $_GET['id'];
            echo '<input type="hidden" name="idCarga" value='.$idCarga.'>';
        ?>
        <input
        <input type="submit" value="Cadastrar">
    </form>
    </body>
</html>
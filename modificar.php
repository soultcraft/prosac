<!DOCTYPE html>
<html>
<body>
<header>
    <title> Modificar Datos </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</header>
<?php
    $cons1="";
    $cons2="";
    $cons3="";
    $cons4="";
    $cons5="";
    $cons6="";
    $cons7="";
    $cons8="";
    $cons9="";
    /*if(isset($_POST["guardar"]))
    {
        include("conexion.php");
        $resultado = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE 'c_usu'=10001");
        $consulta = mysqli_fetch_array($resultado)  
    }*/
?>
<center><h1>Modificar Usuario</h1></center><br>
<form method="POST" action="modificar.php">
    <center>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <table class="table">
            <tr>
            <td>Buscar por código</td>
            <td><input type ="text" name="tbus"/></td>
            <td><input type ="submit" class="btn btn-success" name="bbus" value="Buscar" /></td>
            </tr></table>

            <table class="table">
            <tr>
            <td><label for="nom">NOMBRE</label></td>
            <td><input type="text" name"nom" id="nom" value "<?php echo $cons1?>"></td>
            </tr>
            <tr>
            <td><label for="ape">APELLIDO</label></td>
            <td><input type="text" name"ape" id="ape" value "<?php echo $cons2?>"></td>
            </tr>
            <tr>
            <td><label for="usu">USUARIO</label></td>
            <td><input type="text" name"usu" id="usu" value "<?php echo $cons3?>"></td>
            </tr>
            <tr>
            <td><label for="con">CONTRASEÑA</label></td>
            <td><input type="text" name"con" id="con" value "<?php echo $cons4?>"></td>
            </tr>
            <tr>
            <td><label for="dni">DNI</label></td>
            <td><input type="text" name"dni" id="dni" value "<?php echo $cons5?>"></td>
            </tr>
            <tr>
            <td><label for="dir">DIRECCIÓN</label></td>
            <td><input type="text" name"dir" id="dir" value "<?php echo $cons6?>"></td>
            </tr>
            <tr>
            <td><label for="tel">TELEFONO</label></td>
            <td><input type="text" name"tel" id="tel" value "<?php echo $cons7?>"></td>
            </tr>
            <tr>
            <td><label for="ema">E-MAIL</label></td>
            <td><input type="text" name"ema" id="ema" value "<?php echo $cons8?>"></td>
            </tr>
            <tr>
            <td><label for="tus">TIPO DE USUARIO</label></td>
            <td><input type="text" name"tus" id="tus" value "<?php echo $cons9?>"></td>
            </tr>
            </table>
            

    <center>
        <input type="submit" value="Guardar" class="btn btn-success" name="guar">
        <input type="submit" value="Volver" class="btn btn-info" name="volver" formaction="sesion.php">
    </center>
    </div>
        <div class="col-md-4"></div>
</form>
</body>
</html>
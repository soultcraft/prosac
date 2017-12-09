<html>
<head>
    <title>Registrarse</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        if(isset($_POST['btn1']))
        {
            $nom_usu = $_POST['nom_usu'];
            $ape_usu = $_POST['ape_usu'];
            $usu_usu = $_POST['usu_usu'];
            $pas_usu = base64_encode($_POST['pas_usu']);
            $dni_usu = $_POST['dni_usu'];
            $direc_usu = $_POST['direc_usu'];
            $ncel_usu = $_POST['ncel_usu'];
            $mail_usu = $_POST['mail_usu'];

            include("conexion.php");
                        
            $resultados = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE usu_usu = '$usu_usu'");
            $consulta = mysqli_fetch_array($resultados);
            if($consulta['usu_usu'] == $usu_usu)
                {
                    echo "<h3><p class=\"bg-danger\" align=\"center\"><b>El usuario ya existe</p></b></h3>";                    
                }
            else
                {                                  
                    $cone->query("INSERT INTO $tabla_bd1 
                    (nom_usu,ape_usu,usu_usu,pas_usu,dni_usu,direc_usu,ncel_usu,mail_usu) values 
                    ('$nom_usu',
                    '$ape_usu',
                    '$usu_usu',
                    '$pas_usu',
                    '$dni_usu',
                    '$direc_usu',
                    '$ncel_usu',
                    '$mail_usu')");
                    echo "<h3><p class=\"bg-danger\" align=\"center\"><b>Bienvenido a PROSACOS SAN CARLOS</p></b></h3>";
                }
            include("close_conexion.php");
        }
    ?>
    <div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">

        <center><h1>REGISTRO DE USUARIO</h1></center><br>
        <form method="POST" action="registro.php">

            <div class="form-group">
                <label for="nom">Nombre</label>
                <input type="text" name="nom_usu" class="form-control" id="nom">
            </div>

            <div class="form-group">
                <label for="ape">Apellido</label>
                <input type="text" name="ape_usu" class="form-control" id="ape">
            </div>

            <div class="form-group">
                <label for="usu">Usuario</label>
                <input type="text" name="usu_usu" class="form-control" id="usu">
            </div>

            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" name="pas_usu" class="form-control" id="pass">
            </div>

            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni_usu" class="form-control" id="dni">
            </div>

            <div class="form-group">
                <label for="dir">Dirección</label>
                <input type="text" name="direc_usu" class="form-control" id="dir">
            </div>
            <div class="form-group">
                <label for="tel">Telefono</label>
                <input type="text" name="ncel_usu" class="form-control" id="tel">
            </div>

            <div class="form-group">
                <label for="ema">Email</label>
                <input type="text" name="mail_usu" class="form-control" id="ema">
            </div>

            <center>
                <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
                <input type="submit" value="Volver" class="btn btn-info" name="btn3" formaction="index.php">
            </center>
        </form>         
    </div>
    <div class="col-md-4"></div>
    </div>
</body>
</html>

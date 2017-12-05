<html>
<head>
    <title>Programando Ando</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        ob_start();
        if(isset($_POST['btn_index']))
        {
            $_SESSION['sesion_exito']=0;

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if($user=="" || $pass=="")
            {
                $_SESSION['sesion_exito']=2;//sera error de campos vacios
            }
            else
            {
                include("conexion.php");
                $_SESSION['sesion_exito']=3;//INCORRECTOS
                $resultado = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE usu_usu = '$user' AND pas_usu = '$pass'");
                while($consulta = mysqli_fetch_array($resultado))
                {
                    $_SESSION['sesion_exito']=1;//inicio sesion
                }
                include("close_conexion.php");
            }
        }

        if($_SESSION['sesion_exito']<>1)
        {
            header('Location:index.php');
        }
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <center><h1>PROPIETARIO</h1></center>
            <form method="POST" action="capitulo7.php">

                <div class="form-group">
                    <label for="doc">Documento</label>
                    <input type="text" name="doc" class="form-control" id="doc">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                </div>

                <div class="form-group">
                    <label for="dir">Dirección</label>
                    <input type="text" name="dir" class="form-control" id="dir">
                </div>

                <div class="form-group">
                    <label for="tel">Telefono</label>
                    <input type="text" name="tel" class="form-control" id="tel">
                </div>

                <center>
                    <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
                    <input type="submit" value="Consulta" class="btn btn-info" name="btn2">
                </center>
            </form>

            <?php
                
                if(isset($_POST['btn1']))
                {
                    
                    include("conexion.php");

                    $doc = $_POST['doc'];
                    $nombre = $_POST['nombre'];
                    $dir = $_POST['dir'];
                    $tel = $_POST['tel'];

                    $cone->query("INSERT INTO $tabla_bd1 (doc,nombre,direccion,telefono) values ('$doc','$nombre','$dir','$tel')");

                    include("close_conexion.php");

                    echo "Se insertaron correctamenta";
                }

                if(isset($_POST['btn2']))
                {
                    include("conexion.php");
                        $doc = $_POST['doc'];
                        $resultado = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE doc = $doc");
                        while($consulta = mysqli_fetch_array($resultado))
                        {
                            echo
                            "
                            <table class=\"table table-bordered\" width=\"100%\" >
                                <tr>
                                    <td><b><center>Documento</b></center></td>
                                    <td><b><center>Nombre</b></center></td>
                                    <td><b><center>Direccion</b></center></td>
                                    <td><b><center>Telefono</b></center></td>
                                </tr>
                                <tr>
                                    <td>".$consulta['doc']."</td>
                                    <td>".$consulta['nombre']."</td>
                                    <td>".$consulta['direccion']."</td>
                                    <td>".$consulta['telefono']."</td>
                                </tr>
                            </table>
                            ";
                            
                        }
                    include("close_conexion.php");
                }

            ?>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>
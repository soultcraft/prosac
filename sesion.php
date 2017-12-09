<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <script type="text/javascript" src="java/formulario.js"></script>
    <link href="css/estilos.css" rel="stylesheet">
    <title>Sesion</title>
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
                $password = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE usu_usu = '$user'");
                $consult = mysqli_fetch_array($password);
                $passw = base64_decode($consult['pas_usu']);
                $_SESSION['sesion_exito']=3;//INCORRECTOS
                $resultado = mysqli_query($cone,"SELECT * FROM $tabla_bd1 WHERE usu_usu = '$user' AND $passw = '$pass'");
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
    
    <div class="po" >
    <center><h1>TABLA DE USUARIOS</h1></center>
    <form method="POST" action="modificar.php">
        <table class="table">
            <th>#</th>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>DNI</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>E-MAIL</th>
            <th>TIPO DE USUARIO</th>
            <th>
            <?php
                include("conexion.php");
                $i=0;
                $resultado = mysqli_query($cone,"SELECT * FROM $tabla_bd1");
                while($consulta = mysqli_fetch_array($resultado))
                {
                    $i=$i+1;
                    echo
                    "<tr>                                          
                        <td>$i</td>
                        <td>".$consulta['c_usu']."</td>
                        <td>".$consulta['nom_usu']."</td>
                        <td>".$consulta['ape_usu']."</td>
                        <td>".$consulta['usu_usu']."</td>
                        <td>".base64_decode($consulta['pas_usu'])."</td>
                        <td>".$consulta['dni_usu']."</td>
                        <td>".$consulta['direc_usu']."</td>
                        <td>".$consulta['ncel_usu']."</td>
                        <td>".$consulta['mail_usu']."</td>
                        <td>".$consulta['ti_usu']."</td>                      
                    </tr>
                    ";
                    
                }
                include("close_conexion.php");
            ?>
            </th>
        </table>
        <br></br>
            <center>
                <input type="submit" value="Editar" class="btn btn-info" name="editar" >
                <input type="submit" value="Eliminar" class="btn btn-info" name="Eliminar" >
                <input type="submit" value="Salir" class="btn btn-info" formaction="index.php" >
            </center>
    </form>
    </div>
    <?php
        
        if(isset($_POST['Eliminar']))
        {
            /*
            include("conexion.php");

            $doc = $_POST['doc'];
            $nombre = $_POST['nombre'];
            $dir = $_POST['dir'];
            $tel = $_POST['tel'];

            $cone->query("INSERT INTO $tabla_bd1 (doc,nombre,direccion,telefono) values ('$doc','$nombre','$dir','$tel')");

            include("close_conexion.php");*/

            echo "Se insertaron correctamenta";
        }
/*
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
        }*/

    ?>
</body>
</html>
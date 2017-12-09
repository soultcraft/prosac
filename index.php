<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- <meta name="Diseño y Publicidad" content="">
        <meta name="Central de Diseño" content="">-->
        <!--<link rel="icon" href="img/favicon.ico">-->
        <title>PROSACOS SAN CARLOS</title>
        <!-- Bootstrap core CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8"><font color="#000"><center><strong><h1>PROSACOS SAN CARLOS</h1></strong><h3>INICIO DE SESION</h3></center></font></div>
                    <div class="col-md-2"></div>
                </div>
    <h3>    
        <p class="bg-danger" align="center">
        <b>
            <?php
            session_start();
            ob_start();
                if(isset($_SESSION['sesion_exito']))
                {                   
                    if($_SESSION['sesion_exito']==2)
                    {
                        echo "Los campos SON OBLIGATORIOS";
                    }
                    if($_SESSION['sesion_exito']==3)
                    {
                        echo "DATOS INCORRECTOS";
                    }
                }
                else
                {
                    $_SESSION['sesion_exito']=0;
                }
                
            ?>
        </b>
        </p>
        <p class="bg-success" align="center">
        <b>
            <?php
                if($_SESSION['sesion_exito']==4)
                    {echo "GRACIAS POR USAR NUESTROS SERVICIOS";}
                $_SESSION['sesion_exito']=0; //Despues de confirmar el error, igualo lo variable a 0
            ?>
        </b>
        </p>
    </h3>
                <!--Inicio del formulario de Iniciar sesion-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="well"> <!--hace un sombreado a la columna-->
                            <center>
                                <h3><strong>INICIAR SESION</strong></h3><br>
                                <img src="imagenes/prosacos.jpg" class="img-circle" width="150" height="150">
                                
                                <br><br><br>
                                
                                <form class="form-inline" method="POST" action="sesion.php" name="login">
                                    <div class="form-group">
                                      <label for="usuario">USUARIO</label>
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="user">
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                      <label for="pass">CONTRASEÑA</label>
                                        <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">   
                                    </div>  
                                    <br><br>
                                    <input type="hidden" name="envio">
                                    <p><input type="submit" id="enviar" class="btn btn-success" value="INICIAR SESIÓN" name="btn_index">
                                
                                    <input type="submit" formaction="registro.php" id="registro" class="btn btn-danger" value="REGISTRARSE" name="btn_registro">
                                  
                                    </p>
                                </form>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
<?php

    $host = "localhost";
    $bd = "prosac_sa";
    $use = "root";
    $passw = "123456789";

    $tabla_bd1 = "usuario";

    //error_reporting(0);

    $cone = new mysqli($host,$use,$passw,$bd);

    if ($cone->connect_errno) {
        echo "Nuestro sitio experimenta fallos ... ";
        exit();
    }

?>
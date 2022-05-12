<?php
  /*
    $db_host="localhost";
    $db_nombre="u345632271_pmo";
    $db_usuario="u345632271_Gifsys15022019";
    $db_contra="Prestamos1512";
*/
    $db_host="localhost";
    $db_nombre="u345632271_pmo";
    $db_usuario="root";
    $db_contra="";

    
    $miConexion = mysqli_connect( $db_host,  $db_usuario, $db_contra,$db_nombre);
    
    if (!$miConexion) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
   // echo "conectado Online!";
 
?>


<?php
 $db_host="localhost";
   
   // $db_nombre="id17213126_nticx";
   // $db_usuario="iid17213126_gdjuarez";
  //  $db_contra="Lau/20526866";

    $db_nombre="nticxweb";
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


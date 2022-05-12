<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
	 //echo "Usuario: ". $_SESSION['user']."</div>";
}else{
	echo 'No te has logeado, inicia sesion.';	
}

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	// Imprime algo como: 
	//	echo 'Hoy es:';
    //	echo date("Y-m-d");
// Include database connection
include("../conexion/conexion.php");

$idmensaje = $_POST['idmensaje'];
//echo $idmensaje;

$sql='DELETE FROM mensajes WHERE id='.$idmensaje;
//echo $sql;

$borrar = mysqli_query($miConexion,'DELETE FROM mensajes WHERE id='.$idmensaje );

			
			if($borrar)
			{
				echo '<script language=javascript>
				  alert("Mensaje eliminado con exito")
				  self.location = "MenuMensajes.php"</script>';				 
							
			}else{
				
				echo '<script language=javascript>
				  alert("no se elimino!!")
				  self.location = "MenuMensajes.php"</script>';	
            }
            


?>
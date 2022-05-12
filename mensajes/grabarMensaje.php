<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo "<div style='text-align:right'> <h3>Usuario: ". $_SESSION['user']."</h3></div>";
}else{
	
	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';	
}
?>
<?php
include("../conexion/conexion.php");
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

//Recibir
$curso = $_POST['curso'];
$asignatura = $_POST['asignatura'];
$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

//echo $curso.$asignatura.$autor.$titulo.$mensaje;

		$sql='INSERT INTO mensajes (curso, asignatura, autor,titulo,mensaje) values("'.($curso).'", "'.($asignatura).'", "'.($autor).'","'.($titulo).'","'.($mensaje).'")';
       	//echo $sql;
		$grabar = mysqli_query($miConexion,$sql);		

		if($grabar){

			echo '<script language=javascript>
		  		alert("Mensaje Registrado.")
		  		self.location = "MenuMensajes.php"</script>';	
		
		}else{
		
			echo '<script language=javascript>
		  		alert("Hubo un error en el envio")
		  		self.location = "Menumensajes.php"</script>';	
		}
 	 


?> 

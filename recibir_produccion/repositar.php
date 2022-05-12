<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
}else{
	echo 'No te has logeado, inicia sesion.';	
	header("Location: ../index.php"); /* Redirección del navegador */

}

	//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);
// Desactivar toda notificación de error
error_reporting(0);

//capturo las 2 variables por GET
$ruta=$_GET['repositar1'];
$archivo=$_GET['repositar2'];

$origen=$ruta.'/'.$archivo;

$destino=$ruta.'/repositorio/'.$archivo;


function move_to($origen,$destino){
	copy($origen,$destino);
	unlink($origen);
  }

//EJECUTO LA funcion  
 // move_to($origen,$destino);

  if (move_to($origen,$destino)){
	
	$dyn_table= "<table id='TablaError'class='table table-striped bg-danger'>";
    $dyn_table.="<th>" . "NO se pudo MOVER el archivo " . "</th>";  
    $dyn_table.="<tr><td>" . " al REPOSITORIO   " . "</td></tr>"; 
    $dyn_table.="</table>";

}else{
	
	$dyn_table= "<table id='Tablaok'class='table table-striped bg-success'>";
	$dyn_table.="<th>" . "Se envio el archivo " . "</th>";
	$dyn_table.="<tr><td>" . " al REPOSITORIO   " . "</td></tr>";  
    $dyn_table.="</table>";
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Repositorio</title>		
		 <meta name="viewport" content="width=device-width, initial-scale=1"> 	
	   	<link rel="stylesheet" href="../css/bootstrap.min.css">   
	    <link rel="stylesheet" href="../css/jquery-ui.css"> 		
	    
	</head>
	<body>
		<header>
	 <div class='container'>	
			<nav class="navbar navbar-dark bg-dark rounded">
  <!-- Navbar content -->
  		<form action="frmRecibirProd.php" method="POST">
		    <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />
		 </form> 
	  <a href="#" class="navbar-brand"></a>
	  <input type="button" value="VOLVER" onClick="history.go(-1);" hidden>
	    <form action= "../destruir.php" method="POST"  class="form-inline">
	       <button class="btn btn-outline-danger sm" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
  	</form>

	</nav>
  
	</header>
		 <div class="container">
				   	<div class="row align-items-center p-4">
				        <div class="col-md-3">	</div>		

						<div class="col-md-6">	
							
							<?php  echo $dyn_table ;      ?>

						</div>
			
					<div class="col-md-3">	</div>	
			</div>	
	</body>
</html>
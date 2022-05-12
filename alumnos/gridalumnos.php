<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
	 
}else{
	
	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';	
}
?>
<?php
// Include database connection
include("../conexion/conexion.php");
?>
<!--DATAGRID -->
<?php 

// consulta a la tabla usuarios
$sql = mysqli_query($miConexion,"SELECT id,Apellido,Nombre,dni,curso,telefono FROM alumnos order by curso,Apellido"); 
// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);
		
$dyn_table='<table id="Tabla" class="table table-striped">';
        $dyn_table.="<td>" . "codigo" ."</td>";  
       	$dyn_table.="<td>" . "Apellido" ."</td>";
		$dyn_table.="<td>" . "Nombre ". "</td>";
		$dyn_table.="<td>" . "DNI ". "</td>";
		$dyn_table.="<td>" . "Curso ". "</td>";
		$dyn_table.="<td>" . "Telefono ". "</td>";
				
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
  	
    $idc = $row["id"];
    $capellido = $row["Apellido"];
	$cnombre = $row["Nombre"];
    $cdni = $row["dni"];
    $ccurso = $row["curso"];
    $ctelefono = $row["telefono"];
		
	$dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit' name='caja' class='btn btn-outline-info' value='".$idc."'/>"."</td>";
	$dyn_table.="<td>" . $capellido ."</td>";
	$dyn_table.="<td>" . $cnombre ."</td>";
	$dyn_table.="<td>" . $cdni."</td>";
	$dyn_table.="<td>" . $ccurso."</td>";
	$dyn_table.="<td>" . $ctelefono."</td>";
	
}
 $dyn_table.="</tr></table>";

 
?>
<!--FIN DATAGRID------------------------- -->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>MENU</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head

><body>
<header>
	
	<div id="cerrar" align="right" >       
	  		<form action= "destruir.php" method="POST">
		      <input name="cerrar" type="submit" class="btn btn-outline-danger btn-sm" value="Usuario : <?php echo $_SESSION['user']?> /cerrar-sesion"/>
		      <h1 align='center'>Listado de  Alumnos </h1>
		   </form>       
	</div>
	<div id="volver" align="left">       
  		<form action="frmalumnos.php" method="POST">
	      <input name="Enviar" type="submit" value="volver al Menu" class="btn btn-outline-warning btn-sm" />
	   </form>        
	</div>
    <hr>
</header>
	<div class='container'>
		<div class="row">
			<div class="col-md-2">   	
				</div>
			<div class="col-md-8">
				<div id="chequeo">       
				  	<form action="frmalumnos.php" method="POST">
						<?php 
						echo $dyn_table;
						echo "<p align='center'> Cant. de registros: ".$cantidad_registros."</p>";
						?> 			     
				   </form> 
				</div>       
			</div>
			<div class="col-md-2">   	
				</div>
		</div>
			
	</div>
	<footer>
        <small>&copy; Copyright 2020, GDJuarez</small>
	</footer>
	</body>
</html>
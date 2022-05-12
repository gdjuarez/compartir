<?php

// Include database connection
include("../conexion/conexion.php");
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

$curso = '';
$asignatura='';
$mensaje = '';
$autor = '';   

$curso = $_POST['curso'];
$asignatura = $_POST['asignatura'];

// consulta a la tabla usuarios
$consulta = "SELECT curso,asignatura,autor,titulo,mensaje FROM mensajes where curso='$curso'and asignatura='$asignatura'"; 
//echo $consulta;
$sql = mysqli_query($miConexion,$consulta); 
// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);
		
$dyn_table='<table id="Tabla" class="table table-striped table-sm">';
       		
				
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){  	
   
    $curso = $row["curso"];
	$$asignatura = $row["asignatura"]; 
	$autor = $row["autor"]; 
	$titulo = $row["titulo"]; 
	$mensaje = $row["mensaje"];
	
	$dyn_table.="<tr>";
	$dyn_table.="<th>" . "Curso" ."</th>";
	$dyn_table.="<th>" . "Asignatura ". "</th>";
	$dyn_table.="<th>" . "Autor ". "</th>";
	$dyn_table.="<th>" . "Titulo ". "</th>";		
	$dyn_table.="</tr><tr>";
  	$dyn_table.="<td>" . $curso ."</td>";
	$dyn_table.="<td>" . $asignatura ."</td>";
	$dyn_table.="<td>" . $autor."</td>";
	$dyn_table.="<td>" . $titulo."</td>";
	$dyn_table.="</tr><tr>";
	$dyn_table.="<th>" . "Mensaje ". "</th>";	
	$dyn_table.="<td>" . $mensaje ."</td>";
		
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
</head>
<body>
<header>	
</header>
	
		<div id="chequeo">       
				<?php 
					echo $dyn_table;
					echo "<p align='center'> Cant. de registros: ".$cantidad_registros."</p>";
				?> 			     
			</div> 
	</body>
</html>
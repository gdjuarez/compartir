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

error_reporting(error_reporting() & ~E_NOTICE);

//Recibir

$autor = $_POST['autor'];
//echo $autor;

// consulta a la tabla usuarios
$sql = "SELECT id,curso,asignatura,autor,titulo,mensaje FROM mensajes where autor ='$autor'"; 
//echo $sql;
$sql = mysqli_query($miConexion,$sql); 
// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);
		
$dyn_table='<table id="Tabla" class="table table-striped">';
        $dyn_table.="<th class='text text-danger'>" . "Borrar" ."</th>";  
       	$dyn_table.="<th>" . "Curso" ."</th>";
		$dyn_table.="<th>" . "Asignatura ". "</th>";
		$dyn_table.="<th>" . "Autor ". "</th>";
		$dyn_table.="<th>" . "Titulo ". "</th>";
		$dyn_table.="<th>" . "Mensaje ". "</th>";
		
				
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
  	
    $idmensaje = $row["id"];
    $curso = $row["curso"];
	$asignatura = $row["asignatura"];
	$autor = $row["autor"];
	$titulo = $row["titulo"];
	$mensaje = $row["mensaje"];
   
		
	$dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit'  title='BORRAR mensaje'name='idmensaje' class='btn btn-danger' value='".$idmensaje."'/>"."</td>";
	$dyn_table.="<td>" . $curso ."</td>";
	$dyn_table.="<td>" . $asignatura ."</td>";
	$dyn_table.="<td>" . $autor."</td>";
	$dyn_table.="<td>" . $titulo."</td>";
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
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head

><body>

<header>
    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
         <div id="volver" align="left">       
      <form action="MenuMensajes.php" method="POST">
        <input name="Enviar" type="submit" value="volver al Menu" class="btn btn-warning btn-sm" />
     </form>        
  </div>
     
        <a href="#" class="navbar-brand"><h1>Mensajes enviados</h1></a>
          <form action= "../destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">usuario : <?php echo $_SESSION['user']?> <br> cerrar-sesion</button>
          </form>
      </nav>
  </header>
	<div class='container'>
	<hr>
		<div class="row">
			<div class="col-md-2">   	
				</div>
			<div class="col-md-8">
				<div id="chequeo">       
				  	<form action="borrarmensaje.php" method="POST">
						<?php 
						echo $dyn_table;
						echo "<p align='center'> Cant. de registros: ".$cantidad_registros."</p>";
						?> 			     
				   </form> 
				</div> 
				<hr>      
			</div>
			<div class="col-md-2">   	
			</div>
				
				<footer>
					<small>&copy; Copyright 2020, GDJuarez</small>
				</footer>
		</div>
			
	</div>
	
	</body>
</html>
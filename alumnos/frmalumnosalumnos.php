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

//Recibir codigo
$COD=strip_tags($_POST['codigo']);
//Recibir
$apellido = strip_tags($_POST['apellido']);
$nombre = strip_tags($_POST['nombre']);
$dni = strip_tags($_POST['dni']);
$curso = strip_tags($_POST['curso']);
$telefono = strip_tags($_POST['telefono']);


// verifico que boton se apreto
if(isset($_POST["submit"])){
	$boton=$_POST["submit"];
	
	if($boton=="Guardar"){
		//verifico que no este VACIO el campo usuario
		if((isset($_POST['dni']) && empty($_POST['dni']))&&
		  (isset($_POST['nombre']) && empty($_POST['nombre']))){
	
			echo '<script language=javascript>
		  		alert("Apellido y Nombre, son obligatorios")
		  		self.location = "frmclientes.php"</script>';
	
 		}else{

			$query = mysqli_query($miConexion,'SELECT * FROM alumnos WHERE  dni="'.mysqli_real_escape_string($miConexion,$dni).'"');
			if($existe = mysqli_fetch_object($query))
		{
			//echo 'El usuario '.$user.' ya existe.';
			echo '<script language=javascript>
		  		alert("Existe un Alumno con ese Documento") </script>';	
			
			
		}else{
			$grabar = mysqli_query($miConexion,'INSERT INTO alumnos (Apellido, Nombre, dni,curso,telefono) values ("'.mysqli_real_escape_string($miConexion,$apellido).
			'", "'.mysqli_real_escape_string($miConexion,$nombre).'","'.mysqli_real_escape_string($miConexion,$dni).'","'.mysqli_real_escape_string($miConexion,$curso).'","'.mysqli_real_escape_string($miConexion,$telefono).'")');
		
		if($grabar)
		{
			echo '<script language=javascript>
		  		alert("Alumno registrado.")
		  		self.location = "frmalumnosalumnos.php"</script>';	
		
		}else{
		
			echo '<script language=javascript>
		  		alert("Hubo un error en el registro")
		  		self.location = "frmalumnosalumnos.php"</script>';	
		}
 	  }
	}
  }
	
	
	
}


?>

<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Formulario de registro Alumnos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



</head>
<body >


 <header>
    <div class='container'>
      <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
     <div id="volver" align="left">       
  		<form action="../menualumnos.php" method="POST">
	      <input name="Enviar" type="submit" value="volver al Menu" class="btn btn-warning btn-sm" />
	   </form>        
	</div>
        <a href="#" class="navbar-brand"><h1>Gestion de Alumnos</h1></a>
          <form action= "../destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">usuario : <?php echo $_SESSION['user']?> <br> cerrar-sesion</button>
          </form>
      </nav>
  </header>

<div class="container">
	<div class="row">
		<div class="col-md-4">   	
			</div>
		<div class="col-md-4">
		 	
	      <form action="frmalumnosalumnos.php" method="POST">
	    	<p><input type="text" name="codigo" class="form-control" value="<?php echo $COD?>" hidden /></p>
	        <p><input type="text" name="apellido" class="form-control" value="<?php echo $apellido?>" placeholder="Apellido" required></p>
	        <p><input type="text" name="nombre" class="form-control" value="<?php echo $nombre?>" placeholder="Nombre" required></p>
	        <p><input type="text" name="dni" class="form-control" value="<?php echo $dni?>" placeholder="DNI" ></p> 

	       	<p><select class="form-control input-sm" id="curso" name="curso" title='Seleccione el curso.'>
						<option value="1A">Curso: 1ero A</option>					
						<option value="1B">Curso: 1ero B</option>
						<option value="2A">Curso: 2do A</option>
						<option value="2B">Curso: 2do B</option>					
						<option value="3A">Curso: 3ero A</option>
						<option value="3B">Curso: 3ero B</option>
						<option value="4A">Curso: 4to A</option>
						<option value="4B">Curso: 4to B</option>
						<option value="5A">Curso: 5to A</option>
						<option value="5B">Curso: 5to B</option>
						<option value="6A">Curso: 6to A</option>
						<option value="6B">Curso: 6to B</option>

						<option value="A1">Curso: ACELERACION 1</option>
						<option value="A2">Curso: ACELERACION 2</option>
						<option value="A3">Curso: ACELERACION 3</option>

				</select></p>
				<p><input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" placeholder="Telefono" ></p> 
		
	        <input type="submit" name="submit" value="Guardar" class="btn btn-primary mb-2"  />
	      
	  	</form>  

		</div>

		<div class="col-md-4">   	
			</div>
	</div>
	
<hr>
   <footer>
        <small>&copy; Copyright 2020, GDJuarez</small>
	</footer>

	</div>    

  
</body>
</html>


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

error_reporting(0);

//Recibir codigo
$COD=strip_tags($_POST['codigo']);
//Recibir
$apellido = strip_tags($_POST['apellido']);
$nombre = strip_tags($_POST['nombre']);
$dni = strip_tags($_POST['dni']);
$curso = strip_tags($_POST['curso']);
if(isset($_POST['telefono'])){
$telefono = strip_tags($_POST['telefono']);
}


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
			'", "'.mysqli_real_escape_string($miConexion,$nombre).'", "'.mysqli_real_escape_string($miConexion,$dni).'","'.mysqli_real_escape_string($miConexion,$curso).'","'.mysqli_real_escape_string($miConexion,$telefono).'")');
		
		if($grabar)
		{
			echo '<script language=javascript>
		  		alert("Alumno registrado.")
		  		self.location = "frmalumnos.php"</script>';	
		
		}else{
		
			echo '<script language=javascript>
		  		alert("Hubo un error en el registro")
		  		self.location = "frmalumnos.php"</script>';	
		}
 	  }
	}
  }
	
	if($boton=="Actualizar"){
		//Recibir codigo
	$COD=strip_tags($_POST['codigo']);
	//Recibir
	$apellido = strip_tags($_POST['apellido']);
	$nombre = strip_tags($_POST['nombre']);
	$dni = strip_tags($_POST['dni']);
	$curso = strip_tags($_POST['curso']);
	$telefono = strip_tags($_POST['telefono']);

		
		$actualizar=mysqli_query($miConexion,'UPDATE alumnos SET Apellido ="'.mysqli_real_escape_string($miConexion,$apellido).
			'",Nombre="'.mysqli_real_escape_string($miConexion,$nombre).
			'",dni="'.mysqli_real_escape_string($miConexion,$dni).
			'",curso="'.mysqli_real_escape_string($miConexion,$curso).
			'",telefono="'.mysqli_real_escape_string($miConexion,$telefono).
			'" where id ="'.mysqli_real_escape_string($miConexion,$COD).'"')
			or die("error consulta: ".mysqli_error());
			
			//echo $actualizar;
			echo '<script language=javascript>
		  		alert("ACTUALIZADO")
		  		self.location = "frmalumnos.php"</script>';
			
	}
	if($boton=="Eliminar"){
		if((isset($_POST['codigo']) && empty($_POST['codigo']))){
	
			echo '<script language=javascript>
		  		alert("No ha seleccionado a un Alumno")
		  		self.location = "frmalumnos.php"</script>';
	
 		}else{
					
		$eliminar= mysqli_query($miConexion,'DELETE FROM alumnos WHERE id ="'.mysqli_real_escape_string($miConexion,$COD).'"')
					or die("error consulta: ".mysqli_error());
					
			echo '<script language=javascript>
		  		alert("Alumno eliminado")
		  		self.location = "frmalumnos.php"</script>';
		}
	//-----------	
	}
	
}

?>
 
<?php 
//Recibo desde la grid
if (isset($_POST['caja'])) {
       $COD = $_POST['caja'];
	} else {
   //echo "nada";
}

?>

<?php 
//consultar database clientes con el CODIGO
if($COD >0 ){

$query = mysqli_query($miConexion,'SELECT * FROM alumnos WHERE id="'.mysqli_real_escape_string($miConexion,$COD).'"')
			or die("error consulta: ".mysqli_error());
		while ($reg=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$apellido= $reg['Apellido'];
	$nombre= $reg['Nombre'];
	$dni= $reg['dni'];
	$curso= $reg['curso'];
	$telefono= $reg['telefono'];
	
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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
	
   		$(function(){
			$('#search').focus();
			$('#search_form').submit(function(e){
				e.preventDefault();
			})

			$('#search').keyup(function(){
					
				var envio = $('#search').val();
				
				$('#resultados').html('<h3><img src="img/loading.gif" width="20" alt="" /> Cargando</h3>');
				$('#resultados').css('background','#ffffff');

				$.ajax({
					type: 'POST',
					url: 'buscadoralumnos.php',
					data: ('search='+envio),
					success: function(resp){
						if(resp!=""){
							$('#resultados').html(resp);
						}
					}
				})
			})
		})

   </script>

</head>
<body >


 <header>
    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
     <div id="volver" align="left">       
  		<form action="../menu.php" method="POST">
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
		 	
	      <form action="frmalumnos.php" method="POST">
	    	<p><input type="text" name="codigo" class="form-control" value="<?php echo $COD?>" hidden /></p>
	        <p><input type="text" name="apellido" class="form-control" value="<?php echo $apellido?>" placeholder="Apellido" required></p>
	        <p><input type="text" name="nombre" class="form-control" value="<?php echo $nombre?>" placeholder="Nombre" required></p>
	        <p><input type="text" name="dni" class="form-control" value="<?php echo $dni?>" placeholder="DNI" ></p>  

	       	<p><select class="form-control input-sm" id="curso" name="curso" title='Seleccione el curso.'>
	       	      <option selected value="<?php echo $curso ?>">Curso:<?php echo $curso ?></option>
						<option value="4">Curso: 4to</option>
				</select></p>
		
		    <p><input type="text" name="telefono" class="form-control" value="<?php echo $telefono?>" placeholder="Telefono" ></p> 
	        <input type="submit" name="submit" value="Guardar" class="btn btn-primary mb-2"  />
	        <input type="submit" name="submit" value="Actualizar" class="btn btn-warning mb-2" />
	        <input type="submit" name="submit" value="Eliminar" class="btn btn-danger mb-2"/>
	  	</form>  

		</div>

		<div class="col-md-4">   	
			</div>
	</div>
	<div id="lista" align="center" style="padding:10px">       
		  		<form action="gridalumnos.php" method="POST">
			      <input name="Enviar" type="submit" value="Listar Alumnos" class="btn btn-outline-primary btn-lg" />
			   </form>        
		</div>
<hr>
   <div id='titulobuscador'><h3>Buscador de Alumnos: </h3></div>
		<div id="buscador" >
				<form action="" method="post" name="search_form" id="search_form">
				<input type="text" name="search" id="search" class="form-control"  placeholder="Ingrese apellido">				
				</form>
		</div>		
		<div id="resultados"></div>
    <footer>
        <small>&copy; Copyright 2020, GDJuarez</small>
	</footer>
	</div>    

</body>
</html>


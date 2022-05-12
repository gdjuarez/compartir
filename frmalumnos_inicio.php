<?php
/*
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo "<div style='text-align:right'> <h3>Usuario: ". $_SESSION['user']."</h3></div>";
}else{
	
	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';	
} */
?>
<?php
include("conexion/conexion.php");
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

$apellido = '';
$nombre = '';
$dni = '';
$curso ='';
$telefono = '';



// verifico que boton se apreto
if (isset($_POST["submit"])) {
	$boton = $_POST["submit"];

			//Recibir
		$apellido = strip_tags($_POST['apellido']);
		$nombre = strip_tags($_POST['nombre']);
		$dni = strip_tags($_POST['dni']);
		$curso = strip_tags($_POST['curso']);
		$telefono = strip_tags($_POST['telefono']);

	if ($boton == "registrar") {
		//verifico que no este VACIO el campo usuario
		if ((isset($_POST['dni']) && empty($_POST['dni'])) &&
			(isset($_POST['nombre']) && empty($_POST['nombre']))
		) {

			echo '<script language=javascript>
		  		alert("Apellido y Nombre, son obligatorios")
		  		self.location = "frmclientes.php"</script>';
		} else {

			$query = mysqli_query($miConexion, 'SELECT * FROM alumnos WHERE  dni="' . mysqli_real_escape_string($miConexion, $dni) . '"');
			if ($existe = mysqli_fetch_object($query)) {
				//echo 'El usuario '.$user.' ya existe.';
				echo '<script language=javascript>
		  		alert("Existe un Alumno con ese Documento") </script>';
			} else {
				$grabar = mysqli_query($miConexion, 'INSERT INTO alumnos (Apellido, Nombre, dni,curso,telefono) values ("' . mysqli_real_escape_string($miConexion, $apellido) .
					'", "' . mysqli_real_escape_string($miConexion, $nombre) . '", "' . mysqli_real_escape_string($miConexion, $dni) . '","' . mysqli_real_escape_string($miConexion, $curso) . '","' . mysqli_real_escape_string($miConexion, $telefono) . '")');

				if ($grabar) {
					echo '<script language=javascript>
		  		alert("Alumno registrado.")
		  		self.location = "frmalumnos_inicio.php"</script>';
				} else {

					echo '<script language=javascript>
		  		alert("Hubo un error en el registro")
		  		self.location = "frmalumnos.php"</script>';
				}
			}
		}
	}
}

?>

<!DOCTYPE html>

<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Formulario de registro Alumnos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<body>
	<header>
		<div class='container'>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<nav class="navbar navbar-dark bg-info rounded">
						<!-- Navbar content -->
						<a href="#" class="navbar-brand">
							<h2>Registro de Alumnos</h2>
						</a>
						<form action="index.php" method="POST" class="form-inline">
							<button class="btn btn-dark btn-sm" type="submit"><br>volver</button>
						</form>
					</nav>
				</div>
				<div class="col-md-3">
				</div>

			</div>
		</div>

	</header>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 bg-light border rounded">

				<form action="frmalumnos_inicio.php" method="POST">				
					<p><input type="text" name="apellido" class="form-control" value="<?php echo $apellido ?>" placeholder="Apellido" required></p>
					<p><input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Nombre" required></p>
					<p><input type="text" name="dni" class="form-control" value="<?php echo $dni ?>" placeholder="DNI"></p>

					<p><select class="form-control input-sm" id="curso" name="curso" title='Seleccione el curso.'>
							<option selected value="<?php echo $curso ?>">Curso:<?php echo $curso ?></option>
							<option value="4">Curso: 4to</option>
						</select></p>

					<p><input type="text" name="telefono" class="form-control" value="<?php echo $telefono ?>" placeholder="Telefono"></p>
					<input type="submit" name="submit" value="registrar" class="btn btn-primary mb-2" />

				</form>
				<hr>
				<footer>
					<small>&copy; Copyright 2020, GDJuarez</small>
				</footer>

			</div>

			<div class="col-md-4">

			</div>

		</div>

</body>

</html>
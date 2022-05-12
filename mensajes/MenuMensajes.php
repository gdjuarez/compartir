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
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Mensajes</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<header>
    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
         <div id="volver" align="left">       
      <form action="../menu.php" method="POST">
        <input name="Enviar" type="submit" value="volver al Menu" class="btn btn-warning btn-sm" />
     </form>        
  </div>
     
        <a href="#" class="navbar-brand"><h1>Enviar Mensajes</h1></a>
          <form action= "../destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">usuario : <?php echo $_SESSION['user']?> <br> cerrar-sesion</button>
          </form>
      </nav>
  </header>

<body>
<div class="container">
        <hr>
   	 	<div class="row">
   	 		<div class="col-md-3"> </div>

			  <div class="col-md-6">
				<div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">
					<div class="list-group">		   		 
						<button type="button" class="list-group-item list-group-item-action active">Para enviar Mensajes a los alumnos seleccione curso y asignatura:</button>
					</div>
					<form name="frmMensaje" id="frmMensaje" action="grabarMensaje.php" method="post">					
					<select id="asignatura" name="asignatura" class="p-2 mb-4 rounded" required>					
						<option value="nticx">nticx</option>  						
						</select>
						<input type="text"  name="autor" id="autor"  value="<?php echo $_SESSION['user']?>" hidden>
						<input type="text" class="form-control p-2 mb-4" name="titulo" id="titulo" placeholder="Ingresa Titulo del mensaje" value=""required>
						<textarea class="form-control" name="mensaje" id="mensaje" rows="5" placeholder="Mensaje de texto (hasta 300 caracteres)" maxlength="300" required></textarea>
						<div class="form-group">
						<input type="text"  name="curso" id="curso"  value="4" hidden > 
						<input type="submit" name="Guardar" id="Guardar" value="Enviar">
						</div>
				</form>     
				</div>

				<form action="gridmensajes_prof.php" method="POST">				
					<input type="text"  name="autor" id="autor"  value="<?php echo $_SESSION['user']?>" readonly > 
					<input type="submit" name="listar" id="listar" value="Ver mensajes"> 
			   </form> 



				</div>	
			</div>
		</div>	
    
   
    </script>
    
</body>

</html>
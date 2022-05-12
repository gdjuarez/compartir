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

?>

<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>MENU</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     

    <script src="Jquery/jquery-2.1.3.min.js"> </script>
    <script src="Jquery/jquery.color.animation.js"></script> 
  </head>
   <header>

    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
      <form>  </form>

        <a href="#" class="navbar-brand"><h2>Menu</h2></a>
          <form action= "destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">usuario : <?php echo $_SESSION['user']?> <br> cerrar-sesion</button>
          </form>

      </nav>
  </header>
  </br>
   <div class="container">
   	 	<div class="row">
   	 		 <div class="col-md-4">  
           <div id="GDJ"></div> 
          <button type="button" class="list-group-item list-group-item-danger rounded">Profesores</button>
          <a href="usuarios/registroUsuarios.php" class="list-group-item rounded">Registrarse como usuario <i class="far fa-address-card"></i></a>         

</br>

          <button type="button" class="list-group-item list-group-item-primary rounded">Alumnos</button>
          <a href="alumnos/frmalumnos.php" class="list-group-item rounded">ABM Alumnos</a>
          <a href="" class="list-group-item" hidden>Registrar Nota del Alumno</a> 

</br>
          <a href="" class="list-group-item" hidden>Registrar Nota del Alumno</a> 
			</div>
			 <div class="col-md-4">
		   	<div class="list-group">
          <a href="subir_actividades/subir.php" class="list-group-item list-group-item-primary rounded "><i class="fas fa-caret-square-up"></i> Subir Actividades a Nticx 4to agro  </i></a> 
    
			</div>

      <div class="list-group">
       <a href="recibir_produccion/frmRecibirProd.php" class="list-group-item list-group-item-info rounded mb-1">Recibir Trabajos de los Alumnos <i class="fas fa-file-alt"></i></a>

      </div>
      <div class="list-group">	
      <a href="mensajes/MenuMensajes.php" class="list-group-item list-group-item-secondary rounded mb-1">Enviar Mensaje a los Alumnos <i class="fas fa-envelope"></i></a>
      </div>
  		</div>
       <div class="col-md-4">

      </div>
  	</div>

</header>

 

<footer>
      <HR>
        <small>&copy; Copyright 2020, GDJuarez</small>

	</footer>





  </body>

 



</html>
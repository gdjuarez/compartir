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
  
    include("conexion/conexion.php");
    
    //NO MUESTRA ERROR al cargar
    error_reporting(error_reporting() & ~E_NOTICE);
    
    $user_alumno=$_SESSION['user'];
    $apellido_nombre=''; 
    
    //cargar apellido y nombre segun el user
    $consultacarga = mysqli_query($miConexion,'SELECT apellido_nombre FROM usuarios WHERE user="'.mysqli_real_escape_string($miConexion,$user_alumno).'"');
    
    while($row = mysqli_fetch_row($consultacarga)){       
      $apellido_nombre_alumno = $row[0];  
      //echo "nombre".  $apellido_nombre_alumno; 
      $_SESSION['username']=$apellido_nombre_alumno;
    };
    
    //****************************************************************** 
	
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Presentar Trabajos</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
   
    <script src="Jquery/jquery-2.1.3.min.js"> </script>
    <script src="Jquery/jquery.color.animation.js"></script>

    <script>
   
    </script>
  </head>

   <header>
    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
      <form>  </form>
        <a href="#" class="navbar-brand"><h3>Menu alumnos</h3></a>
          <form action= "destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">usuario : <?php echo $_SESSION['user'] ."<br>". $apellido_nombre_alumno?> <br> cerrar-sesion</button>
          </form>
      </nav>
  </header>
 
 <div id="GDJ" ></div> 
 
     
   <div class="container">
     <hr>
   	 	<div class="row">
   	 		 <div class="col-md-4">            
                  

            <button type="button" class="list-group-item list-group-item-action active rounded" hidden>Alumnos</button>
            <a href="alumnos/frmalumnosalumnos.php" class="list-group-item "hidden>Registrarse como Alumno</a>
            <a href="usuariosalumnos/cambioClaveAlumnos.php" class="list-group-item bg-success text-light rounded">Cambiar contraseña <i class="fas fa-address-card"></i></a>
          
                <div class="w-95 p-1">
	        	<img src="img/fototuto.jpeg" class="img-thumbnail" alt="Responsive image" title="Autor:Nina Losada">
	            </div>
          
          </div>	
        
		

			 <div class="col-md-4">
		   	<div class="list-group">	   		 
		   	
          <a href="subir_produccion/subirprod.php" class="list-group-item list-group-item-primary">Presentar trabajos 4°Agro </a>
                  
			</div>
			
  		</div>

       <div class="col-md-4">
           

      </div>


  	</div>

     <hr>
 
</header>
 
  <footer>
        <small>&copy; Copyright 2020, GDJuarez</small>
	</footer>

  </body>
 

</html>
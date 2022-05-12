<?php

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('America/Argentina/Buenos_Aires');
//NO MUESTRA ERROR al cargar
  error_reporting(error_reporting() & ~E_NOTICE);
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>MENU</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
    <script src="../Jquery/jquery.js"></script> 
    <script src="ajax_mensaje_archivos.js"></script> 
	  
   
  </head>
 
   <header>
     <div class='container'>  
        <nav class="navbar navbar-dark bg-dark rounded">
    <!-- Navbar content -->
        <form action="../menupublico.php" method="POST">
          <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />
       </form> 
      <a href="#" class="navbar-brand"><h3>Actividades 4° Agro </h3></a>
        <form action= "../destruir.php" method="POST"  class="form-inline">
           <button class="btn btn-outline-danger sm" type="submit">salir</button>
      </form>
      </nav>
    </div>
 </header>

 <body>
  <hr>      
  <div class="container">
   	 	<div class="row">
   	 		 <div class="col-md-5">      
           <div class="list-group" >          
              <button type="button" class="list-group-item list-group-item-secondary ">Mensajes del Docente: </button>
          </div> 
              <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
              <div id="resultados"></div>             
        			
			   </div>

			   <div class="col-md-7">
          <div class="p-3 mb-4 bg-light text-dark border border-secondary">
                <div class="list-group" >          
                 <button type="button" class="list-group-item list-group-item-success ">Descargar Actividades </button>
                </div>               
                <input type="text" id="direccion" value="../actividades/contenidos/nticx" hidden></input>               
              
               
                    <div id="resultado_archivos" >  </div>
                </div>
			      </div>
			   </div>
         <hr>
			<footer>
        <small>&copy; Copyright 2020, GDJuarez</small>
			</footer>
  	 </div>	
	
  </div> 
   </body>
</html>
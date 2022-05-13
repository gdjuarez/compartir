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
    <script src="ajax_archivos.js"></script> 
	  
   
  </head>
 
   <header>
   <div class="container container-sm">

<div class="banner  rounded" style="background-color: #FF5733 ;">
    <div class="row">
        <div class="col-lg-2">
          
        </div>
        <div class="col-lg-8">
            <h1 class="text-white text-center">E.E.S n°1</h1>
        </div>
        <div class="col-lg-2">
           
        </div>
    </div>
    <nav class="navbar navbar-light bg-white border rounded">
        <!-- Navbar content -->
        <img src="../img/escudo1.png" class="rounded " style="width:5%" alt="Responsive image">
        <a class="navbar-brand" href="#"></a>
        <h1>Compartir Archivos</h1>

        <form class="form-inline" action="../index.php" method="post">
            <button class="btn btn-dark btn-sm" type="submit">volver</button>
        </form>
    </nav>

</div>

   
 </header>

 <body>
  
  <div class="container text-center">
   	 	<div class="row">
          <div class="col-md-2"></div>
   	 		
			   <div class="col-md-8">
               <div class="p-3 mb-4 bg-light text-dark border border-secondary">
                <div class="list-group" >          
                 <button type="button" class="list-group-item list-group-item-success ">Descargar Actividades </button>
                </div>               
                <input type="text" id="direccion" value="../archivos" hidden></input>               
              
               
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
<?php

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('America/Argentina/Buenos_Aires');
//NO MUESTRA ERROR al cargar
  error_reporting(error_reporting() & ~E_NOTICE);
	
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!--fontawesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
   
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
                 <button type="button" class="list-group-item list-group-item-success ">Archivos para descargar</button>
                </div>               
                <input type="text" id="direccion" value="../archivos" hidden></input>               
              
               
                    <div id="resultado_archivos" >  </div>
                </div>
			      </div>
			   </div>
             <hr>
               <footer>
            <small>&copy; Copyright 2022,ematp- GDJuarez</small>
               </footer>
  	      </div>	
	
</div> 
   </body>
</html>
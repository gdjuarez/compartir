<?php

 include("contador_visitas_alum.php");

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1

		date_default_timezone_set('America/Argentina/Buenos_Aires');	

  $visita_Alumno="";  

  //echo $visita_Alumno;

  if(isset($_POST['alumno'])){


    if($_POST['alumno'] =="1"){

      $visita_Alumno=contador();

      //echo "Visita: ".$visita_Alumno;

    }else{
       $visita_Alumno=mostrar_contador();
    }
  }else{
     $visita_Alumno=mostrar_contador();
  }


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
       <script>

    

    </script>

  </head>

 <body>

 <header>

    <div class='container'>
      <nav class="navbar navbar-dark bg-dark rounded">
        <!-- Navbar content -->
      <form>  </form>
        <a href="#" class="navbar-brand"><h1>Nticx</h1></a>
          <form action= "destruir.php" method="POST"  class="form-inline">
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">salir</button>
          </form>
      </nav>
  </header>

    <div id="GDJ"></div>  



      

   <div class="container bg-disable">

   	  <hr>

   	 	<div class="row">

   	 		 <div class="col-md-4">   

   	 		    <div class="w-90 p-1" style="background-color: #eee;">

              <div>

            <?php 

                $dyn_table= "<table id='TablaVisita'class='table table  rounded'>";

                $dyn_table.="<th>" . "Alumno que visita: N°". $visita_Alumno ."</th>";  

                $dyn_table.="</table>";

                echo $dyn_table;        

                ?>       

            

            </div>

   	 		 	 <a href="frmalumnos_inicio.php" class="list-group-item bg-primary text-light" >Alumnos: Registro de Usuario  <i class="fas fa-address-card"></i></a>

   	 		 	 <a href="#" class="list-group-item bg-disable " ></a>

   	 		 	 <a href="adminalumnos.php" class="list-group-item bg-success text-light " >Alumnos: Identificarse  <i class="fas fa-address-card"></i></a>

   	 		 	 <p></p>(Para enviar Trabajos)</p>

   	 		    </div>

              
   

			  </div>

		

			 <div class="col-md-4">      

		  	

          <table class="table">	 

              <th class="table-secondary">Descargar Actividades</th>

          	 <tr class="table-success"><td><a href="recibir_actividades/frmDescargarAct.php"  class="p-4"  ><i class="p-4 fas fa-caret-square-down"></i>Nticx 4to año Agrotecnica</a></td></tr>         

          </table>  



          <table class="table">	 

              <th class="table-secondary">Videos</th>

          	 <tr class="table-danger"><td><a href="tutorial.php"  class="p-4"  ><i class="p-4 fas fa-caret-square-down"></i>Nticx 4to año Agrotecnica</a></td></tr>         

          </table>  

                      

			</div>	



      <div class="col-md-4">      

		  	

        <table class="table">	 

            <th class="table-secondary">Presentar Actividades</th>

           <tr class="table-primary"><td><a href="adminalumnos.php" class="p-4" ><i class="p-4 fas fa-angle-double-up"></i>Nticx 4to año Agrotecnica</a></td></tr>         

        </table>  

                    

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
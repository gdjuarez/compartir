<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
}else{
	echo 'No te has logeado, inicia sesion.';	
	header("Location: ../index.php"); /* Redirección del navegador */

}

//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Subir Produccion</title>		
		 <meta name="viewport" content="width=device-width, initial-scale=1"> 	
	   	<link rel="stylesheet" href="../css/bootstrap.min.css">   
	    <link rel="stylesheet" href="../css/jquery-ui.css"> 
	    <script src="../Jquery/jquery.js"></script> 
	    <script>
	    	$(document).on("ready",function(){
				//alert ("fuunciona ok");
			
				$('#loading').hide();

				$('#upload').on('click',function(){

			    	$('#loading').show();
				})

		});
	    </script>
	    
	</head>
	<body>
		<header>
	 <div class='container'>	
			<nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->
  		<form action="../menualumnos.php" method="POST">
		    <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />
		 </form> 
	  <a href="#" class="navbar-brand"><h2>Presentar Trabajo</h2></a>
	    <form action= "../destruir.php" method="POST"  class="form-inline">
	       <button class="btn btn-outline-danger sm" type="submit">usuario: <?php echo $_SESSION['user']."<br>".$_SESSION['username']?> <br>cerrar-sesion</button>
  	</form>

	</nav>
  
	</header>
			 <div class="container">
				   	<div class="row align-items-center p-4">
				        <div class="col-md-3">	
				        	<div class="p-3 mb-3 bg-light text-dark border border-secondary">
								<p class="text-danger">Ayuda?: </p>
								<p class="text-primary">Como subir mi archivo</p>
								<p>1) Aprete Boton Seleccionar archivo</p>
								<p>2) Seleccione el archivo </p>
								<p>3) Agregue su nombre </p>
								<p>3) Aprete boton Subir archivo</p>
							</div>
				        </div>		

						<div class="col-md-6">	
							
							<div class="p-3 mb-4 bg-light text-dark border border-secondary">
							<div class="list-group" >		   		 
					 			<button type="button" class="list-group-item list-group-item-info">Subir Archivo</button>
					         </div>
					         <form action="file.php" method="post" enctype="multipart/form-data" >								 							
								<input type="text" value="nticx"name="carpeta" id="carpeta" hidden></input>
								<input type="file" name="archivo" id="archivo"class="p-2 mb-3" class="list-group-item" required></input>
								<input type="text" value=" <?php echo $_SESSION['username']?>" name="nombre_nuevo"  placeholder="agrego nombre" class="p-2 mb-3 list-group-item" required></input>
								<input type="submit" value="Subir Produccion" class="p-2 mb-3" id="upload"></input>
								<div class="w-50 p-1">
	        							<img src="../img/loading.gif" id="loading" class="img-thumbnail" alt="Responsive image">
	        					</div>
							</form>
							</div>
							<br>
							<div class="p-3 mb-4 bg-light text-dark border border-secondary">
							<div class="list-group" >		   		 
					 			<button type="button" class="list-group-item list-group-item-success ">Ver trabajos presentados</button>
					         </div>
							 <form action="" method="post" class="p-2 mb-4">															
								<input type="text" value="nticx" id="carpeta" name="carpeta" hidden></input>
								<input type="submit" value="Ver producciones presentadas" class="p-2 mb-4"></input>
							</form>
					
						
                        <?php

                         $carpeta=$_POST['carpeta'];
                        
                         if($_POST['carpeta']!='nticx'){
                         				//no muestra contenido                         	    
                         	}else{
					
						  $direccion= "../producciones/contenidos/nticx/";
                      
		                        if ($handler = opendir($direccion)) {
		                        	echo "Subido a la asignatura: nticx";
		                            echo "<table id='Tablalista' class='table table-striped'>";
		                            while (false !== ($file = readdir($handler))) {
		                                if($file!="." && $file!=".." && $file!="repositorio"){
											echo "<tr><td>".$file."<td>";
		                                }
		                                   // echo "es un punto .";
		                            }
		                           echo "</tr></table>";  
		                            closedir($handler);
                        		}	
                        	}
                        ?>

						</div>	

 			
					</div>
					

			<div class="col-md-3">	</div>	
	</body>
</html>
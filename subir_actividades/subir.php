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

$carpeta='';
$carpetarepo='';


if(empty($_POST['carpeta'])){

   $carpeta="Seleccione Asignatura";
  }else{
    $carpeta=$_POST['carpeta'];
  }

  function listar_archivos($carpeta){
	$cantidad=0;
  if(is_dir($carpeta)){
	  if($dir = opendir($carpeta)){
		  while(($archivo = readdir($dir)) !== false){
			  if($archivo != '.' && $archivo != '..' && $archivo != 'repositorio' ){
				   $cantidad=$cantidad+1;
				   $dyn_table= "<table id='TablaError'class='table table-striped'>";
				   $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpeta.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>";
				   $dyn_table.="<td><a title='Enviar a Repositorio' class='btn btn-outline-success' href='repositar.php?repositar1=".$carpeta."&repositar2=".$archivo."'><i class='fas fa-archive'></i></a></td>";                 
				   $dyn_table.="<td><a title='Eliminar' class='btn btn-outline-danger' href='borrar2.php?eliminar=".$carpeta.'/'.$archivo."'><i class='far fa-trash-alt'></i></a></td>";
				   $dyn_table.="</tr></table>";                     
				   echo $dyn_table;                    
			  }
		  }
		  echo "Cantidad de Archivos: ".$cantidad;
		  closedir($dir);
	  }
  }
}

if(empty($_POST['carpetarepo'])){

	$carpetarepo="Seleccione Asignatura";
   }else{
	 $carpetarepo=$_POST['carpetarepo'];
   }

function listar_repositorio($carpetarepo){
	$cantidad=0;
  if(is_dir($carpetarepo)){
	  if($dir = opendir($carpetarepo)){

		
		  while(($archivo = readdir($dir)) !== false){
			  if($archivo != '.' && $archivo != '..' ){
				   $cantidad=$cantidad+1;
				   $dyn_table= "<table id='TablaError'class='table table-striped'>";
				   $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpetarepo.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>";                  
				   $dyn_table.="<td><a class='btn btn-outline-danger' href='borrar2.php?eliminar=".$carpetarepo.'/'.$archivo."'><i class='far fa-trash-alt'></i></a></td>";
				   $dyn_table.="</tr></table>";                     
				   echo $dyn_table;                    
			  }
		  }
		  echo "Cantidad de Archivos: ".$cantidad;
		  closedir($dir);
	  }
  }
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Subir </title>		
		 <meta name="viewport" content="width=device-width, initial-scale=1"> 	
	   	<link rel="stylesheet" href="../css/bootstrap.min.css">   
	    <link rel="stylesheet" href="../css/jquery-ui.css"> 

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
			<nav class="navbar navbar-dark bg-dark rounded">
  <!-- Navbar content -->
  		<form action="../menu.php" method="POST">
		    <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />
		 </form> 
	  <a href="#" class="navbar-brand"><h3>Subir Actividades </h3></a>
	    <form action= "../destruir.php" method="POST"  class="form-inline">
	       <button class="btn btn-outline-danger sm" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
  	</form>

	</nav>
  
	</header>
			 <div class="container">
				   	<div class="row align-items-center p-4">
				        <div class="col-md-3">	
				        	<div class="p-2 mb-2 bg-light text-dark border border-secondary rounded">
								<p class="text-danger">Ayuda?: </p>
								<p class="text-primary">Como subir mi archivo</p>
								<p> En "Subir Actividades"</p>
								<p>1) Seleccione la Asignatura </p>
								<p>2) Aprete Boton Seleccionar archivo</p>
								<p>3) Aprete boton Subir</p>
							</div>
				        </div>		

						<div class="col-md-8">	
							
							<div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">
							<div class="list-group" >		   		 
					 			<button type="button" class="list-group-item list-group-item-info">Subir Actividades</button>
					         </div>
					         <form action="file.php" method="post" enctype="multipart/form-data" >								
								<input type="text" value="nticx" id="asignatura" name="asignatura" hidden></input>
								<input type="file" name="archivo" id="archivo"class="p-2 mb-4"></input>
								<input type="submit" value="Subir" class="p-2 mb-4"  id="upload"></input>
								<div class="w-50 p-1">
	        							<img src="../img/loading.gif" id="loading" class="img-thumbnail" alt="Responsive image">
	        					</div>
							</form>
							</div>

							
							<div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">
							<div class="list-group" >		   		 
					 			<button type="button" class="list-group-item list-group-item-success ">Ver</button>
					         </div>
							 <form action="" method="post" class="p-2 mb-4">								
								<input type="text" value="nticx" id="carpeta" name="carpeta" hidden></input>
								<input type="submit" value="Ver contenido " class="p-2 mb-4"></input>
							</form>
									
						
                        <?php
								// listado de archivos 
                         //$carpeta=$_POST['carpeta'];

						 if(isset($_POST['carpeta'])){
						 
                        
								if($_POST['carpeta']!='nticx'){
												//no muestra contenido
												// echo $carpeta;
									}else{
							
										$direccion= "../actividades/contenidos/nticx/";  
															
										echo "Archivos de: ".$carpeta;         
										echo listar_archivos($direccion);
                        	}

						}
                        ?>

						</div>	
						<div class="p-1 mb-1 bg-light text-dark border border-secondary rounded">
						<div class="list-group" >		   		 
					 			<button type="button" class="list-group-item list-group-item-warning ">Repositorio</button>
					         </div>
						<form action="" method="post" class="p-2 mb-4">								
								<input type="text" value="nticx" id="carpetarepo" name="carpetarepo" hidden></input>
								<input type="submit" value="Ver Repositorio " class="p-2 mb-4"></input>
							</form>

							<?php
								// listado de REPOSITORIO
                        // $carpeta=$_POST['carpetarepo'];
                        
						 if(isset($_POST['carpeta'])){
                         if($_POST['carpetarepo']!='nticx'){
                         				//no muestra contenido
                         	}else{
					
								$direccion= "../actividades/contenidos/nticx/repositorio";  
													
								//echo "Archivos de: ".$carpetarepo;         
								echo listar_repositorio($direccion);
                        	}
						}
                        ?>
						</div>
					</div>
					

			<div class="col-md-1">	</div>	
	</body>
</html>
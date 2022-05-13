<?php
/*
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
}else{
	echo 'No te has logeado, inicia sesion.';	
	header("Location: ../index.php"); 

}
*/

	//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

$carpeta='archivos';

  function listar_archivos($carpeta){
	$cantidad=0;
  if(is_dir($carpeta)){
	  if($dir = opendir($carpeta)){
		  while(($archivo = readdir($dir)) !== false){
			  if($archivo != '.' && $archivo != '..' ){
				   $cantidad=$cantidad+1;
				   $dyn_table= "<table id='TablaError'class='table table-striped'>";
				   $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpeta.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>";
				    $dyn_table.="<td><a title='Eliminar' class='btn btn-outline-danger' href='borrar.php?eliminar=".$carpeta.'/'.$archivo."'><i class='far fa-trash-alt'></i></a></td>";
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


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!--fontawesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>subir</title>
    <!-- jquery-->
    <script src="../Jquery/jquery.js"></script>
    <link rel="stylesheet" href="stylefondo.css">
    
    <script>
    $(document).on("ready", function() {
        //alert ("fuunciona ok");

        $('#loading').hide();

        $('#upload').on('click', function() {

            $('#loading').show();
        })

    });
    </script>

</head>

<body>

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
        </div>
        <div class="banner  rounded bg-light">
            <div class="row">
                <div class="col-lg-2">
                    <img src="../img/escudo1.png" class="rounded " style="width:30%" alt="Responsive image">
                </div>
                <div class="col-lg-8">
                    <h1 class="text-center">Compartir Archivos</h1>
                </div>
                <div class="col-lg-2">
				<form class="form-inline" action="../index.php" method="post">
					<button class="btn btn-dark btn-sm" type="submit">volver</button>
				</form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center p-4">
            <div class="col-md-3">

            </div>

            <div class="col-md-8">

                <div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-info">Subir Archivo</button>
                    </div>
                    <form action="file.php" method="post" enctype="multipart/form-data">
                         <input type="file" name="archivo" id="archivo" class="p-2 mb-4"></input>
                        <input type="submit" value="Subir" class="p-2 mb-4" id="upload"></input>
                        <div class="w-50 p-1">
                            <img src="../img/loading.gif" id="loading" class="img-thumbnail" alt="Responsive image">
                        </div>
                    </form>
                </div>


                <div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-success ">Ver</button>
                    </div>
                    <form action="" method="post" class="p-2 mb-4">
                       <input type="submit" value="Ver contenido " class="p-2 mb-4"></input>
                    </form>


                    <?php						 
                        $direccion= "../archivos/";  
															
                        echo "Archivos de: ".$carpeta;         
                        echo listar_archivos($direccion);
                        
                        ?>

                </div>
                <hr>
               <footer>
                     <small>&copy; Copyright 2022,ematp- GDJuarez</small>
               </footer>
            </div>


            <div class="col-md-1"> </div>
</body>

</html>
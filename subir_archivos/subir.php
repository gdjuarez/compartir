<?php
/*
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
}else{
	echo 'No te has logeado, inicia sesion.';	
	header("Location: ../index.php"); 

}*/

	//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

$carpeta='archivos';

  function listar_archivos($carpeta){
	$cantidad=0;
  if(is_dir($carpeta)){
	  if($dir = opendir($carpeta)){
		  while(($archivo = readdir($dir)) !== false){
			  if($archivo != '.' && $archivo != '..' && $archivo != 'repositorio' ){
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
                        <input type="text" value="nticx" id="asignatura" name="asignatura" hidden></input>
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
							
										$direccion= "../archivos";  
															
										echo "Archivos de: ".$carpeta;         
										echo listar_archivos($direccion);
                        	}

						}
                        ?>

                </div>
            </div>


            <div class="col-md-1"> </div>
</body>

</html>
<?php

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1

		date_default_timezone_set('America/Argentina/Buenos_Aires');

//NO MUESTRA ERROR al cargar

  error_reporting(error_reporting() & ~E_NOTICE);



  include("listar_archivos.php");

  

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



    <script src="../Jquery/jquery-2.1.3.min.js"> </script>

    <script src="../Jquery/jquery.color.animation.js"></script>



</head>



<header>

    <div class='container'>

        <nav class="navbar navbar-dark bg-dark rounded">

            <!-- Navbar content -->

            <form action="../menu.php" method="POST">

                <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />

            </form>

            <a href="#" class="navbar-brand">
                <h2>Recibir Producciones</h2>
            </a>

            <form action="../destruir.php" method="POST" class="form-inline">

                <button class="btn btn-outline-danger sm" type="submit">salir</button>

            </form>

        </nav>

    </div>

</header>



<body>





    <div class="container">

        <hr>

        <div class="row">

            <div class="col">

            </div>



            <div class="col-md-12">



                <div class="p-3 mb-4 bg-light text-dark border border-secondary rounded">

                    <div class="list-group">

                        <button type="button" class="list-group-item list-group-item-success ">Recibir Producciones
                        </button>

                    </div>

                    <form action="" method="post" class="p-2 mb-4">

                        <input type="text" id="carpeta" name="carpeta" value="nticx" hidden></input>

                        <input type="submit" value="Ver produciones presentadas" class="p-2 mb-4"></input>

                    </form>





                    <?php 

         if(isset($_POST['carpeta'])){

          $carpeta=$_POST['carpeta'];

                        

          if(empty($_POST['carpeta'])){

                  //no muestra contenido

          }else{

       

           $direccion= "../producciones/contenidos/nticx/";

           echo "Archivos de: ".$carpeta;         

           echo listar_archivos($direccion);



          }




         }



        
         

        ?>

                </div>



                <div class="p-1 mb-1 bg-light text-dark border border-secondary rounded">

                    <div class="list-group">

                        <button type="button" class="list-group-item list-group-item-warning ">Repositorio</button>

                    </div>

                    <form action="" method="post" class="p-2 mb-4">

                        <input type="text" id="carpetarepo" name="carpetarepo" value="nticx" hidden></input>

                        <input type="submit" value="Ver Repositorio" class="p-2 mb-4"></input>

                    </form>

                    <?php

								// listado de REPOSITORIO

                     // $carpeta=$_POST['carpetarepo'];

                        
                if(isset($_POST['carpetarepo'])){

                    if($_POST['carpetarepo']!='nticx'){

                                    //no muestra contenido

                    }else{              

                        $direccion= "../producciones/contenidos/nticx/repositorio";                                   

                        echo "Archivos de: nticx";         

                        echo listar_repositorio($direccion);

                    }
                }

              ?>



                </div>

            </div>



            <div class="col-"> </div>



        </div>

        <hr>

        <footer>

            <small>&copy; Copyright 2020, GDJuarez</small>

        </footer>

    </div>



</body>





</html>
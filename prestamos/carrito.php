<?php

session_start();

if($_SESSION['logged'] == 'yes' AND $_SESSION['roll'] <= '2')
{
	//echo 'Usuario: '.$_SESSION['user'];	
	 //echo "Usuario: ". $_SESSION['user']."</div>";
}else{
	
    echo '<script language=javascript>
      self.location = "../index.php."</script>';
}


// Include database connection
include("../conexion/conexion.php");

$hoy = date("Y/m/d");   
$apellido='';
$curso='';
$ape='';
$cur='';
$disp_prestados=0;


$sql = mysqli_query($miConexion,"SELECT id, dispositivo, n_serial, numero,estado,Apellido,Curso 
FROM  dispositivo where dispositivo ='Netbook'");

$sql_otros = mysqli_query($miConexion,"SELECT id, dispositivo, n_serial, numero,estado,Apellido,Curso 
FROM  dispositivo where dispositivo <>'Netbook'");



 ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--fontawesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>Menu</title>
    <!-- jquery-->
    <script src="../lib/jquery.js"></script>
    <!-- js personalizado -->
    <script src="scriptPmo.js"></script>
    <!-- css personalizado-->
    <link rel="../stylesheet" href="stylefondo.css">
</head>

<header>
    <div class="container">
        <div class="banner  rounded" style="background-color: #FF5733 ;">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    <h1 class="text-white text-center">Carrito</h1>
                </div>
                <div class="col-lg-2">
               <p>usuario:  <?php echo $_SESSION['user'];?></p>
                </div>
            </div>
            <nav class="navbar navbar-light bg-white border rounded">
                <!-- Navbar content -->
                <img src="../img/escudo1.png" class="rounded " style="width:5%" alt="Responsive image">
                <a class="navbar-brand" href="#"></a>
               
                <form class="form-inline" action="menu.php" method="post">
                    <button class="btn btn-dark btn-sm" type="submit"><small>volver</small></button>
                </form>
                <form class="form-inline" action="../destruir.php" method="post">
                    <button class="btn btn-outline-danger " type="submit"><small>cerrar sesion</small></button>
                </form>

            </nav>

        </div>
    </div>

</header>

<body>
    <div class='container bg-light border rounded '>
        <div class="row ">
            <div class="col-md-2">
               
            </div>
            <div class="col-md-8">

                       
                    <table class="table table-sm table-bordered text-center table-responsive" id="tablacarrito">
                        <h1>Netbooks</h1>

                        <?php if ($sql!='') {

                            $filas=1;
 
                            while($row = mysqli_fetch_assoc($sql)) {                                

                                if($filas==1 ){
                                   ?> <tr> <?php
                                }
                                
                                $estado=$row['estado'];

                                    if($estado == "disponible"){
                                        $boton_color= "class='btn btn-sm btn-success'";
                                    }else{
                                        $boton_color="class='btn btn-sm btn-danger' ";
                                        $disp_prestados +=1;
                                    }
                                
                             ?>
                            <td><input type='submit' id='estado' <?php echo $boton_color ?>
                                    value='<?php echo $row['numero'] ?>' /></td>
                          
                         
                                <?php  //cierro llaves del while

                                    if($filas == 15 or $filas== 29){
                                        ?> </tr> <?php                                      
                                    }

                                    $filas+=1;
                                    //echo $filas;

                            }
                        }
                        //cierro conex
                        mysqli_close($miConexion);
                        ?>
                     </table>

                     <table class="table table-sm table-hover text-center table-responsive" id="tablaPmo">

                        <tr class="sticky-top  text-center alert alert-secondary role='alert'>">
                            <th hidden>Codigo</th>
                            <th>Dispositivo</th>
                            <th hidden>Serial</th>
                            <th>Numero</th>
                            <th>Estado</th>
                            <th>Apellido</th>
                            <th>Curso</th>
                        
                        </tr>

                            <?php if ($sql!='') {

                                while($row = mysqli_fetch_assoc($sql_otros)) { ?>
                                        <tr>
                                            <td hidden><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['dispositivo']; ?></td>
                                            <td hidden><?php echo $row['n_serial']; ?></td>
                                            <td><?php echo $row['numero']; ?></td>
                                            <?php 
                                                    $estado=$row['estado'];
                                                    $apellido=$row['Apellido'];
                                                    $curso=$row['Curso'];                            
                                            
                                            ?>

                                            <?php

                                        if($estado == "disponible"){
                                            $boton_color= "class='btn btn-sm btn-success'";
                                        }else{
                                            $boton_color="class='btn btn-sm btn-danger' ";
                                            $disp_prestados +=1;
                                        }
                                    
                                ?>
                                <td><input type='submit' id='estado' <?php echo $boton_color ?>
                                        value='<?php echo $row['estado']?>' /></td>
                                <td><?php echo $apellido ?></td>
                                <td><?php echo $curso?></td>
                            
                            <?php  //cierro llaves del while
                                }
                            }

                            ?>
                            </table>

                        <?php if($disp_prestados==0){


                          echo " <div class='alert alert-success'>
                            <strong>Dispositivos Prestados: $disp_prestados </strong>  
                            </div>";

                        }else{

                            echo " <div class='alert alert-danger'>
                            <strong>Dispositivos Prestados:  $disp_prestados  </strong>  
                            </div>";
                            
                        } ?>
               

               

            </div>

        </div>
        <hr>

<footer>
    <small>&copy; Copyright 2022, GDJuarez</small>
</footer>

    </div>
    

   
    </div>
  
    </div>
    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!--   sweet alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    
</body>

</html>
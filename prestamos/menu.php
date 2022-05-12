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


$sql = mysqli_query($miConexion,"SELECT id, dispositivo, n_serial, numero,estado,Apellido,Curso FROM  dispositivo");

// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);


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
    <link rel="stylesheet" href="../stylefondo.css">
</head>

<header>
    <div class="container">
        <div class="banner  rounded" style="background-color: #FF5733 ;">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    <h1 class="text-white text-center">Estado de prestamos</h1>
                </div>
                <div class="col-lg-2">
               <p>usuario:  <?php echo $_SESSION['user'];?></p>
                </div>
            </div>
            <nav class="navbar navbar-light bg-white border rounded">
                <!-- Navbar content -->
                <img src="../img/escudo1.png" class="rounded " style="width:5%" alt="Responsive image">
                <a class="navbar-brand" href="#"></a>
                <form class="form-inline " action="carrito.php" method="post">
                    <button class="btn btn-info btn-sm " type="submit"><small>carrito</small></button>
                </form>
                <form class="form-inline " action="../reservas/reservas.php" method="post">
                    <button class="btn btn-dark btn-sm " type="submit"><small>Reservar</small></button>
                </form>
                <form class="form-inline " action="../dispositivos/dispositivos.php" method="post">
                    <button class="btn btn-outline-primary btn-sm " type="submit"><small>Dispositivos</small></button>
                </form>
                <form class="form-inline" action="gridPmo.php" method="post">
                    <button class="btn btn-outline-primary btn-sm " type="submit"><small>Listado de
                            prestamos</small></button>
                </form>
                <form class="form-inline" action="../usuarios/registroUsuarios.php" method="post">
                    <button class="btn btn-outline-primary btn-sm" type="submit"><small>Usuarios</small></button>
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
            <div class="col-md-3">
               
            </div>
            <div class="col-md-6">
                    <table class="table table-responsive text-center" id="tablaBtn">
                            <tr>
                        
                            <th>   <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalP"
                            id="prestar" > PRESTAR </button></th>
                            <th>   <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalR"
                            id="recibir" > RECIBIR </button></th>
                            </tr>
                           
                    </table>

               
                    <table class="table table-sm table-responsive table-hover text-center" id="tablaPmo">

                        <tr class="Barra text-center >">
                            <th hidden>Codigo</th>
                            <th>Dispo</th>
                            <th hidden>Serial</th>
                            <th>#</th>
                            <th>Estado</th>
                            <th>Apellido</th>
                            <th>Curso</th>
                            <th>check</th>
                         
                        </tr>

                        <?php if ($sql!='') {

                            while($row = mysqli_fetch_assoc($sql)) { ?>
                                    <tr>
                                        <td hidden><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['dispositivo']; ?></td>
                                        <td hidden><?php echo $row['n_serial']; ?></td>
                                        <td><?php echo $row['numero']; ?></td>
                                        <?php  $estado=$row['estado'];
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
                            <td>
                                <div class="form-check">
                                  
                                        <input type="checkbox" id='check' class="case form-check-input" value="0">
                                    
                                </div>
                            </td>

                            <td></td>
                            <td></td>
                        <?php  //cierro llaves del while
                            }
                        }
                        //cierro conex
                        mysqli_close($miConexion);
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

            <div class="col-md-3"> 
                
                
                    <!-- ************************* M O D A L ***************************     -->
                    <!-- Trigger the modal with a button 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                    id="prestar" title="Ingresar"> retirar/devolver </button>  -->

                    <!-- Modal -->
                    <div class="modal fade" id="myModalP" role="dialog">
                        <div class="modal-dialog modal-sm">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Prestar de dispositivo</h5>
                                </div>

                                <div class="modal-body">
                                    <form action="#menu.php" method="post">

                                        <!-- dispositivo n_serianumero estado Apellido Curso -->
                                      
                                        <div class="form-group">
                                            <label id='labelape'>Apellido:</label>
                                            <input type="text" class="form-control" name="ape" id="ape"
                                                value="<?php echo $ape ?>" maxlength="20">
                                        </div>
                                        <div class="form-group">
                                            <label id='labelcur'>curso:</label>
                                            <input type="text" class="form-control" name="cur" id="cur"
                                                value="<?php echo $cur ?>" maxlength="20">
                                                <input type="text" class="form-control" name="usuario" id="usuario"
                                                value="<?php echo  $_SESSION['user'];?>" hidden>
                                        </div>

                                        <button type="submit" id=prestando class="btn btn-info btn-block btn-round">registrar</button>
                                    </form>
                                    <!-- <button type="button" class="close" id="cerrarA" data-dismiss="modal">&times;</button> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ********************************************************************************     -->
                    
                    <!-- ************************* M O D A L ***************************     -->
                    <!-- Trigger the modal with a button 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                    id="prestar" title="Ingresar"> retirar/devolver </button>  -->

                    <!-- Modal -->
                    <div class="modal fade" id="myModalR" role="dialog">
                        <div class="modal-dialog modal-sm">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Recibir Dispositivo</h5>
                                </div>

                                <div class="modal-body">
                                    <form action="#menu.php" method="post">

                                        <!-- dispositivo n_serianumero estado Apellido Curso -->
                                      
                                        <div class="form-group" hidden>
                                            <label id='labelape'>Apellido:</label>
                                            <input type="text" class="form-control" name="ape" id="ape"
                                                value="<?php echo $ape ?>" maxlength="20">
                                        </div>
                                        <div class="form-group"hidden>
                                            <label id='labelcur'>curso:</label>
                                            <input type="text" class="form-control" name="cur" id="cur"
                                                value="<?php echo $cur ?>" maxlength="20">
                                                <input type="text" class="form-control" name="usuario" id="usuario"
                                                value="<?php echo  $_SESSION['user'];?>" hidden>
                                        </div>

                                        <button type="submit" id=recibiendo class="btn btn-info btn-block btn-round">confirmar</button>
                                    </form>
                                    <!-- <button type="button" class="close" id="cerrarA" data-dismiss="modal">&times;</button> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ********************************************************************************     -->
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
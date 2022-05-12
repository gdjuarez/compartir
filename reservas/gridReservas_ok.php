<?php
session_start();

if($_SESSION['logged'] == 'yes' AND $_SESSION['roll'] <= '4')
{
	//echo 'Usuario: '.$_SESSION['user'];	
	 //echo "Usuario: ". $_SESSION['user']."</div>";
}else{
	
    echo '<script language=javascript>
    alert("No te has logeado, inicia sesion")
    self.location = "../index.php."</script>';
}

// Include database connection
include("../conexion/conexion.php");


if(isset( $_POST['fecha'])){

    $hoy = $_POST['fecha'];

    $consulta="SELECT id, dispositivo_id, Dispositivo, date_format(fecha,'%d/%m/%Y') as Fecha,
 Turno,Hora, Curso, Profesor, usuario FROM reserva where Fecha = '$hoy' order by Fecha,Turno,Hora ";
    
}else{
    $hoy = date("d/m/Y");  
    
    $consulta="SELECT id, dispositivo_id, Dispositivo, date_format(fecha,'%d/%m/%Y') as Fecha,
 Turno,Hora, Curso, Profesor, usuario FROM reserva where Fecha >= '$hoy' order by Fecha  ";
}



 //$consulta="SELECT id, dispositivo_id, Dispositivo, date_format(fecha,'%d/%m/%Y') as Fecha,
 //Turno, Curso, Profesor, usuario FROM reserva where Fecha >= '$hoy' order by Fecha,Turno ";

// consulta a la tabla curso
$sql = mysqli_query($miConexion,$consulta);


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

    <title>Reservas</title>
    <!-- jquery-->
    <script src="lib/jquery.js"></script>
   
    <!-- css personalizado-->
    <link rel="stylesheet" href="stylefondo.css">
</head>

<header>
    <div class="container">
        <div class="banner  rounded" style="background-color: #FF5733 ;">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    <h1 class="text-white text-center">Listado de Reservas</h1>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <nav class="navbar navbar-light bg-white border rounded">
                <!-- Navbar content -->
                <img src="../img/escudo1.png" class="rounded " style="width:5%" alt="Responsive image">
                <a class="navbar-brand" href="#"></a>
                <form class="form-inline my-2 my-lg-0" action="gridReservas.php" method="post">
                         <input type="date" id='fecha' class="form-control form-control-sm text-center"  name="fecha" value=""required>
                         <button class="btn btn-primary " type="submit"><small>Ver fecha</small></button>
                </form>
                <form class="form-inline my-2 my-lg-0" action="reservas.php" method="post">
                    <button class="btn btn-dark " type="submit"><small>volver</small></button>
                </form>
              
            </nav>

        </div>
       
    </div>

</header>

<body>
    <div class='container bg-light border rounded '>
        <div class="row ">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div id="chequeo">

                    <table class="table table-sm table-hover text-center" id="tablaPmo">

                        <tr class="sticky-top rounded bg-secondary text-center">
                            <th>codigo</th>
                            <th>Dispositivo</th>
                            <th>Fecha</th>
                            <th>Turno</th>
                            <th>Hora</th>
                            <th>Curso</th>
                            <th>Profesor</th>
                            <th>Usuario</th>
                        </tr>

                        <?php if ($sql!='') {

                while($row = mysqli_fetch_assoc($sql)) {
                    
                        $id = $row['id'];       
                       $turno= $row['Turno']; 

                       if($turno=="1") {
                         $turno="Mañana";
                       }
                       if($turno=="2") {
                         $turno="Tarde";
                        }
                       if($turno=="3") {
                         $turno="Vespertino";
                        }

                    
                    ?>
                        <tr>
                            <td><?php echo $row['dispositivo_id']; ?></td>
                            <td><?php echo $row['Dispositivo']; ?></td>
                            <td><?php echo $row['Fecha']; ?></td> 
                            <td><?php echo $turno?></td> 
                            <td><?php echo $row['Hora']; ?></td> 
                            <td><?php echo $row['Curso']; ?></td> 
                            <td><?php echo $row['Profesor']; ?></td>  
                            <td><?php echo $row['usuario']; ?></td>   
                            
                           
                </div>
                </tr>

                <?php
                     }
                 }
                 //cierro conex
                 mysqli_close($miConexion);
                ?>
                </table>

               

                <div class="row align-items-right p-4">
            <div class="col-md-2"> 
          
            <td>      
            </div>           
          
        </div>

            </div>
        </div>

    </div>
    <div class="col-md-1">  

    </div>
    <hr>

    <footer>
        <small>&copy; Copyright 2022, GDJuarez</small>
    </footer>
    </div>
    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
//NO MUESTRA ERROR al cargar
  error_reporting(error_reporting() & ~E_NOTICE);

  $direccion= "../archivos/";
  //echo $direccion;
  
if ($_FILES['archivo']["error"] > 0)
  {

    $dyn_table= "<table id='TablaError'class='table table-striped bg-danger'>";
    $dyn_table.="<th>" . "Error: " . $_FILES['archivo']['error'] . "</th>"; 
    $dyn_table.="</table>";

  }
else
  {

    $dyn_table= "<table id='TablaOk'class='table table-striped'>";
    $dyn_table.="<tr><td>" . "Nombre: ". $_FILES['archivo']['name']."</td></tr>";    
    $dyn_table.="<tr><td>" . "Tipo: " .$_FILES['archivo']['type']."</td></tr>";  
    $dyn_table.="<tr><td>" . "Tamaño: " .($_FILES["archivo"]["size"] / 1024)."</td></tr>";     
    $dyn_table.="<th>"."se envio correctamente"."</th>"; 
    $dyn_table.="</table>";

    }

  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
  
  move_uploaded_file($_FILES['archivo']['tmp_name'],
  $direccion. $_FILES['archivo']['name']);


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
    <script src="../Jquery/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="stylefondo.css">
    

</head>
  <body>
        <div class="container">
            <div class="row align-items-center p-4">
                <div class="col-md-2">  </div>    

            <div class="col-md-8">  
              <?php echo  $dyn_table; ?>
            
              <form action="subir.php" method="post" >
             
                <input type="submit" value="volver"></input>
              </form>
            </div>

      <div class="col-md-2">  </div>  
  </body>
</html>
<?php
 error_reporting(error_reporting() & ~E_NOTICE);

  $carpeta=$_POST['asignatura'];

  $direccion= "../actividades/contenidos2b/".$carpeta."/";
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
    $dyn_table.="<th>"."Subido a la asignatura: ".$carpeta."</th>"; 
    $dyn_table.="<tr><td>" . "Nombre: ". $_FILES['archivo']['name']."</td></tr>";    
    $dyn_table.="<tr><td>" . "Tipo: " .$_FILES['archivo']['type']."</td></tr>";  
    $dyn_table.="<tr><td>" . "Tamaño: " .($_FILES["archivo"]["size"] / 1024)."</td></tr>";     
    $dyn_table.="<th>"."se envio correctamente"."</th>"; 
    $dyn_table.="</table>";

    }

  move_uploaded_file($_FILES['archivo']['tmp_name'],
  $direccion. $_FILES['archivo']['name']);


 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EES1</title>   
     <meta name="viewport" content="width=device-width, initial-scale=1">   
      <link rel="stylesheet" href="../css/bootstrap.min.css">   
      <link rel="stylesheet" href="../css/jquery-ui.css">      
      
  </head>
  <body>
        <div class="container">
            <div class="row align-items-center p-4">
                <div class="col-md-2">  </div>    

            <div class="col-md-8">
             <?php echo  $dyn_table; ?>  
              <form action="subir2b.php" method="post" >
             
                <input type="submit" value="volver"></input>
              </form>
            </div>

      <div class="col-md-2">  </div>  
  </body>
</html>
<?php
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);
 
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Argentina/Buenos_Aires');

	
// Imprime algo como: 

$hoy = date('d-m-Y');  

  $nombre_nuevo=$_POST['nombre_nuevo'];
 // echo $nombre_nuevo;
 
  //ECHO "Subido a la asignatura: ".$carpeta;
  $direccion= "../producciones/contenidos/nticx/";
  //echo $direccion;

if ($_FILES['archivo']["error"] > 0)
  {

    $dyn_table= "<table id='TablaError'class='table table-striped bg-danger'>";
    $dyn_table.="<th>" . "Error: " . $_FILES['archivo']['error'] . "</th>";  
    $dyn_table.="</table>";

  }
else
  {

    $archivo=$_FILES['archivo']['name'];
    //echo'cambiando el nombre: <br>';
    $archivo_cambiado=$nombre_nuevo.'_'.$hoy.'_'.$archivo;
   //echo 'nuevo nombre: '.$archivo1.'<br>';

    $dyn_table= "<table id='TablaOk'class='table table-striped'>";
    $dyn_table.="<th>"."Subido a la asignatura: nticx"."</th>"; 
    $dyn_table.="<tr><td>" . "Nombre: ". $archivo_cambiado."</td></tr>";    
    $dyn_table.="<th>"."se envio correctamente"."</th>"; 
    $dyn_table.="</table>";     

      /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/ 
  move_uploaded_file($_FILES['archivo']['tmp_name'],$direccion. $archivo_cambiado);

    } 


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
              <form action="subirprod.php" method="post" >             
                <input type="submit" value="volver" class="btn btn-warning"></input>
              </form>
            </div>

      <div class="col-md-2">  </div>  
  </body>
</html>
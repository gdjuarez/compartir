<?php


// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('America/Argentina/Buenos_Aires');
//NO MUESTRA ERROR al cargar
  error_reporting(error_reporting() & ~E_NOTICE);

  $asignatura=$_POST['asignatura'];
  $folder=$_POST['folder'];
    // echo $folder;
   	

  function listar_archivos($carpeta){
    $cantidad=0;
    if(is_dir($carpeta)){
      if($dir = opendir($carpeta)){
        while(($archivo = readdir($dir)) !== false){
          if($archivo != '.' && $archivo != '..' && $archivo != 'repositorio' ){
             $cantidad=$cantidad+1;
             $dyn_table= "<table id='Tablalista' class='table table-striped table-sm'>";
             $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpeta.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>";
            $dyn_table.="</tr></table>";                     
             echo $dyn_table;                    
          }
        }
        echo "Cantidad de Archivos: ".$cantidad;
        closedir($dir);
      }
    }
  }
  // echo listar_archivos('documentos');

  
  echo "Archivos de: ".$asignatura;         
  echo listar_archivos($folder);

?>


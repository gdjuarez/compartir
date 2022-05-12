<?php

//NO MUESTRA ERROR al cargar
  error_reporting(error_reporting() & ~E_NOTICE);
	if(empty($_POST['carpeta'])){

    $carpeta="";
   }else{
     $carpeta=$_POST['carpeta'];
   }

  function listar_archivos($carpeta){
      $cantidad=0;
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != 'repositorio' ){
                     $cantidad=$cantidad+1;
                     $dyn_table= "<table id='TablaError'class='table table-striped'>";
                     $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpeta.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>"; 
                     $dyn_table.="<td><a title='Enviar a Repositorio' class='btn btn-outline-success' href='repositar.php?repositar1=".$carpeta."&repositar2=".$archivo."'><i class='fas fa-archive'></i></a></td>";                   
                     $dyn_table.="<td><a class='btn btn-outline-danger' href='borrar2.php?eliminar=".$carpeta.'/'.$archivo."'><i class='far fa-trash-alt'></i></a></td>";
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

  if(empty($_POST['carpetarepo'])){

    $carpetarepo="";
     }else{
     $carpetarepo=$_POST['carpetarepo'];
     }
  
  function listar_repositorio($carpetarepo){
    $cantidad=0;
    if(is_dir($carpetarepo)){
      if($dir = opendir($carpetarepo)){
  
      
        while(($archivo = readdir($dir)) !== false){
          if($archivo != '.' && $archivo != '..' ){
             $cantidad=$cantidad+1;
             $dyn_table= "<table id='TablaError'class='table table-striped'>";
             $dyn_table.="<tr><td><a class='btn btn-outline-primary' href='".$carpetarepo.'/'.$archivo."'>".$archivo." "."<i class='fas fa-arrow-circle-down'></i></a><td>";                  
             $dyn_table.="<td><a class='btn btn-outline-danger' href='borrar2.php?eliminar=".$carpetarepo.'/'.$archivo."'><i class='far fa-trash-alt'></i></a></td>";
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
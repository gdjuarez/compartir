<?php
session_start();
$profesor='';

$profesor=$_POST['profesor'];

echo $profesor;
//esto es sin bade de datos 
 if($profesor=="aqui la clave") 
 {
	$_SESSION['logged'] = 'yes';

	echo '<script>window.location="subir_archivos/subir.php"</script>';	
		
  }else{
      
	echo '<script language=javascript>
		  alert("La clave, es incorrecta")
		  self.location = "index.php"</script>';										
  }
  
?>

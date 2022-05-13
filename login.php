<?php
session_start();
$profesor='';

$profesor=$_POST['profesor'];

echo $profesor;

 if($profesor=="E4730") 
 {
	$_SESSION['logged'] = 'yes';

	echo '<script>window.location="subir_archivos/subir.php"</script>';	
		
  }else{
      
	echo '<script language=javascript>
		  alert("Usuario y/o clave, son incorrectos")
		  self.location = "index.php"</script>';										
  }
  
?>
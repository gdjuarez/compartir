<?php
session_start();
include("conexion.php");

//Recibir
$user = strip_tags($_POST['user']);
$pass = strip_tags(sha1($_POST['pass']));


$sql='SELECT * FROM usuarios WHERE user="'.mysqli_real_escape_string($miConexion, $user).'" AND pass="'.mysqli_real_escape_string($miConexion, $pass).'" ';
//echo $sql;

$consulta = mysqli_query($miConexion,$sql);


 if($existe = mysqli_fetch_object($consulta)) {

	$_SESSION['logged'] = 'yes';
	$_SESSION['user'] = $user;

	//echo $existe->roll;
	$roll_numero=$existe->roll;
	//nota :  aca veer que roll  es y derivar al menu correcto

	$_SESSION['roll'] = $roll_numero;

	echo $roll_numero;

	
	switch ($roll_numero) {
		
		case 1:
			//	1 Admin
			echo '<script>window.location="../prestamos/menu.php"</script>';
			break;
		case 2:
			//2 EMATP - BIBLIOTECARIO
			echo '<script>window.location="../prestamos/menu.php"</script>';
			break;
		case 4:
			//4 Profesor
			echo '<script>window.location="../reservas/reservas.php"</script>';
			break;
	}
		
		//echo '<script language=javascript>
		// alert("Logeado exitosamente ,Bienvenido!!")</script>';
		//echo '<script>window.location="prestamos/menu.php"</script>';
		
  }else{
      
	echo '<script language=javascript>
		  alert("Usuario y/o clave, son incorrectos")
		  self.location = "../index.php"</script>';										
  }
  
?>
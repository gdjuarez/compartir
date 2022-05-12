<?php 
	require_once('../conexion/conexion.php');
	//sleep(1);
	$search = '';

	if (isset($_POST['search'])){
		$search = strtolower($_POST['search']);
	}

	$resultado = mysqli_query ($miConexion,"SELECT * FROM alumnos WHERE Apellido LIKE '%".$search."%' order by Apellido ASC");

	$total = mysqli_num_rows($resultado);
		
?>

<?php if ($total>0 && $search!='') { 

//Creo la tabla y lleno con la consulta
    	$dyn_table= "<table id='Tabla'class='table table-striped'>";
		$dyn_table.="<td>" . "codigo" ."</td>";  
       	$dyn_table.="<td>" . "Apellido" ."</td>";
		$dyn_table.="<td>" . "nombre ". "</td>";
		$dyn_table.="<td>" . "Dni ". "</td>";
		$dyn_table.="<td>" . "Curso ". "</td>";
		$dyn_table.="<td>" . "Telefono". "</td>";
		
?>

<?php 
	while ($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

		$idc = $fila["id"];
	    $capellido = $fila["Apellido"];
		$cnombre = $fila["Nombre"];
	    $cdni = $fila["dni"];
	    $ccurso = $fila["curso"];
	    $ctelefono = $fila["telefono"];
				
		$dyn_table.="<tr>";
	    $dyn_table.="<td>" . "<input type='submit' name='caja' class='btn btn-outline-info' value='".$idc."'/>"."</td>";
		$dyn_table.="<td>" . $capellido ."</td>";
		$dyn_table.="<td>" . $cnombre ."</td>";
		$dyn_table.="<td>" . $cdni."</td>";
		$dyn_table.="<td>" . $ccurso."</td>";
		$dyn_table.="<td>" . $ctelefono."</td>";
	
}
$dyn_table.="</tr></table>";
?>

<div id="chequeo" align="center" >       
  		<form action="frmalumnos.php" method="POST">
<?php 
echo "<h3>Resultados de la búsqueda:".$total." </h3>"; //total de filas de la tabla
echo $dyn_table; //imprimo la tabla
?> 
	     </form>        
</div>
			
<?php } 
elseif($total>0 && $search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>
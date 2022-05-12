$(document).on("ready",function(){
	
		
	$('#carpeta').on('change',function(){

		//alert(" click!!");
		//***CONSTRUIR los $_post['']*****
		var curso=$('#curso').val();	
		var asignatura=$('#carpeta').val();		
		var direccion=$('#direccion').val();				
		//alert("curso: "+curso+" asignatura: "+asignatura+" direccion: "+direccion);
		var folder=direccion+asignatura;
		//alert(folder);

		if (asignatura =='0'){
			//alert("Seleccione una Asignatura");
			location.reload();

		}else{
			//alert(asignatura);
				
		//--------- ENVIO LOS DATOS  POR $_POST[''] ----A J A X -------
		$.ajax({
			type: 'POST',
			url: 'gridmensajes.php',
			data: {curso: curso, asignatura: asignatura}, //asi paso el array a php
					success: function(data){ 
					$('#resultados').empty();
					$('#resultados').append(data); 
					//console.log(data);
				}
					
		});

		//--------- ENVIO LOS DATOS  POR $_POST[''] ----A J A X -------
		$.ajax({
			type: 'POST',
			url: 'listar_archivos.php',
			data: {folder: folder, asignatura: asignatura}, //asi paso el array a php
					success: function(data){ 
					$('#resultado_archivos').empty();
					$('#resultado_archivos').append(data); 
					//console.log(data);
				}
					
		});
				
		
		}

	});	

		        		        

});

	
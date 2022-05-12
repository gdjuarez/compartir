$(document).on("ready",function(){
	
	//alert(" click!!");
	var folder=$('#direccion').val();
	
		//alert("click!!"+folder);
						
		//--------- ENVIO LOS DATOS  POR $_POST[''] ----A J A X -------
		$.ajax({
			type: 'POST',
			url: 'gridmensajes.php',
			data: {}, //asi paso el array a php
					success: function(data){ 
					$('#resultados').empty();
					$('#resultados').append(data); 
					console.log(data);
				}
					
		});

		//--------- ENVIO LOS DATOS  POR $_POST[''] ----A J A X -------
		$.ajax({
			type: 'POST',
			url: 'listar_archivos.php',
			data: {folder: folder}, //asi paso el array a php
					success: function(data){ 
					$('#resultado_archivos').empty();
					$('#resultado_archivos').append(data); 
					console.log(data);
				}
					
		});	

		        		        

});

	
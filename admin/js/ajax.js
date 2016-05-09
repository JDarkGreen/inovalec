function ver_seccion(dato)
{
	$.ajax({ 
		url: "seccion.php?idmarca="+dato,
		type: "GET",
		success: function(data){	
			$('#seccion').fadeOut("slow",function(){
				$('#seccion').html(data);
			});
			$('#seccion').fadeIn("slow"); 			
		}
	});	

}

function ver_subseccion(dato)
{
	$.ajax({ 
		url: "subseccion.php?idpadre="+dato,
		type: "GET",
		success: function(data){	
			$('#subseccion').fadeOut("slow",function(){
				$('#subseccion').html(data);
			});
			$('#subseccion').fadeIn("slow"); 			
		}
	});	
}

function ver_subseccionEventos(dato)
{
	$.ajax({ 
		url: "subseccion.php?idpadre="+dato,
		type: "GET",
		success: function(data){	
			$('#subseccion').fadeOut("slow",function(){
				$('#subseccion').html(data);
			});
			$('#subseccion').fadeIn("slow"); 			
		}
	});	
}

function niveles(dato)
{
	$.ajax({ 
		url: "niveles.php?nivel="+dato,
		type: "GET",
		success: function(data){	
			$('#niveles').fadeOut("slow",function(){
				$('#niveles').html(data);
			});
			$('#niveles').fadeIn("slow"); 			
		}
	});	
}	

function subniveles(dato)
{
	$.ajax({ 
		url: "subniveles.php?subnivel="+dato,
		type: "GET",
		success: function(data){	
			$('#subniveles').fadeOut("slow",function(){
				$('#subniveles').html(data);
			});
			$('#subniveles').fadeIn("slow"); 			
		}
	});	
}
	


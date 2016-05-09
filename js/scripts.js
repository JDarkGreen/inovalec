function cargar_promocion(url)
{

/*	$(".all").removeClass("activarevento");  // remove active class from all
	$("#idx_"+id).addClass("activarevento");  // remove active class from all	*/

	jQuery('#contenido_evento').fadeTo(200, 0.2, function($){
		jQuery('#contenido_evento').load(url, function($){		
			jQuery('#contenido_evento').fadeTo(600, 1.0, 
				function($) 
				{

				});

		});

	});

}

function cargar_eventos(url)
{

/*	$(".all").removeClass("activarevento");  // remove active class from all
	$("#idx_"+id).addClass("activarevento");  // remove active class from all	*/

	jQuery('#contenido_evento').fadeTo(200, 0.2, function($){
		jQuery('#contenido_evento').load(url, function($){		
			jQuery('#contenido_evento').fadeTo(600, 1.0, 
				function($) 
				{

				});

		});

	});

}
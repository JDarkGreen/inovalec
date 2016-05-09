
var j = jQuery.noConflict();

(function($){
	j(document).on('ready',function(){

		//activador parallax
		j('.parallax').parallax();

		//activar carousel marcas
		j("#scroller").simplyScroll({ auto: true, speed: 3 });

		//activar SIDEMENU MATERIALIZE
		j('.button-collapse').sideNav({
			menuWidth   : 240,
		});

		//desactivar todos los botones no link
		j(".js-no-link").on('click',function(e){
			e.preventDefault();
			return false;
		});
		

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME LIBRERIA CUBESLIDER ------|*/
		/*|----------------------------------------------------------------------|*/
		j("#banner-home").cubeslider({
			autoplay        : true,
			autoplayInterval: 2000,
			cubesNum        : {rows:4, cols:4},
			cubeSync        : 100,
			navigation      : false,
			orientation     : 'h',
			play            : false,
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL PROMOCIONES  ------|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_promo = j("#carousel-promociones").owlCarousel({
			items     : 4,
			lazyLoad  : true,
			loop      : true,
			margin    : 10,
			nav       : false,
			autoplay  : true,
			fluidSpeed: 500,
			smartSpeed: 600,
			responsive:{
		        320:{
		            items:1
		        },
		      	1024:{
		            items:4
		        },
	    	}
		});

		j(".carousel-promotion-arrow--left").on('click',function(e){
			e.preventDefault();
			carousel_promo.trigger('prev.owl.carousel');
		});		
		j(".carousel-promotion-arrow--right").on('click',function(e){
			e.preventDefault();
			carousel_promo.trigger('next.owl.carousel');
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  TABS MANUAL MENTE   ------|*/
		/*|----------------------------------------------------------------------|*/

		//MENU PRODUCTOS
		j("#sidebarSwitcherContainer input").on('click',function(e){
			e.preventDefault();
			var link = j(this).attr("data-link");

			//quitar los tabs
			j(".sidebarMenu").fadeOut( 400 ,function(){
				j("#"+link).removeClass("hide").fadeIn( 800 );
			});
		});

		//SECCION PRODUCTOS
		j(".tabSelector__content a").on('click',function(e){
			e.preventDefault();
			var link = j(this).attr("href");

			//cambiar activo
			j(".tabSelector__content a").removeClass('active');
			j(this).addClass("active");

			//quitar los tabs
			j(".tabSelector__panel-item").fadeOut( 400 ,function(){
				j("#"+link).removeClass("hide").fadeIn( 800 );
			});
		});
		

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL MARCAS  ------|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_marcas = j("#owl-carousel-marcas").owlCarousel({
			items          : 6,
			lazyLoad       : true,
			loop           : true,
			margin         : 12,
			nav            : false,
			autoplay       : true,
			autoplayTimeout: 2500,
			fluidSpeed     : 1000,
			responsive:{
		        320:{
		            items:3
		        },
		      	1024:{
		            items:6
		        },
	    	}
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  PETICIONES FORMULARIO PAGINA VENTA EN LINEA   ------|*/
		/*|----------------------------------------------------------------------|*/

		//agregar otro producto a la lista de cotizaciones
		j("#botonagregar").on('click',function(e){
			e.preventDefault();

			var line_product = "<tr><td height='2'></td></tr>";
				line_product += "<tr>";
				line_product += "<td><input name='cantidad[]' type='text' class='input_text_cantidad' /></td>";
				line_product += "<td><input type='text' name='producto[]' class='input_text_producto' /></td>";
				line_product += "<td><select name='marcas[]' class='select_box select_text_marca'>";
				line_product += "<option value=''>--Marca--</option>";

				for ( i = 0 ;  i < array_marcas.length ; i++ ) {
					line_product += "<option value="+array_marcas[i]['nombre_marca']+">"+array_marcas[i]['nombre_marca']+"</option>"; 
				}

				line_product += "</select>";
				line_product += "</td>";
				line_product += "<td><button class='js-btn-cotizar-remove'>X</button></td>";
				line_product += "</tr>";
			
			//agregar a la tabla
			j("#table-cotizar tbody").append( line_product );

		});

		//remove elemento de la lista mediante boton remover
		j('#table-cotizar').on("click", "button.js-btn-cotizar-remove" , function(e){
			e.preventDefault();
			//remover elemento
			j(this).closest("tr").remove();
			//remover tambien ultimo elemento de la lista 
			j("#table-cotizar tbody tr").last().remove();
		});

		//SOLICITAR COTIZACION
		j("#botoncotizar").on('click',function(){

			//agregar todos los input de cantidad
			var all_cantidad = [];
			j("input.input_text_cantidad").each(function(index){
				all_cantidad[index] =  j(this).val();
			});

			//agregar todas los productos
			var all_productos = [];
			j("input.input_text_producto").each(function(index){
				all_productos[index] =  j(this).val();
			});			

			//agregar todas los productos
			var all_marcas = [];
			j("select.select_text_marca").each(function(index){
				all_marcas[index] =  j(this).val();
			});

			//variables a tomar en cuenta
			var empresa = j("#empresa1").val();
			var email   = j("#email").val();
			var tel     = j("#telefono1").val();
			var fecha   = j("#fecha").val();

			j.post('enviarsolicitudventa.php',{
				email    : email,
				empresa1 : empresa,
				fecha    : fecha,
				telefono1: tel,
				//cantidades
				cantidad : all_cantidad,
				//productos
				producto : all_productos,
				//marcas
				marcas   : all_marcas
			})
			.done(function(data){
				//al retornar resultados setear la respuesta en el front 
				var modal   = j("#modal-cotizar");
				var parrafo = modal.find("#text-form-cotizar"); 
				//
				parrafo.text(data);
				//abrir modal
				modal.openModal();

			});



		});

	});
})(jQuery)
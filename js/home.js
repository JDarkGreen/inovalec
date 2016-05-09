jQuery(function($) {
	
	jQuery('#foo2').carouFredSel({
		width: 950,
		scroll	: 1000,
		circular: false,
		infinite: false,
		auto	: false,
		prev 	: {	
			button	: '#foo2_prev',
			key		: 'left'
		},
		next 	: { 
			button	: '#foo2_next',
			key		: 'right'
		},
		pagination: '#foo2_pag'
	});
	
	

});
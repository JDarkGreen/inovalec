jQuery(function($) {
	
	jQuery('#foo3').carouFredSel({
		width: 815,
		scroll	: 1000,
		circular: false,
		infinite: false,
		auto	: true,
		prev 	: {	
			button	: '#foo3_prev',
			key		: 'left'
		},
		next 	: { 
			button	: '#foo3_next',
			key		: 'right'
		},
		pagination: '#foo3_pag'
	});
	
});
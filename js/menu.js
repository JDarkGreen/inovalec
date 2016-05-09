function mainmenu()
{
	jQuery("#nav_der ul").css({display: "none"});
	jQuery("#nav_der li").hover(function()
	{
		jQuery(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
		},function()
		{
			jQuery(this).find('ul:first').slideUp(400);
		});

}

function mainmenuSuperior()
{
	jQuery("#nav_menu ul").css({display: "none"});
	jQuery("#nav_menu li").hover(function()
	{
		jQuery(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
		},function()
		{
			jQuery(this).find('ul:first').slideUp(400);
		});

}

jQuery(document).ready(function($){
	mainmenu();
});

jQuery(document).ready(function($){
	mainmenuSuperior();
});
<?php
function register_menus()
{
	register_nav_menus([
		'header-menu' => 'Header Menu',
		'footer-menu' => 'Footer Menu',
	]);
}
add_action('init', 'register_menus');

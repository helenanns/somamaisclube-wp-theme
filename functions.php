<?php
global $theme_uri, $telefone;
$theme_uri = get_template_directory_uri();
$is_prod = defined('THEME_ENV') && THEME_ENV === 'production';


$telefone = get_field('telefone', 'option');

include 'includes/functions/set-head-content.php';
include 'includes/functions/acf.php';
include 'includes/functions/scripts.php';
include 'includes/functions/utils.php';
include 'includes/functions/menu.php';

add_theme_support('menus');

add_theme_support('post-thumbnails');


if (!$is_prod){
    function remove_admin_bar()
    {
        return false;
    }
    add_filter('show_admin_bar', 'remove_admin_bar');
}
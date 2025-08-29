<?php

function custom_excerpt_length($excerpt) {
    $limit = 130; 
    if (strlen($excerpt) > $limit) {
        $excerpt = substr($excerpt, 0, $limit) . '(...)';
    }
    return $excerpt;
}

add_filter('the_excerpt', 'custom_excerpt_length'); 


add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );
function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');   
}

function remover_classes_de_ancoras_no_menu($classes, $item) {
    if (isset($item->url) && strpos($item->url, '#') !== false && !is_front_page()) {
        $classes = array_diff($classes, ['current-menu-item', 'current_page_item']);
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'remover_classes_de_ancoras_no_menu', 10, 2);
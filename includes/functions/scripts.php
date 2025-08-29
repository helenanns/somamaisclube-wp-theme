<?php

function custom_js()
{
	$theme_uri = get_template_directory_uri();
	$is_prod = defined('THEME_ENV') && THEME_ENV === 'production';
	
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		if ($is_prod) {

			$json_path = get_template_directory() . '/assets/assets.json';

			if (file_exists($json_path)) {
				$versions = json_decode(file_get_contents($json_path), true);
                if (!empty($versions['vendor.js'])) {
                    $vendorJS = "{$theme_uri}/assets/js/{$versions['vendor.js']}";
                    wp_register_script('vendor', $vendorJS, [], null, true);
                    wp_enqueue_script('vendor');
                }
                if (!empty($versions['main.js'])) {
                    $mainJS = "{$theme_uri}/assets/js/{$versions['main.js']}";
                    wp_register_script('main', $mainJS, [], null, true);
                    wp_enqueue_script('main');
                }
			}
			
		} else {

			wp_register_script('vendor', "{$theme_uri}/assets/js/vendor.js", [], null, true);
            wp_enqueue_script('vendor');
            wp_register_script('main', "{$theme_uri}/assets/js/main.js", [], null, true);
            wp_enqueue_script('main');

		}
	}
}
add_action('wp_footer', 'custom_js');

function custom_css()
{
    $theme_uri = get_template_directory_uri();
    $is_prod = defined('THEME_ENV') && THEME_ENV === 'production';

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if ($is_prod) {
            $json_path = get_template_directory() . '/assets/assets.json';
            if (file_exists($json_path)) {
                $versions = json_decode(file_get_contents($json_path), true);
                if (!empty($versions['vendor.css'])) {
                    wp_register_style('vendor-css', $theme_uri . '/assets/css/' . $versions['vendor.css'], [], null);
                    wp_enqueue_style('vendor-css');
                }
                if (!empty($versions['main.css'])) {
                    wp_register_style('main-css', $theme_uri . '/assets/css/' . $versions['main.css'], [], null);
                    wp_enqueue_style('main-css');
                }
                if (is_page_template('template-homepage.php') && !empty($versions['home.css'])) {
                    wp_register_style('home-css', $theme_uri . '/assets/css/' . $versions['home.css'], [], null);
                    wp_enqueue_style('home-css');
                }
                if (is_page() && !is_page_template('template-homepage.php') && !empty($versions['page.css'])) {
                    wp_register_style('page-css', $theme_uri . '/assets/css/' . $versions['page.css'], [], null);
                    wp_enqueue_style('page-css');
                }
                if ( is_404() ) {
                    wp_register_style('home-css', $theme_uri . '/assets/css/404.css', [], null);
                    wp_enqueue_style('home-css');
                }
            }
        } else {
            wp_register_style('vendor-css', $theme_uri . '/assets/css/vendor.css', [], null);
            wp_enqueue_style('vendor-css');
            wp_register_style('main-css', $theme_uri . '/assets/css/main.css', [], null);
            wp_enqueue_style('main-css');
            if (is_page_template('template-homepage.php')) {
                wp_register_style('home-css', $theme_uri . '/assets/css/home.css', [], null);
                wp_enqueue_style('home-css');
            }
            if (is_page() && !is_page_template('template-homepage.php')) {
                wp_register_style('page-css', $theme_uri . '/assets/css/page.css', [], null);
                wp_enqueue_style('page-css');
            }
            
            if ( is_404() ) {
                wp_register_style('home-css', $theme_uri . '/assets/css/404.css', [], null);
                wp_enqueue_style('home-css');
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'custom_css');
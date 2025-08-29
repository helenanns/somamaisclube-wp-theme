<?php

add_action('wp_head', 'head_content');
function head_content()
{
	global $theme_uri;

	if (is_singular()) {
		$description = strip_tags(get_the_excerpt());
	} else {
		$description = get_bloginfo('description');
	}

	$canonical = esc_url(home_url(add_query_arg(null, null)));
	if (is_front_page() || is_home()) {
		$title = get_bloginfo('name');
	} else {
		$title = trim(wp_get_document_title());
	}
	?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo esc_html($title); ?></title>
    
    <link rel="icon" type="image/png" href="<?php echo $theme_uri; ?>/assets/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo $theme_uri; ?>/assets/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo $theme_uri; ?>/assets/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $theme_uri; ?>/assets/img/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="<?php echo $theme_uri; ?>/assets/img/favicon/site.webmanifest" />

    <meta name="description" content="<?php echo esc_attr($description); ?>" />
    <meta property="og:title" content="<?php echo esc_attr($title); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>" />
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>" />

    <meta name="description" content="<?= $description ?>" />

    <link rel="canonical" href="<?php echo $canonical; ?>" />

    <meta name="theme-color" content="#000000" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta http-equiv="Content-Language" content="pt-br" />

    <!-- Preload fontes -->
    <link rel="preload" as="font" type="font/woff2" href="<?= esc_url($theme_uri) ?>/assets/fonts/gotham/Gotham-Book.woff2" crossorigin>
    
    <!-- Preload imagem hero -->
    <link rel="preload" as="image" href="<?= esc_url($theme_uri) ?>/assets/img/Banner-1-Geral-MOBILE.png" imagesrcset="<?= esc_url(
	$theme_uri
) ?>/assets/img/Banner-1-Geral-MOBILE.webp" fetchpriority="high" media="(max-width: 768px)">

<?php
}
?>

<?php global $theme_uri, $telefone; ?>

<header class="m-header is-fixed">

    <div class="container">

        <a href="<?= home_url() ?>" class="m-header-logo" title="Voltar para a Home">
            <picture>
                <img src="<?= $theme_uri ?>/assets/img/logo.svg" width="146" height="94" alt="<?php echo get_bloginfo(
	'name'
); ?>">
            </picture>
        </a>
        
        <button class="m-button-hamburger desktop-none JS__toggle-menu" aria-label="Abrir menu de navegação">
            <span class="m-button-hamburger-inner"></span>
        </button>

        <div class="m-header-content JS__header-menu">
            <?php wp_nav_menu([
            	'menu' => 'header',
            	'menu_class' => 'm-header-nav',
            ]); ?>

            <div class="m-header-social">
                <ul>
                    <li>
                        <a href="">
                            <i class="icon-whatsapp"></i>
                            <?= $telefone ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/somamaisclube" target="_blank" rel="noopener noreferrer" class="m-header-social-link">
                            <i class="icon-instagram"></i>
                        </a>
                        
                        <a href="https://www.instagram.com/somamaisclube" target="_blank" rel="noopener noreferrer" class="m-header-social-link">
                            <i class="icon-internet"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header> 



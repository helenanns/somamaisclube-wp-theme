<?php global $theme_uri, $telefone;
$instagram = get_field('instagram', 'options');
?>

</main>

<footer class="m-footer" id="contato" role="contentinfo" aria-label="Rodapé">

<div class="container">
    <div class="m-footer-content">
        <div class="m-footer-logo">
             <a href="<?= home_url() ?>" class="m-header-logo" title="Voltar para a Home">
                <picture>
                    <img src="<?= $theme_uri ?>/assets/img/logo.svg" width="146" height="94" alt="<?php echo get_bloginfo('name'); ?>">
                </picture>
            </a>
        </div>
        <div class="m-footer-social">
            <ul>
                <li>
                    <a href="wa.me/<?php echo $telefone; ?>" target="_blank" rel="noopener noreferrer" title="Conversar no WhatsApp" aria-label="Abrir conversa no WhatsApp">
                         <img
                                src="<?= $theme_uri ?>/assets/img/whatsapp-icon.png"
                                width="18"
                                height="18"
                                alt="Ícone do WhatsApp"
                                loading="lazy"
                                decoding="async"
                            >
                        <span>19</span> 98304•3806
                    </a>
                </li>
                <?php if ($instagram): ?>
                <li>
                    <a href="<?= $instagram ?>" target="_blank">
                        <img
                                src="<?= $theme_uri ?>/assets/img/instagram-icon.png"
                                width="18"
                                height="18"
                                alt="Ícone do WhatsApp"
                                loading="lazy"
                                decoding="async"
                            >
                        @somamaisclube
                    </a>
                </li>
                <?php endif; ?>
                <li>
                    www.somamais.com.br
                </li>
            </ul>
        </div>
        <div class="m-footer-nav-container">
            <?php wp_nav_menu([
            	'menu' => 'footer',
            	'menu_class' => 'm-footer-nav',
            ]); ?>
        </div>
    </div>
</div>

    <?php get_template_part('/template-parts/layouts/footer-copyright', 'copyright', []); ?>
    
    <?php get_template_part('/template-parts/modules/whatsapp-badge', 'whatsapp', []); ?>

</footer>

<?php wp_footer(); ?>
</body>
</html>
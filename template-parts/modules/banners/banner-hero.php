<?php
$banners = @$args['banners'];
$i = 0;

if ($banners): ?>
<section class="m-banner-hero">
    <div class="swiper JS__hero-slider">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner):
            	$i++;
            	if (!empty($banner['imagem'])): ?>  
                <div class="swiper-slide">

                    <?php if (!empty($banner['link'])): ?>
                        <a href="<?= esc_url($banner['link']['url']) ?>"> 
                    <?php endif; ?>

                    <figure>
                        <picture>
           
                            <source 
                                media="(min-width: 1060px)" 
                                srcset="<?= esc_url($banner['imagem']['desktop']['url']) ?>">
                            
                            <img 
                                src="<?= esc_url($banner['imagem']['mobile']['url']) ?>" 
                                alt="<?= !empty($banner['imagem']['alt'])
                                	? esc_attr($banner['imagem']['alt'])
                                	: esc_attr($banner['link']['title'] ?? 'Banner') ?>" 
                                decoding="async"
                                width="375" 
                                height="375"
                                <?php if ($i != 1): ?>
                                loading="lazy"
                                <?php endif; ?>
                                >
                        </picture>
                    </figure>

                    <?php if (!empty($banner['link'])): ?> 
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif;
            endforeach; ?>
        </div>

        <?php if (count($banners) > 1): ?>
            <div class="swiper-pagination"></div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

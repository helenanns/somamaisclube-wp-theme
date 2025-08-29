<?php
/** Template Name: Homepage */
global $theme_uri;
get_header();

$fields = get_fields();
$hero = @$fields['banners'];

$imagem = @$fields['imagem'];
$descricao = @$fields['descricao'];
$topicos = @$fields['topicos'];

$titulo_acessibilidade = @$fields['conta_titulo_acessibilidade'];
$imagem_principal = @$fields['conta_imagem'];
$conta_topicos = @$fields['conta_topicos'];
?>

<main class="l-main m-home">
    <h1 class="sr-only"><?= esc_html(get_bloginfo('name')) ?></h1>

    <?php if (!empty($hero)):
    	get_template_part('/template-parts/modules/banners/banner-hero', 'banner-hero', [
    		'banners' => $hero,
    	]);
    endif; ?>

    <!-- Intro  -->
    <section class="m-home-intro" id="quem-somos">

        <div class="m-home-intro-wrapper">
          <?php if ($imagem): ?>
            <div class="m-home-intro__imagem">

               <figure>
                  <picture>
      
                      <source 
                          media="(min-width: 1060px)" 
                          srcset="<?= esc_url($imagem['desktop']['url']) ?>">
                      
                      <img 
                          src="<?= esc_url($imagem['mobile']['url']) ?>" 
                          alt="<?= !empty($banner['imagem']['alt'])
                            ? esc_attr($banner['imagem']['alt'])
                            : esc_attr($banner['link']['title'] ?? 'Banner') ?>" 
                          decoding="async"
                          width="375" 
                          height="375"
                          loading="lazy"
                          >
                  </picture>
              </figure>
            </div>
          <?php endif; ?>

          <div class="m-home-intro__descricao container">
            <?php if ($descricao): ?>
              <div class="intro-descricao">
                <?php echo $descricao; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>


      <div class="container">

        <?php if ($topicos): ?>
          <div class="m-home-intro-topicos">

            <?php foreach ($topicos as $topico): ?>
              
              <div class="item">
                <?php if (!empty($topico['titulo'])): ?>
                  <h3 class="titulo"><?php echo esc_html($topico['titulo']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($topico['descricao'])): ?>
                  <p class="descricao"><?php echo esc_html($topico['descricao']); ?></p>
                <?php endif; ?>
              </div>
              
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>
    </section>

    <!-- Conta Digital -->
    <section class="m-conta-digital" id="digital-bank">
        <?php if ($titulo_acessibilidade): ?>
            <h2 class="sr-only"><?php echo esc_html($titulo_acessibilidade); ?></h2>
        <?php endif; ?>

        <?php if ($imagem_principal): ?>
            <div class="m-conta-digital__imagem">
                <img 
                    src="<?php echo esc_url($imagem_principal['url']); ?>" 
                    alt="<?php echo esc_attr($imagem_principal['alt'] ?: 'Imagem da conta digital'); ?>" 
                    width="<?php echo esc_attr($imagem_principal['width']); ?>" 
                    height="<?php echo esc_attr($imagem_principal['height']); ?>"
                />
            </div>
        <?php endif; ?>

        <?php if ($conta_topicos): ?>
            <div class="m-conta-digital__topicos">
                <?php foreach ($conta_topicos as $topico): ?>
                    <div class="m-conta-digital-topico">

                        <?php if (!empty($topico['titulo'])): ?>
                            <h3><?php echo esc_html($topico['titulo']); ?></h3>
                        <?php endif; ?>
                        
                        <?php if (!empty($topico['descricao'])): ?>
                            <div class="topico-descricao">
                                <?php echo wp_kses_post($topico['descricao']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- contact-cta"-->
    <section class="m-contact-cta">
                        
      <div class="m-contact-cta-image">
        <figure>
          <picture>
            <source 
              media="(min-width: 1060px)" 
              srcset="<?php echo $theme_uri; ?>/assets/img/contact-bg-desktop.png">
              <img 
                src="<?php echo $theme_uri; ?>/assets/img/contact-bg-mobile.png" 
                alt="Imagem de pessoas felizes representando saúde, educação e lazer"
                decoding="async"
                width="375" 
                height="375"
                loading="lazy" >
        </picture>
        </figure>
      </div>

      <div class="m-contact-cta-content">
        <div class="container">
          <div class="m-contact-cta-text">
            <span class="eyebrow">Muitas pessoas ainda enfrentam <span>barreiras</span> para acessar</span>

            <h3>saúde, educação e lazer de qualidade</h3>


            <span class="subtitle">Planos privados são caros.</span>
            <span class="subtitle">O sistema público, limitado.</span>

            <p>O Soma Mais nasceu para mudar esse cenário, com soluções acessíveis, simples e eficientes.</p>

            <img 
                src="<?php echo $theme_uri; ?>/assets/img/puzzle-icon.png" 
                alt="Ícone de quebra-cabeça"
                decoding="async"
                width="146" 
                height="145"
                loading="lazy" 
                class="puzzle-icon">
          </div>
        </div>
      </div>

      <div class="cta-button">
        <a href="https://api.whatsapp.com/send?phone=5519983043806&text=Ol%C3%A1%2C%20vim%20pelo%20site%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20sobre%20os%20planos." target="_blank" >Fale com um consultor!</a>
        <span>*Clique e conheça os planos*</span>
      </div>

    </section>


    <section class="m-benefits" id="solucoes">
      <div class="container">
        <h2>ECONOMIZE ATÉ 75% 
          <span>EM DIVERSOS SERVIÇOS</span>
        </h2>
        <p>Oferecemos benefícios reais para o dia a dia:</p>
      </div>


        <div class="benefits">
          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/estetoscopio.png" alt="" height="40">
              <div>
                <strong>Consultas</strong> médicas e especialidades
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/hospital.png" alt="" height="40">
              <div>
                Atendimentos de <strong>urgência e emergência</strong>
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/atendimento-ao-cliente.png" alt="" height="40">
              <div>
                Auxílio saúde, home care, bem-estar e telemedicina <strong>24hr</strong>
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/dente.png" alt="" height="40">
              <div>
                Tratamento <strong>odontológico</strong>
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/carteira-digital.png" alt="" height="40">
              <div>
                <strong>Conta digital</strong> com liberdade de uso
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/teatro.png" alt="" height="40">
              <div>
                Clube de <strong>vantagens</strong>
              </div>
            </div>
          </div>

          <div class="benefit-item">
            <div class="conteudo">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/patas.png" alt="" height="40">
            <div>
              <strong>Atendimento PET</strong> com descontos exclusivos
            </div>
            </div>
          </div>
        </div>
    </section>


    <section class="m-steps" id="planos">
      <div class="container">
        <h2>Siga o passo a passo e
          <span>se credencie!</span>
        </h2>

        <ul>
          <li>
            <div class="card">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/cadastro.png" alt="" height="40">
              <div>
                <span class="title">1. Cadastro</span>
                <p>Cadastre-se com um documento com foto junto a um consultor ou em nossa plataforma. Sem análise de perfil ou crédito.</p>
              </div>
            </div>
          </li>
          <li>
            <div class="card">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/validacao.png" alt="" height="40">
              <div>
                <span class="title">2. Validação</span>
                <p>Confirme os dados, escolha seu plano e conclua o pagamento da adesão.</p>
              </div>
            </div>
          </li>
          <li>
            <div class="card">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/ativacao.png" alt="" height="40">
              <div>
                <span class="title">3. Ativação</span>
                <p>Você recebe os acessos aos canais de suporte e agendamentos.</p>
              </div>
            </div>
          </li>
          <li>
            <div class="card">
              <img src="<?php echo $theme_uri; ?>/assets/img/icons/cuidados-de-saude.png" alt="" height="40">
              <div>
                <span class="title">4. Liberação Imediata</span>
                <p>Sem carência, sem burocracia.</p>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </section>


<?php get_footer(); ?>

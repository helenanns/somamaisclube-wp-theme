<?php global $theme_uri, $telefone; ?>
<a
  class="m-whatsapp"
  href="https://wa.me/<?php echo $telefone; ?>"
  target="_blank"
  rel="noopener noreferrer"
  title="Conversar no WhatsApp"
  aria-label="Abrir conversa no WhatsApp"
  data-action="click"
  data-category="whatsapp"
  data-label="Whatsapp Flutuante"
  data-value=""
>
  <img
    src="<?= $theme_uri ?>/assets/img/whatsapp-icon.png"
    width="34"
    height="34"
    alt="Ícone do WhatsApp"
    loading="lazy"
    decoding="async"
  >
</a>

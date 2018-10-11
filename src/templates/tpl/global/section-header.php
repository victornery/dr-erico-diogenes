<?php get_template_part('tpl/global/html','head'); ?>
<aside class="bar">
  <div class="container">
    <ul>
      <li><a href="https://www.instagram.com/drericodiogenes/" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri() ?>/dist/images/insta.png" alt="Icone do Instagram" /></a></li>
      <li><a href="https://www.facebook.com/drericodiogenes/?fref=ts" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri() ?>/dist/images/face.png" alt="Icone do Facebook" /></a></li>
      <li><a href="https://www.youtube.com/channel/UCITORRpgYFysxixfAa623yQ" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri() ?>/dist/images/yout.png" alt="Icone do Youtube" /></a></li>
      <li><a href="#">(85) 9.8170-1020<img class="wpp-img" src="<?php echo get_template_directory_uri() ?>/dist/images/whatsapp-1.png" alt="Icone do Whatsapp" /></a></li>
      <li><a href="#">Atendimento 24h</a></li>
    </ul>
  </div>
</aside>
<header class="global-header">
  <div class="container">
    <h1 class="global-header--logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-nova.png" alt="Logotipo do Dr. Érico Diógenes">
      </a>
    </h1>

    <div class="menu">
      <?php bem_menu(); ?>

      <div class="menu-icon">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
  </div>
</header>

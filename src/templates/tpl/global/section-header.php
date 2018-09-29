<?php get_template_part('tpl/global/html','head'); ?>
<header class="global-header">
  <div class="container">
    <h1 class="global-header">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" alt="Logotipo do Dr. Érico Diógenes">
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

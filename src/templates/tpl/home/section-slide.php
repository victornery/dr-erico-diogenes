<section class="slide">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      <?php $banner = new WP_Query(array('post_type' => 'banner', 'posts_per_page' => -1)); ?>
      <?php while($banner->have_posts()) : $banner->the_post(); ?>
        <li class="glide__slide">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Banner - Dr. Érico Diógenes">
          <span class="slide__content"><?php echo get_the_content(); ?></span>
        </li>
      <?php endwhile; wp_reset_query(); ?>
      <?php //endforeach; ?>
    </ul>
  </div>
</section>
<aside class="agendamento">
  <a href="https://www.doctoralia.com.br/medico/diogenes+erico-14805967" rel="noopener" target="_blank">
    <span>Agendar consulta</span>
    <small>by</small>
    <img src="<?php echo get_template_directory_uri() ?>/dist/images/doctoralia.png" alt="Agende sua consulta no Doctoralia com o Dr. Érico Diógenes">
  </a>
</aside>

<?php get_template_part('tpl/global/section','header'); ?>
<div class="container">
  <ul class="especialidades">
    <?php $especialidades = new WP_Query(array('post_type' => 'especialidades', 'posts_per_page' => -1)); ?>
    <?php if ($especialidades->have_posts()) : while ($especialidades->have_posts()): $especialidades->the_post() ?>
      <li><?php the_title(); ?></li>
    <?php endwhile; endif; wp_reset_query(); ?>
  </ul>
</div>

<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

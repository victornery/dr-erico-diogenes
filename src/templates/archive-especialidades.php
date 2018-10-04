<?php get_template_part('tpl/global/section','header'); ?>
<section class="d-page">
  <div class="container">
    <h1>Especialidades</h1>
    <ul class="especialidades__lista">
      <?php $especialidades = new WP_Query(array('post_type' => 'especialidades', 'posts_per_page' => -1)); ?>
      <?php if ($especialidades->have_posts()) : while ($especialidades->have_posts()): $especialidades->the_post() ?>
      <li data-id="<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail(); ?>
          <span><?php the_title(); ?></span>
        </a>
      </li>
      <?php endwhile; endif; wp_reset_query(); ?>
    </ul>
  </div>
</section>

<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

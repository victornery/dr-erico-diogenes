<?php get_template_part('tpl/global/section','header'); ?>
<section class="d-page">
  <div class="container">
    <h1>Patologias</h1>
    <ul class="patologias__lista">
      <?php $patologias = new WP_Query(array('post_type' => 'patologias', 'posts_per_page' => -1)); ?>
      <?php if ($patologias->have_posts()) : while ($patologias->have_posts()) : $patologias->the_post();  ?>
      <li data-id="<?php the_ID() ?>">
        <div class="item-title">
          <span class="item-icon"></span>
          <span class="item-name"><?php the_title(); ?></span>
        </div>
        <div class="item-info">
          <?php the_content(); ?>
        </div>
      </li>
      <?php endwhile; endif; wp_reset_query(); ?>
    </ul>
  </div>
</section>

<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

<?php get_template_part('tpl/global/section','header'); ?>

<section class="d-page">
  <div class="container">
    <h1>Blog</h1>
    <ul class="especialidades__lista">
      <?php $post = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1)); ?>
      <?php if ($post->have_posts()) : while ($post->have_posts()): $post->the_post() ?>
      <li>
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

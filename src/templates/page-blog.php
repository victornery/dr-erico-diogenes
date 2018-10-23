<?php get_template_part('tpl/global/section','header'); ?>

<section class="d-page">
  <div class="container">
    <h1>Blog</h1>
    <ul class="especialidades__lista">
      <?php $theposts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1)); ?>
      <?php if ($theposts->have_posts()) : while ($theposts->have_posts()): $theposts->the_post() ?>
        <li>
          <?php $trim = wp_trim_words(get_the_content(), 40); ?>
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            <h1 class="noticias-titulo"><?php the_title() ?></h1>
            <p class="text-box"><?php echo $trim; ?> <strong class="btn-rm" rel="noopener" style="margin-left: 0; color: #fff; margin-top: 10px;">Ler mais</strong></p>
          </a>
        </li>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </ul>
  </div>
</section>

<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

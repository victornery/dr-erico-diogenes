<?php get_template_part('tpl/global/section','header'); ?>
<section class="d-page">
  <div class="container">
    <?php if ( have_posts() ): while ( have_posts() ): the_post() ?>
      <header>
        <?php the_post_thumbnail(); ?>
        <h1><?php the_title(); ?></h1>
      </header>
      <article>
        <?php echo $post->post_content ?>
      </article>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

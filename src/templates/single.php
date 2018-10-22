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
<?php if(is_singular('especialidades')): ?>
  <div class="container">
  <iframe width="100%" height="315" src="https://www.youtube.com/embed/2uInoD59WOY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  <div class="especialidades-topicos">
  <h3 style="font-weight: 300; text-transform: uppercase; font-size: 28px; margin-bottom: 30px;">Confira mais especialidades</h2>
  <div class="especialidades-carrosel">
  <div class="glide__track" data-glide-el="track">
  <ul class="glide__slides">
  <?php $especialidades = new WP_Query(array('post_type' => 'especialidades', 'posts_per_page' => -1, 'orderby' => 'rand', 'post__not_in' => array( $post->ID ))); ?>
  <?php while($especialidades->have_posts()) : $especialidades->the_post(); ?>
  <li>
  <a href="<?php the_permalink(); ?>">
  <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
  <p><?php the_title(); ?></p>
  </a>
  </li>
  <?php endwhile; wp_reset_postdata(); ?>
  </ul>
  <div class="glide__arrows glide__arrows--blue" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
        </div>
  </div>
  </div>
  </div>
  </div>
<?php endif; ?>
<?php get_template_part('tpl/home/section','whatsapp'); ?>
<?php get_template_part('tpl/global/section','footer'); ?>

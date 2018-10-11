<section class="convenios">
  <div class="container">
    <div class="especialidades-topicos">
    <h2>Convenios</h2>
    <div class="convenios-carrosel">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
        <?php $convenios = new WP_Query(array('post_type' => 'convenio', 'posts_per_page' => 12)); ?>
        <?php if ($convenios->have_posts()) : while ($convenios->have_posts()): $convenios->the_post() ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
              <p><?php the_title(); ?></p>
            </a>
          </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
        <div class="glide__arrows glide__arrows--blue" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

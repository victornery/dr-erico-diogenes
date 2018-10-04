<section>
  <div class="container">
    <div class="especialidades-topicos">
    <h2>Especialidades</h2>
    <div class="especialidades-carrosel">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
        <?php $especialid = new WP_Query(array('post_type' => 'especialidades', 'posts_per_page' => 12)); ?>
        <?php if ($especialid->have_posts()) : while ($especialid->have_posts()): $especialid->the_post() ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
              <p><?php the_title(); ?></p>
            </a>
          </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    </div>
  </div>
</section>

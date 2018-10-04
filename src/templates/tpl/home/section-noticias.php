<section class="noticias">
  <div class="container">
    <div class="ultimas-noticias">
      <div class="boxes">
        <h2>Últimas Notícias</h2>
        <p class="blog-box">Blog</p>
      </div>
      <ul>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li>
            <?php $trim = wp_trim_words(get_the_content(), 40); ?>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
              <h1 class="noticias-titulo"><?php the_title() ?></h1>
              <p><?php echo $trim; ?> <strong>Ler mais</strong></p>
            </a>
          </li>
        <?php endwhile; endif; wp_reset_query(); ?>
      </ul>
    </div>
  </div>
</section>

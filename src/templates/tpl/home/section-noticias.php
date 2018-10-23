<section class="noticias">
  <div class="container">
    <div class="ultimas-noticias">
      <div class="boxes">
        <h2>Últimas Notícias</h2>
        <p class="blog-box">Blog</p>
      </div>
      <ul>
        <?php query_posts('showposts=3'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li>
            <?php $trim = wp_trim_words(get_the_content(), 40); ?>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
              <h1 class="noticias-titulo"><?php the_title() ?></h1>
              <p class="text-box"><?php echo $trim; ?> <strong class="btn-rm" rel="noopener" style="margin-left: 0; color: #fff; margin-top: 10px;">Ler mais</strong></p>
            </a>
          </li>
        <?php endwhile; endif; wp_reset_query(); ?>
      </ul>
    </div>
  </div>
</section>

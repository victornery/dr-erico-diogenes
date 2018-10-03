<section class="profissional">
  <div class="container">
    <?php
    $aboutImg = get_post_meta($post->ID, 'about-img', true);
    $aboutContent = get_post_meta($post->ID, 'about-content', true);
    ?>
    <figure class="profissional__item">
      <img src="<?php echo wp_get_attachment_url($aboutImg) ?>" alt="<?php the_title() ?> - Dr. Érico Diógenes">
    </figure>
    <article class="profissional__item profissional__content">
      <h2>Dr. Érico Diógenes</h2>
      <p><?php echo $aboutContent ?></p>
    </article>
  </div>
</section>

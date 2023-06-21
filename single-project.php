<?php get_header(); ?>
<h1>Project</h1>
<!-- the loop -->
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <article>
      <h2><?php the_title(); ?></h2>
      <!-- primary image -->
      <?php
      $image = get_field('main_image');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      } ?>

    </article>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
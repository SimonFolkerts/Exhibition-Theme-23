<?php get_header(); ?>
<div class="project-page">
  <div class="project-page__container">
    <!-- the loop -->
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <!-- primary image -->
        <?php
        $image = get_field('main_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
          echo wp_get_attachment_image($image, $size, false, array('class' => 'project-page__main-image'));
        } ?>

        <?php the_content(); ?>

      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
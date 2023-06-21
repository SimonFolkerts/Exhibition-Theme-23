<?php get_header(); ?>
<h1>Author Archive</h1>
<?php echo get_wp_user_avatar(get_the_author_meta('ID'), 'medium') ?>

<?php echo get_user_meta(get_the_author_meta('ID'), 'description', true) ?>
<?php echo get_user_meta(get_the_author_meta('ID'), 'first_name', true) ?>
<?php echo get_user_meta(get_the_author_meta('ID'), 'last_name', true) ?>
<!-- the loop -->

<?php $projects = new WP_Query(array(
  'post_type' => 'project',
  'author' => get_the_author_meta('ID')
)); ?>
<?php if ($projects->have_posts()) : ?>
  <?php while ($projects->have_posts()) : $projects->the_post(); ?>
    <a href="<?php echo get_permalink(); ?>">
      <article>
        <h2><?php the_title(); ?></h2>
        <!-- thumbnail -->
        <?php
        $image = get_field('main_image');
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        } ?>

      </article>
    </a>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
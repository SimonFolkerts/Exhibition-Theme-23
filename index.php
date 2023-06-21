<?php get_header(); ?>
<h1>Index</h1>
<!-- the loop -->
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <article>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </article>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
<?php get_header(); ?>
<div class="author-page">
  <div class="author-page__container">
    <?php $avatar = get_wp_user_avatar(get_the_author_meta('ID'), 'full', '', 'user portrait', array('class' => 'author-details__portrait'));
    $bio = get_user_meta(get_the_author_meta('ID'), 'description', true);
    $firstName = get_user_meta(get_the_author_meta('ID'), 'first_name', true);
    $lastName = get_user_meta(get_the_author_meta('ID'), 'last_name', true); ?>
    <div class="author-page__details">
      <?php echo $avatar ?>
      <div>
        <h1><?php echo $firstName . ' ' . $lastName ?></h1>
        <p><?php echo $bio ?></p>
      </div>
    </div>

    <!-- the loop -->

    <?php $projects = new WP_Query(array(
      'post_type' => 'project',
      'author' => get_the_author_meta('ID')
    )); ?>
    <div class="projects">
      <?php if ($projects->have_posts()) : ?>
        <?php while ($projects->have_posts()) : $projects->the_post(); ?>
          <a href="<?php echo get_permalink(); ?>">
            <article class="project">
              <h2 class="project__title"><?php the_title(); ?></h2>
              <!-- <p class="project__description"><?php // the_field('project_description'); 
                                                    ?></p> -->
              <!-- thumbnail -->
              <?php
              $image = get_field('main_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
              if ($image) {
                echo wp_get_attachment_image($image, $size);
              } ?>
            </article>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
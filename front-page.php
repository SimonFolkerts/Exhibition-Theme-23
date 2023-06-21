<?php get_header(); ?>
<h1>Front Page</h1>
<main id="home-main">
  <div class="home-content">
    <!-- the loop -->
    <?php
    // Retrieve the authors
    $authors = get_users(array(
      'role__in' => array('author'),
      'orderby' => 'display_name',
      'order' => 'ASC'
    )); ?>
    <div class="author-portraits">
      <div class="author-portraits-container">

        <?php
        // Display the authors
        if (!empty($authors)) {
          echo '<ul class="author-cards">';

          // repeat n times for testing
          for ($i = 0; $i < 3; $i++) {

            // loop to get each author
            foreach ($authors as $author) {
              $avatar = get_wp_user_avatar($author->ID, 'medium', '', 'user portrait', array('class' => 'author-card__portrait')); ?>

              <li class="author-card" data-id="<?php echo $author->ID ?>">
                <?php echo $avatar ?>
              </li>
          <?php
            }
          }
          ?>
          <!-- dummy list items to deal with overflow -->
          <li class="author-card dummy">
          </li>
          <li class="author-card dummy">
          </li>
        <?php
          echo '</ul>';
        }
        ?>
      </div>
    </div>
    <div class="author-details">
      <div class="author-details__container author-details__placeholder author-details__container--active" data-id="<?php echo $author->ID ?>">
        <h2>Yoobee</h2>
      </div>
      <?php foreach ($authors as $author) { ?>
        <?php $avatar = get_wp_user_avatar($author->ID, 'medium', '', 'user portrait', array('class' => 'author-details__portrait')); ?>
        <div class="author-details__container" data-id="<?php echo $author->ID ?>">
          <?php echo $avatar ?>
          <div class="author-details__text">
            <h2 class="author-details__first-name"><?php echo $author->first_name ?></h2>
            <h2 class="author-details__last-name"><?php echo $author->last_name ?></h2>
            <p class="author-details__bio"><?php echo $author->description ?></p>
            <?php $studentProjects = new WP_Query(array(
              'post_type' => 'project',
              'author' => $author->ID,
              'posts_per_page' => 3,
            )); ?>

            <?php if ($studentProjects->have_posts()) : ?>
              <?php while ($studentProjects->have_posts()) : $studentProjects->the_post(); ?>
                <div class="author-details__project">
                  <h3 class="author-details__project-title"><?php the_title(); ?></h3>
                  <p class="author-details__project-image"><?php echo the_field('main_image'); ?></p>
                  <p class="author-details__project-description"><?php echo the_field('project_description'); ?></p>
                  <a class="author-details__project-link" href="<?php the_permalink(); ?>">Read More</a>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        <?php } ?>

        </div>
    </div>
</main>
<?php get_footer(); ?>
<?php get_header(); ?>
<main id="home-main">
  <div class="home-content">
    <!-- the loop -->
    <?php
    // Retrieve the authors
    $authors = get_users(array(
      'role__in' => array('author', 'administrator'),
      'orderby' => 'display_name',
      'order' => 'ASC'
    )); ?>
    <div class="author-portraits">
      <div class="banner">
        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/logo.png" />
      </div>

      <div class="author-portraits-container">

        <?php
        // Display the authors
        if (!empty($authors)) {
          echo '<ul class="author-cards">';

          // repeat n times for testing
          for ($i = 0; $i < 2; $i++) {

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
        <?php
          echo '</ul>';
        }
        ?>
      </div>
    </div>
    <div class="author-details">
      <div class="author-details__container author-details__placeholder author-details__container--active" data-id="">
        <h2>Diploma in Web and UX Design</h2>
        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/diploma-in-web-and-ux.webp" />
        <p>Learning how to apply the principles of visual design and mastering scripting languages for client-side development. Building practical skills in UX design, foundation coding, app development, and content management systems.</p>
      </div>
      <?php foreach ($authors as $author) { ?>
        <?php $avatar = get_wp_user_avatar($author->ID, 'medium', '', 'user portrait', array('class' => 'author-details__portrait')); ?>
        <div class="author-details__container" data-id="<?php echo $author->ID ?>">
          <a href="<?php echo get_author_posts_url($author->ID) ?>">
            <div class="author-details__button">
              <p>Projects &rarr;</p>
            </div>
          </a>
          <div class="author-details__info">
            <?php echo $avatar ?>
            <div class="author-details__text">
              <h2 class="author-details__name"><?php echo $author->first_name ?> <?php echo $author->last_name ?></h2>
              <p class="author-details__bio"><?php echo $author->description ?></p>
            </div>
          </div>
          <div class="author-details__projects">
            <?php $studentProjects = new WP_Query(array(
              'post_type' => 'project',
              'author' => $author->ID,
              'posts_per_page' => 3,
            )); ?>

            <?php if ($studentProjects->have_posts()) : ?>
              <?php while ($studentProjects->have_posts()) : $studentProjects->the_post(); ?>
                <div class="author-details__project" data-id="">
                  <!-- <h3 class="author-details__project-title"><? php // the_title(); 
                                                                  ?></h3> -->
                  <?php echo wp_get_attachment_image(get_field('main_image'), 'full', false, array('class' => 'author-details__project-image')) ?>
                  <!-- <p class="author-details__project-description"><?php // echo the_field('project_description'); 
                                                                      ?></p>
                <a class="author-details__project-link" href="<?php // the_permalink(); 
                                                              ?>">Read More</a> -->
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</main>
<?php get_footer(); ?>
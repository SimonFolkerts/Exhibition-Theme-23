<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php if (!is_front_page()) : ?>
    <div class="page-header">
      <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/logo.png" />

      <!-- back to home -->
      <a class="back-home" href="<?php echo get_home_url(); ?>" class="back-to-home">Back to Home</a>
      <?php if (is_single()) : ?>
        <a class="back-graduate" href="javascript:history.go(-1)">Go Back to Graduate Profile</a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
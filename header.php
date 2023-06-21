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
    <!-- back to home -->
    <a href="<?php echo get_home_url(); ?>" class="back-to-home">Back to Home</a>
  <?php endif; ?>
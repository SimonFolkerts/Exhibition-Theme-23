<?php function enqueue_my_stuff()
{
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_my_stuff');

function my_scripts()
{
  if (is_front_page()) {
    wp_enqueue_script('script-name', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
  }
}
add_action('wp_enqueue_scripts', 'my_scripts');

function register_my_menus()
{
  register_nav_menus(
    array(
      'primary-menu' => __('Primary Menu'),
    )
  );
}
add_action('init', 'register_my_menus');

add_action('get_header', 'my_filter_head');

function my_filter_head()
{
  remove_action('wp_head', '_admin_bar_bump_cb');
}

function theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'theme_setup');


// Post Types

function hide_default_post_type()
{
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'hide_default_post_type');

function add_project_post_type()
{
  register_post_type('project', array(
    'labels' => array(
      'name' => __('Projects'),
      'singular_name' => __('Project'),
      'add_new_item' => __('Add New Project'),
      'edit_item' => __('Edit Project'),
      'view_item' => __('View Project'),
      'search_items' => __('Search Projects'),
      'not_found' => __('No Projects Found'),
      'not_found_in_trash' => __('No Projects Found in Trash'),
      'all_items' => __('All Projects'),
      'archives' => __('Project Archives'),
      'attributes' => __('Project Attributes'),
      'insert_into_item' => __('Insert into Project'),
      'uploaded_to_this_item' => __('Uploaded to this Project'),
      'featured_image' => __('Project Featured Image'),
      'set_featured_image' => __('Set Project Featured Image'),
      'remove_featured_image' => __('Remove Project Featured Image'),
      'use_featured_image' => __('Use as Project Featured Image'),
    ),
    'show_in_rest' => true,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'projects'),
    'menu_icon' => 'dashicons-layout',
    'supports' => array('title', 'editor', 'custom-fields', 'revisions'),
    'menu_position' => 4,
  ));
}
add_action('init', 'add_project_post_type');

function rename_custom_post_type_title_field($title_placeholder, $post)
{
  if ($post->post_type === 'project') {
    $title_placeholder = 'Enter Project Name here';
  }
  return $title_placeholder;
}
add_filter('enter_title_here', 'rename_custom_post_type_title_field', 10, 2);

function add_file_uploads_to_author_role()
{
  $author = get_role('author');
  $author->add_cap('upload_files');
}
add_action('admin_init', 'add_file_uploads_to_author_role');

<?php

function boilerplate_load_assets()
{
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');

function boilerplate_render_svg($filename)
{
  $file = get_theme_file_path("/assets/images/{$filename}.svg");
  if (file_exists($file)) {
    return file_get_contents($file);
  }
  return '';
}

function boilerplate_remove_checkout_fields($fields)
{
  // Remove all fields except for billing first name, last name, and email and phone number
  $fields['billing'] = array(
    'billing_first_name' => $fields['billing']['billing_first_name'],
    'billing_last_name' => $fields['billing']['billing_last_name'],
    'billing_email' => $fields['billing']['billing_email'],
    'billing_phone' => $fields['billing']['billing_phone'],
  );

  // Remove shipping fields
  unset($fields['shipping']);
  return $fields;
}
add_filter('woocommerce_checkout_fields', 'boilerplate_remove_checkout_fields');

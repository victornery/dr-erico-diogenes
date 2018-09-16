<?php

function call_scripts() {
    wp_enqueue_style('css-main', get_template_directory_uri() . '/dist/css/main.min.css', array(), '', null);
    wp_register_script('main', get_template_directory_uri() . '/dist/js/main.min.js', array(), '', true);
    wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'call_scripts', 100);


function admin_scripts() {
    wp_enqueue_style('inputs', get_template_directory_uri() . '/_lib/_admin/dist/css/input-styles.css', array(), null);
}

add_action('admin_enqueue_scripts', 'admin_scripts', 100);


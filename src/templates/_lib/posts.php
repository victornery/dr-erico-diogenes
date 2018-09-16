<?php
/**
 * Registrando os post types
 *
 * @author Nicholas Lima
 * @author Victor Nery
 * @category post_types
 */

function post_type_especialidades() {
    $labels = array(
        'name' => 'Especialidades',
        'singular_name' => 'Especialidades',
        'menu_name' => 'Especialidades',
        'add_new' => _x('Adicionar Especialidade', 'item'),
        'add_new_item' => __('Adicionar Novo Especialidade'),
        'edit_item' => __('Editar Especialidade'),
        'new_item' => __('Nova Especialidade')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'especialidades'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('especialidades', $args);
}
add_action('init', 'post_type_especialidades');

function post_type_banners() {
    $labels = array(
        'name' => 'Banners',
        'singular_name' => 'Banners',
        'menu_name' => 'Banners',
        'add_new' => _x('Adicionar Banner', 'item'),
        'add_new_item' => __('Adicionar Novo Banner'),
        'edit_item' => __('Editar Banner'),
        'new_item' => __('Novo Banner')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'banners'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-slides',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('banner', $args);
}
add_action('init', 'post_type_banners');


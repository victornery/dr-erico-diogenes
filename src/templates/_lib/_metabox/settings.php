<?php
add_filter( 'mb_settings_pages', 'prefix_options_page' );
function prefix_options_page( $settings_pages )
{
    $settings_pages[] = array(
        'id'          => 'theme-options',
        'option_name' => 'configuracoes_tema',
        'menu_title'  => __( 'Opções do Site', 'textdomain' ),
        'parent'      => 'themes.php',
    );
    return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'prefix_options_meta_boxes' );
function prefix_options_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'id'             => 'settings_catalogo',
        'title'          => 'Informações gerais',
        'context'        => 'normal',
        'settings_pages' => 'theme-options',
        'fields'         => array(

            array(
                'type' => 'heading',
                'name' => 'Contato',
            ),

            array(
                'name' => '',
                'id' => 'group_ends',
                'type' => 'group',

                'group_title' => array( 'field' => 'end_titulo' ), // ID of the subfield

                'fields' => array(

                    array(
                        'name' => 'Telefone',
                        'id' => 'end_telefone',
                        'type' => 'text',
                        'clone' => true
                    ),
                    array(
                        'name' => 'E-mail',
                        'id' => 'end_email',
                        'type' => 'email',
                    ),
                    array(
                        'name' => 'Link do Facebook',
                        'id' => 'end_fb',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Link do Instagram',
                        'id' => 'end_ig',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Link do Youtube',
                        'id' => 'end_yt',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Endereço',
                        'id' => 'endereco',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
    );
    return $meta_boxes;
}
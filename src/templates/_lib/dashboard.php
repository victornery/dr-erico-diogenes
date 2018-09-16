<?php
/*
* Dashboard functions
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

//=========================================================================================
// SAUDAÇÃO CUSTOMIZADA
//=========================================================================================

function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

//=========================================================================================
// CUSTOMIZAR O FOOTER (ASSINATURA DO PROJETO)
//=========================================================================================

function remove_footer_admin () {
    echo '© '.get_bloginfo('name');
}
add_filter('admin_footer_text', 'remove_footer_admin');

//=========================================================================================
// REMOVER WIDGETS
//=========================================================================================

function remove_widgets_painel() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
}
add_action( 'admin_init', 'remove_widgets_painel' );

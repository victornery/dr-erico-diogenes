<?php
/**
* Breadcrumbs
* Baseado na função de autoria de Stuart do site The Web Taylor
* URL do AUtor: https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
*/

// Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumb';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'unidade';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="breadcrumb__item item-home"><a class="breadcrumb__link breadcrumb__home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        //Blog
        if(is_home()) : echo '<li class="breadcrumb__item item-blog"><strong class="breadcrumb__current breadcrumb__blog">Blog</strong></li>'; endif;
        //echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="breadcrumb__item item-current item-archive"><strong class="breadcrumb__current breadcrumb__archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="breadcrumb__item item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb__link breadcrumb__cat breadcrumb__custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb__item item-current item-archive"><strong class="breadcrumb__current breadcrumb__archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            //If post type is Post
            if($post_type == 'post') {
                // Blog Raiz
                echo '<li class="breadcrumb__item item-blog"><a class="breadcrumb__link breadcrumb__blog" href="' . get_home_url() . '/blog" title="Blog">Blog</a></li>';
            }

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="breadcrumb__item item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb__link breadcrumb__cat breadcrumb__custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';

            }


            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb__item item-cat">'.$parents.'</li>';
                    // $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb__item item-current item-' . $post->ID . '"><strong class="breadcrumb__current breadcrumb__' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="breadcrumb__item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="breadcrumb__link breadcrumb__cat breadcrumb__cat-' . $cat_id . ' breadcrumb__cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="breadcrumb__item item-current item-' . $post->ID . '"><strong class="breadcrumb__current breadcrumb__' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="breadcrumb__item item-current item-' . $post->ID . '"><strong class="breadcrumb__current breadcrumb__' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Blog Raiz
            echo '<li class="breadcrumb__item item-blog"><a class="breadcrumb__link breadcrumb__blog" href="' . get_home_url() . '/blog" title="Blog">Blog</a></li>';
            // Category page
            echo '<li class="breadcrumb__item item-current item-cat"><strong class="breadcrumb__current breadcrumb__cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb__item item-parent item-parent-' . $ancestor . '"><a class="breadcrumb__link breadcrumb__parent breadcrumb__parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    // $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="breadcrumb__item item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="breadcrumb__item item-current item-' . $post->ID . '"><strong class="breadcrumb__current breadcrumb__' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="breadcrumb__item item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="breadcrumb__current breadcrumb__tag-' . $get_term_id . ' breadcrumb__tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="breadcrumb__item item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb__link breadcrumb__year breadcrumb__year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="breadcrumb__item item-month item-month-' . get_the_time('m') . '"><a class="breadcrumb__link breadcrumb__month breadcrumb__month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="breadcrumb__item item-current item-' . get_the_time('j') . '"><strong class="breadcrumb__link breadcrumb__current breadcrumb__' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="breadcrumb__item item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb__link breadcrumb__year breadcrumb__year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="breadcrumb__item item-month item-month-' . get_the_time('m') . '"><strong class="breadcrumb__month breadcrumb__month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="breadcrumb__item item-current item-current-' . get_the_time('Y') . '"><strong class="breadcrumb__current breadcrumb__current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="breadcrumb__item item-current item-current-' . $userdata->user_nicename . '"><strong class="breadcrumb__current breadcrumb__current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="breadcrumb__item item-current item-current-' . get_query_var('paged') . '"><strong class="breadcrumb__current breadcrumb__current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="breadcrumb__item item-current item-current-' . get_search_query() . '"><strong class="breadcrumb__current breadcrumb__current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}
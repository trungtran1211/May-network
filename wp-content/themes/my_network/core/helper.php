<?php

if (!function_exists('show_tags_taxonomies')) {
    //show tags taxonomy
    function show_tags_taxonomies($tags)
    {
        foreach ($tags as $tag) {
            echo "#<span>$tag->name</span>";
        }
    };
}

if (!function_exists('get_thumbnail_post')) {
    //show image post
    function get_thumbnail_post($postID)
    {
        $image = get_the_post_thumbnail_url($postID);
        if (!empty($image)) {
            echo "<figure><img src='$image' alt='' /></figure>";
        } else {
            echo "<figure><img src=" . get_stylesheet_directory_uri() . "/assets/images/default_thumbnail.png' alt='' /></figure>";
        }
    };
}

if (!function_exists('get_banner_with_default')) {
    //show image page
    function get_banner_with_default($postID)
    {
        $image = get_field('banner', $postID, true);
        if (!empty($image)) {
            echo "<img src='$image' alt='' />";
        } else {
            echo "<img src=" . get_stylesheet_directory_uri() . "/assets/images/bg-banner01.svg' alt='' />";
        }
    };
}

if (!function_exists('get_logo_with_default')) {
    //show image page
    function get_logo_with_default($postID)
    {
        $image = get_field('release_logo', $postID, true);
        if (!empty($image)) {
            echo "<img src='$image' alt='' />";
        } else {
            echo "<img src=" . get_stylesheet_directory_uri() . "/assets/images/MSY_small.png' alt='' />";
        }
    };
}

/*
 * Setup function show menu
 **/
if (!function_exists('custom_menu')) {

    /**
     * This function show menu
     *
     * @param  string $slug
     *
     * @return mixed
     */
    function custom_menu(string $slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'container'      => 'menu',
            'menu_id'        => $slug,
            'menu_class'     => '',
            'walker'         => new Custom_Walker_Nav_Menu,
            'echo'           => true
        );
        wp_nav_menu($menu);
    }
}

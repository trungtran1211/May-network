<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {
register_post_type( 'partner',
        array(
            'labels' => array(
                'name' => __( 'Partner' ),
                'singular_name' => __( 'Partner' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'partner'),
            'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
            'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
        )
    );
}

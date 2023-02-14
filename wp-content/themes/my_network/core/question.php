<?php

add_action( 'init', 'create_post_type_qs' );
function create_post_type_qs() {
register_post_type( 'question',
        array(
            'labels' => array(
                'name' => __( 'Question' ),
                'singular_name' => __( 'Question' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'question'),
            'supports' => array( 'title', 'custom-fields', 'thumbnail' ),
            'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
        )
    );
}
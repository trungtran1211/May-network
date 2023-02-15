<?php 


function banner_about($wp_customizer){
    $wp_customizer->add_section('banner_about', array(
        'title' =>__('Banner About Settings', 'Daily'),
        'priority' => 70
    ));

    $wp_customizer->add_setting('about_image', array(
        'capability' => 'edit_theme_options',
    ));


    $wp_customizer->add_control(new WP_Customize_Image_Control($wp_customizer, 'about_image', array(
        'label' => __('About Image', 'Daily'),
        'section' => 'banner_about',
    )));
}
add_action('customize_register', 'banner_about');
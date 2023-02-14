<?php
/**
 * The header.
 */
	$fileName = get_field("file_name_css") ?? 'home';
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/favicon.png" type="image/x-icon" />
	<link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
	  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/' . $fileName . '.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/style.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/single.css') ?>" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/home.css') ?>" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/about.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/blog-details.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/blog.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/contact.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/question.css') ?>" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo resolve_style_filename('assets/css/service.css') ?>" /> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<header class="site-header">
        <div class="container">
            <div class="header-container">
                <div class="header-left">
                    <div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/logo.png" alt="">
						</a>
                    </div>
                </div>
                <div class="header-right">
                    <div class="iconmenu mb">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/menu/icon-menu1.png" alt="">
                    </div>
                    <nav id="wrap" class="main-menu">
                        <a class="menu-close mb"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/menu/icon-menu2.png" alt=""></a>
                        <div class="logo mb">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/logo.png" alt="">
                            </a>
                        </div>
                        <ul>
							<?php wp_nav_menu(array('theme_location'=>'header-menu','container'=>'', 'items_wrap' => '%3$s')); ?>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
     </header>
	<main>
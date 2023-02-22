<?php /* Template Name: Home 1 */ ?>

<?php
/**
 * The main template file
 */
get_header();
?>

	    <!-- Banner -->
	    <div class="banner">
            <div class="banner-may1 pc" data-aos="fade-right" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/may-banner1.png" alt="">
            </div>
            <div class="container">
                <div class="banner-container">
                    <div class="banner-left" data-aos="fade-right" data-aos-duration="1000">
                        <h1 class="title">MÂY NETWORK</h1>
                        <p class="content">Không chỉ là một MCN TikTok, Mây giúp cá nhân và doanh nghiệp tiếp cận và khai thác tối đa tiềm năng của TikTok nói chung và TikTok Shop nói riêng.</p>
                        <a href="http://maynetwork.tv/ve-may/">
                            <button class="banner-btn">
                                Tìm hiểu thêm về Mây <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/arrow-banner.png" alt="">
                            </button>
                        </a>
                    </div>
                    <div class="banner-right" data-aos="fade-left" data-aos-duration="1000">
                        <?php if(get_theme_mod("header_image")) :?>
                            <img src="<?php echo esc_url(get_theme_mod('header_image'))?>" alt="Master Tiktok" >
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="banner-may2" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/may-banner2.png" alt="">
            </div>
        </div>
        <!-- Service box1 -->
        <div class="box1sv">
           <h1 class="box1sv-heading">DỊCH VỤ TẠI <span>MÂY</span> </h1>
           <div class="box1sv__bg">
                <div class="container">
                    <div class="box1sv-container">
                        <div class="box1sv__row1">
                            <div class="box1sv__col" data-aos="fade-right" data-aos-duration="1000">
                                <div class="box1sv__img">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/1.png" alt="Xây dựng kênh">
                                </div>
                                <ul>
                                    <?php wp_nav_menu(array('theme_location'=>'menu-Xay-dung-kenh','container'=>'', 'items_wrap' => '%3$s')); ?>
                                </ul>
                            </div>
                            <div class="box1sv__col"  data-aos="fade-left" data-aos-duration="1000">
                                <div class="box1sv__img">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/2.png" alt="Quản lý kênh">
                                </div>
                                <ul>
                                    <li><a href="#">Quản lý kênh</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box1sv__row2">
                            <div class="box1sv__col" data-aos="fade-right" data-aos-duration="1000">
                                <div class="box1sv__img">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/3.png" alt="Thiết lập & vận hành Tiktok shop">
                                </div>
                                <ul>
                                    <li><a href="#">THIẾT LẬP & VẬN HÀNH <br> TIKTOK SHOP</a></li>
                                </ul>
                            </div>
                            <div class="box1sv__col" data-aos="fade-up" data-aos-duration="1000">
                                <div class="box1sv__img" >
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/4.png" alt="Livestream">
                                </div>
                                <ul>
                                    <?php wp_nav_menu(array('theme_location'=>'livestream','container'=>'', 'items_wrap' => '%3$s')); ?>
                                </ul>
                            </div>
                         
                        
                            <div class="box1sv__col" data-aos="fade-left" data-aos-duration="1000">
                                <div class="box1sv__img">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/5.png" alt="Booking idol">
                                </div>
                                <ul>
                                    <li><a href="#">BOOKING IDOL</a></li>
                                </ul>
                            </div>
                        </div> 
                        <div class="box1sv__button" data-aos="fade-up" data-aos-duration="1000">
                            <a href="#">
                                <button class="box1sv-btn">
                                    Chi tiết dịch vụ <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service-box1/icon-right.png" alt="">
                                </button>
                            </a>
                        </div>             
                    </div>
                </div>
           </div>                 
        </div>
        <!-- contact -->
        <div class="contact">
            <div class="ct-may1" data-aos="fade-right" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/contact/may1.png" alt="">
            </div>
            <div class="container">
                <div class="contact-container" data-aos="fade-up" data-aos-duration="1000">
                    <div class="contact__container-tt1" data-aos="fade-right" data-aos-duration="1000">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/contact/tt1.png" alt="">
                    </div>
                    <ul>
                        <li>Bạn đam mê với sáng tạo nội dung số, đặt biệt là các video ngắn trên nền tảng TikTok?</li>
                        <li>Bạn không ngại làm việc đứng trước ống kính máy quay?</li>
                        <li>Bạn có năng khiếu, các tài lẻ liên quan đến nghệ thuật chưa được khai phá?</li>
                        <li>Và bạn đang không biết làm cách nào để biến đam mê thành nghề?</li>
                    </ul>
                    <p class="contact-text">
                        Tình cờ, Mây có đào tạo các tài năng trẻ để trở thành các talent in-house, nơi bạn có thể sống đúng với sở thích của mình.
                    </p>
                    <h2 class="contact-title">HÃY ĐỂ NĂNG KHIẾU VÀ ĐAM MÊ CỦA BẠN ĐƯỢC KHÁM PHÁ VÀ NUÔI DƯỠNG!</h2>
                    <a href="http://maynetwork.tv/lien-he/">
                        <button class="contact-btn">Liên hệ ngay <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/arrow-banner.png" alt=""></button>
                    </a>
                    <div class="contact__container-tt2" data-aos="fade-left" data-aos-duration="1000">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/contact/tt2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="ct-may2" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/contact/may2.png" alt="">
            </div>
        </div>
        <!-- Creators -->
        <div class="creators">
            <div class="container">
                <div class="creators-container" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="creators-heading">CASE STUDIES</h1>
                    <p class="creators-text">Những nhà sáng tạo đã thành công cùng Mây</p>
                    <div class="creators-list">
                    <?php
                        $args = array(
                                'post_type' => 'creators',
                        );
                        $post_query = new WP_Query($args);

                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                    $post_query->the_post();
                            ?>
                                    <div class="creators-item">
                                        <div class="creators-avt">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                        <div class="creators-info">
                                            <h2 class="creators-name"><?php the_title(); ?></h2>
                                            <span class="creators-tag"><?php echo get_post_meta($post->ID, 'tag', true); ?></span>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Partner -->
        <div class="partner">
            <div class="partner-may" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/parther/partner-may.png" alt="">
            </div>
            <img class="parther-bg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/bg-partner.png" alt="">
            <div class="partner-container">
                <div class="container">
                    <h1 class="partner-title">ĐỐI TÁC TIÊU BIỂU</h1>
                    <p class="partner-text">Mạng lưới các Nhà sáng tạo/ KOL/ KOC đồng hành cùng Mây</p>
                    <div class="list__single">
                    <?php
                        $args = array(
                                'post_type' => 'partner',
                        );
                        $post_query = new WP_Query($args);

                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                    $post_query->the_post();
                            ?>
                                <div class="single__item">
                                    <div class="partner-avatar" data-aos="fade-right" data-aos-duration="1000">
                                        <?php the_post_thumbnail() ?>
                                    </div>
                                    <div class="profile" data-aos="fade-left" data-aos-duration="1000">
                                        <h1 class="partner-name"><?php the_title(); ?></h1>
                                        <p class="number-follow"><?php echo get_post_meta($post->ID, 'Followers', true); ?></p>
                                        <span><?php echo get_post_meta($post->ID, 'mảng', true); ?></span>
                                        <a href="#">
                                            <button class="partner-btn">Đọc thêm thông tin <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/arrow-partner.png" alt=""></button>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                        
                    </div>
                    <div class="list-icon" data-aos="fade-left" data-aos-duration="1000">
                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <span class="slider__label sr-only"></span>
                        </div>  
                        <div class="list__nav">
                        <?php
                            $args = array(
                                    'post_type' => 'partner',
                            );
                            $post_query = new WP_Query($args);

                            if($post_query->have_posts() ) {
                                while($post_query->have_posts() ) {
                                        $post_query->the_post();
                                ?>
                                    <div class="nav__item">
                                        <?php the_post_thumbnail() ?>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- trend -->
        <div class="trend">
            <div class="container">
                <div class="trend__container" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="trend__heading"> <span>XU HƯỚNG THỊ TRƯỜNG</span> </h1>
                    <div class="trend__list">

                    <?php
                        $args = array(
                                'post_type' => 'post',
                                'order' => 'DESC',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'terms' => 1,
                                        
                                    ] 
                                ],
                        );
                        $post_query = new WP_Query($args);
                        
                        if($post_query->have_posts() ) {
                                while($post_query->have_posts() ) {
                                        $post_query->the_post();
                            ?>
                                <div class="trend__item">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="trend__img">
                                                <?php 
                                                    $image = get_field('anh_xu_huong');
                                                    if( !empty($image) ): ?>
                                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <div class="trend__details">
                                        <a href="<?php the_permalink() ?>">
                                            <h2 class="trend__title"><?php the_title(); ?></h2>
                                        </a>
                                            <div class="detail">
                                                
                                                <h6><?php echo get_the_tag_list(); ?></h6>
                                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/trend/time.png" alt=""><?php echo get_the_date('d/m/Y'); ?></p>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/trend/trend-arrow.png" alt="">
                                            </div>
                                        </div>
                                    
                                </div>
                            <?php
                        }
                    }
                ?>
                          
                    </div>
                    <div class="progressTrend" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <span></span>
                    </div>
                    
                    <div class="trend-button">
                        <a href="http://maynetwork.tv/blog/">
                            <button class="trend-btn">
                                Xem Thêm <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/trend/icon-more.png" alt="">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- service -->
        <div class="service">
            <div class="may-sv1" data-aos="fade-right" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service/may-sv2.png" alt="">
            </div>
            <div class="container">
                <div class="service-container" data-aos="fade-up" data-aos-duration="1000">
                    <div class="avt">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service/avt.png" alt="">
                    </div>
                    <div class="service-heading">
                        <h2>Dịch vụ trên <span>Mây</span> </h2>
                    </div>
                    <a href="http://maynetwork.tv/lien-he/">
                        <button class="service-btn">Liên hệ tại đây <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service/arrow-service.png" alt=""></button>
                    </a>
                </div>
            </div>
            <div class="may-sv2" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/service/may-sv1.png" alt="">
            </div>
        </div>

	<?php get_footer(); ?>
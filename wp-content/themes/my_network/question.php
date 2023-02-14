<?php /* Template Name: question */ ?>

<?php
/**
 * The main template file
 */
get_header(); ?>
   
        <div class="question">
            <h1 class="question__heading" data-aos="fade-up" data-aos-duration="1000"><span>BẠN HỎI - MÂY ĐÁP</span></h1>
            <div class="qs__bg">
                <!-- <img class="w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/question/qs-bg.png" alt=""> -->
                <div  class="container">
                    <div class="question__list">
                        <h2 class="qs__title" data-aos="fade-up" data-aos-duration="1000">Câu hỏi từng gặp</h2>
                        <?php
                            $orderNumber = 1;
                            $args = array(
                                'post_type'        => 'question',
                                'post_status'      => array('publish'),
                                // 'posts_per_page'   => 100,
                                'orderby'          => 'post_modified',
                                'order'            => 'ASC',
                                'tax_query' => [
                                    [
                                        'taxonomy'  => 'category',
                                        'field'     => 'slug',
                                        'terms'     => 'qa',
                                    ] ,
                                    [
                                        'taxonomy'  => 'post_tag',
                                        'field'     => 'slug',
                                        'terms'     => 'cau-hoi-tung-gap',
                                    ]
                                ],
                            );
                            // The Query
                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                // The Loop
                                while ($the_query->have_posts()) :
                                    $the_query->the_post();
                        ?>
                            <details class="details-animated" data-aos="fade-up" data-aos-duration="1000">
                                <summary>
                                    <h3 class="qs__number">
                                        <?php if ($orderNumber < 10) {
                                            echo '0'.$orderNumber++;
                                        }else {
                                            echo $orderNumber++;
                                        } ?>
                                    </h3>
                                    <h2 class="qs__title-list"><?php the_title(); ?></h2>
                                </summary>
                                <div class="question__content">
                                    <p><?php echo get_post_meta($post->ID, 'nội_dung', true); ?></p>
                                </div>
                            </details>
                        <?php endwhile; endif; ?>
                        
                        <h2 class="qs__title" data-aos="fade-up" data-aos-duration="1000">Về đào tạo TALENT</h2>
                        <?php
                            $args = array(
                                'post_type'        => 'question',
                                'post_status'      => array('publish'),
                                // 'posts_per_page'   => 100,
                                'orderby'          => 'post_modified',
                                'order'            => 'ASC',
                                'tax_query' => [
                                    [
                                        'taxonomy'  => 'category',
                                        'field'     => 'slug',
                                        'terms'     => 'qa',
                                    ] ,
                                    [
                                        'taxonomy'  => 'post_tag',
                                        'field'     => 'slug',
                                        'terms'     => 've-dao-tao-talent',
                                    ]
                                ],
                            );
                            // The Query
                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                // The Loop
                                while ($the_query->have_posts()) :
                                    $the_query->the_post();
                        ?>
                            <details data-aos="fade-up" data-aos-duration="1000">
                                <summary>
                                    <h3 class="qs__number">
                                        <?php if ($orderNumber < 10) {
                                            echo '0'.$orderNumber++;
                                        }else {
                                            echo $orderNumber++;
                                        } ?>
                                    </h3>
                                    <h2 class="qs__title-list"><?php the_title(); ?></h2>
                                </summary>
                                <div class="question__content">
                                    <p><?php echo get_post_meta($post->ID, 'nội_dung', true); ?></p>
                                </div>
                            </details>
                        <?php endwhile; endif; ?>
                        <h2 class="qs__title" data-aos="fade-up" data-aos-duration="1000">Về TIKTOK SHOP</h2>
                        <?php
                            $args = array(
                                'post_type'        => 'question',
                                'post_status'      => array('publish'),
                                // 'posts_per_page'   => 100,
                                'orderby'          => 'post_modified',
                                'order'            => 'ASC',
                                'tax_query' => [
                                    [
                                        'taxonomy'  => 'category',
                                        'field'     => 'slug',
                                        'terms'     => 'qa',
                                    ] ,
                                    [
                                        'taxonomy'  => 'post_tag',
                                        'field'     => 'slug',
                                        'terms'     => 've-tiktok-shop',
                                    ]
                                ],
                            );
                            // The Query
                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                // The Loop
                                while ($the_query->have_posts()) :
                                    $the_query->the_post();
                        ?>
                            <details data-aos="fade-up" data-aos-duration="1000">
                                <summary>
                                    <h3 class="qs__number">
                                        <?php if ($orderNumber < 10) {
                                            echo '0'.$orderNumber++;
                                        }else {
                                            echo $orderNumber++;
                                        } ?>
                                    </h3>
                                    <h2 class="qs__title-list"><?php the_title(); ?></h2>
                                </summary>
                                <div class="question__content">
                                    <p><?php echo get_post_meta($post->ID, 'nội_dung', true); ?></p>
                                </div>
                            </details>
                        <?php endwhile; endif; ?>
                        <h2 class="qs__title" data-aos="fade-up" data-aos-duration="1000">Về LIVESTREAM</h2>
                        <?php
                            $args = array(
                                'post_type'        => 'question',
                                'post_status'      => array('publish'),
                                // 'posts_per_page'   => 100,
                                'orderby'          => 'post_modified',
                                'order'            => 'ASC',
                                'tax_query' => [
                                    [
                                        'taxonomy'  => 'category',
                                        'field'     => 'slug',
                                        'terms'     => 'qa',
                                    ] ,
                                    [
                                        'taxonomy'  => 'post_tag',
                                        'field'     => 'slug',
                                        'terms'     => 've-livestream',
                                    ]
                                ],
                            );
                            // The Query
                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                // The Loop
                                while ($the_query->have_posts()) :
                                    $the_query->the_post();
                        ?>
                            <details data-aos="fade-up" data-aos-duration="1000">
                                <summary>
                                    <h3 class="qs__number">
                                    <?php if ($orderNumber < 10) {
                                        echo '0'.$orderNumber++;
                                    }else {
                                        echo $orderNumber++;
                                    } ?>
                                    </h3>
                                    <h2 class="qs__title-list"><?php the_title(); ?></h2>
                                </summary>
                                <div class="question__content">
                                    <p><?php echo get_post_meta($post->ID, 'nội_dung', true); ?></p>
                                </div>
                            </details>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="qs__contact">
            <div class="qs__contact-may" data-aos="fade-right" data-aos-duration="1000">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/question/may.png" alt="">
            </div>
            <div class="container">
                <div class="qs__contact-container">
                    <div class="qs__contact-heading" data-aos="fade-up" data-aos-duration="1000">VẪN CÒN THẮC MẮC? <br>
                        <span>THẢ NÓ TẠI ĐÂY!</span>
                    </div>
                    <div class="qs__contact-info">
                        <div class="qs__contact-mail" data-aos="fade-right" data-aos-duration="1000">
                            <div>
                                <div class="mail-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/question/mail.png" alt="">
                                </div>
                                <h6 class="contact-name">Mail chúng tôi</h6>
                            </div>
                            <span class="contact-content" >contactforwork@maynetwork.tv</span>
                        </div>
                        <div class="qs__contact-phone" data-aos="fade-left" data-aos-duration="1000">
                            <div>
                                <div class="mail-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/question/phone.png" alt="">
                                </div>
                                <h6 class="contact-name">Gọi chúng tôi</h6>
                            </div>
                            <span class="contact-content">(+84) 385691989</span>
                        </div>
                    </div>
                    <?php
                        echo do_shortcode( '[contact-form-7 id="195" title="question" html_name="question"]' );
                    ?>
                </div>
            </div>
            
        </div>

<?php get_footer(); ?>
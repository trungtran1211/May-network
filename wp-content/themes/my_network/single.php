<?php /* Template Name: Single */ ?>

<?php
    get_header();
?>

<div class="blog__details">
            <div class="container">
                <div class="blog__details-container">
                    <div class="blog__detail">
                    <?php if (have_posts()) : 
                        while (have_posts()) : the_post(); ?>
                        <h1 class="blog__details-heading"><?php the_title(); ?></h1>
                        <div class="blog__details-header">
                            <h6 class="details__header-date"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-details/icon-time.png" alt=""> <?php echo get_the_date('d/m/Y'); ?></h6>
                            <span class="blog__details-categoty"><?php $category = get_the_category();
                                $firstCategory = $category[0]->cat_name; echo $firstCategory;?></span>
                        </div>
                        <div class="blog__details-content">
                            <?php the_content(); ?>
                        </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                        
                    </div>
                    <div class="blog__news">
                        <h2 class="blog__news-heading">
                            Tin tức khác
                        </h2>
                        <div class="blog__news-list">
                        <?php
                            $args = array(
                                'post_type'      => 'post',
                                'orderby'        => 'rand',
                                'posts_per_page' => '5',
                            );
                            $post_query = new WP_Query($args);

                            if($post_query->have_posts() ) {
                                while($post_query->have_posts() ) {
                                        $post_query->the_post();
                                    ?>
                                        <div class="blog__news-item">
                                            <a href="<?php the_permalink() ?>">
                                                <div class="news-img">
                                                    <?php the_post_thumbnail() ?>
                                                </div>
                                                <div class="blog__news-bt">
                                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-details/icon-time1.png" alt=""><?php echo get_the_date('d/m/Y'); ?></span>
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                            </a>
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

<?php 
    get_footer(); 
?>
<?php /* Template Name: Blog */ ?>
<?php get_header();?>
<div class="blog__banner">
	<div class="blog__banner-bg">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/blog-bgtop.png" alt="">
	</div>
	<h1 class="blog__banner-heading">
		GÓC <span>MÂY</span> CHIA SẺ
	</h1>
</div>
<!-- ///////////////////////////////// -->
<div class="blog__listpost">
	<div class="container">
		<h2 class="blog__all">Tất cả</h2>
		<div class="blog__listpost-container">
			<div class="blog__listpost-left">
				<div id="blog__listpost-nav">
					<ul>
						<li onclick="sv(this)"> <a href="#share">Góc chia sẻ</a> </li>
						<li onclick="sv(this)"> <a href="#trend">Xu hướng</a> </li>
						<li onclick="sv(this)"> <a href="#work">Hoạt động nổi bật</a> </li>
						<li onclick="sv(this)"> <a href="#casestudies">Case studies</a> </li>
					</ul>
				</div>

				<!-- ==========Share========== -->
				<div id="share" class="content">
					<div class="blog__all-list">
					<?php
                        $args = array(
                                'post_type' => 'post',
								'posts_per_page' => '4',
                                'order' => 'DESC',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'terms' => 10,
                                        
                                    ] 
                                ],
                        );
                        $post_query = new WP_Query($args);
                        
                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                        $post_query->the_post();
								?>
									<div class="blog__all-item">
										<a href="<?php the_permalink() ?>">
											<div class="blog__item-img">
												<?php the_post_thumbnail() ?>
											</div>
											<div class="blog__item-content">
												<h3 class="blog__item-title"><?php the_title(); ?></h3>
												<span><?php echo get_the_date('d/m/Y'); ?></span>
											</div>
										</a>
									</div>
								<?php
							}
						}
					?>
					</div>
				</div>

				<!-- ==========trend========== -->
				<div id="trend" class="content">
					<div class="blog__all-list">
					<?php
                        $args = array(
                                'post_type' => 'post',
								'posts_per_page' => '4',
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
								<div class="blog__all-item">
									<a href="<?php the_permalink() ?>">
										<div class="blog__item-img">
											<?php the_post_thumbnail() ?>
										</div>
										<div class="blog__item-content">
											<h3 class="blog__item-title"><?php the_title(); ?></h3>
											<span><?php echo get_the_date('d/m/Y'); ?></span>
										</div>
									</a>
								</div>
								<?php
							}
						}
					?>	
					</div>
				</div>

				<!-- ==========work========== -->
				<div id="work" class="content">
					<div class="blog__all-list">
					<?php
                        $args = array(
                                'post_type' => 'post',
								'posts_per_page' => '4',
                                'order' => 'DESC',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'terms' => 12,
                                        
                                    ] 
                                ],
                        );
                        $post_query = new WP_Query($args);
                        
                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                        $post_query->the_post();
								?>	
								<div class="blog__all-item">
									<a href="<?php the_permalink() ?>">
										<div class="blog__item-img">
											<?php the_post_thumbnail() ?>
										</div>
										<div class="blog__item-content">
											<h3 class="blog__item-title"><?php the_title(); ?></h3>
											<span><?php echo get_the_date('d/m/Y'); ?></span>
										</div>
									</a>
								</div>
								<?php
							}
						}
					?>	
					</div>
				</div>

				<!-- ==========casestudies========== -->
				<div id="casestudies" class="content">
					<div class="blog__all-list">
					<?php
                        $args = array(
                                'post_type' => 'post',
								'posts_per_page' => '4',
                                'order' => 'DESC',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'terms' => 11,
                                        
                                    ] 
                                ],
                        );
                        $post_query = new WP_Query($args);
                        
                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                        $post_query->the_post();
								?>	
								<div class="blog__all-item">
									<a href="<?php the_permalink() ?>">
										<div class="blog__item-img">
											<?php the_post_thumbnail() ?>
										</div>
										<div class="blog__item-content">
											<h3 class="blog__item-title"><?php the_title(); ?></h3>
											<span><?php echo get_the_date('d/m/Y'); ?></span>
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
			<div class="blog__listpost-right">
				<div class="recentposts-title">
					<h3>Bài viết gần đây</h3>
				</div>
				<div class="blog__recentposts-list">
				<?php
					$args = array(
						'posts_per_page' => 5, /* how many post you need to display */
						'offset' => 0,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post', /* your post type name */
						'post_status' => 'publish'
					);
					$query = new WP_Query($args);
					if ($query->have_posts()) :
						while ($query->have_posts()) : $query->the_post();
							?>
							<div class="blog__recentposts-item">
								<a href="<?php the_permalink() ?>">
									<div class="recentposts-left">
										<?php the_post_thumbnail() ?>
									</div>
									<div class="recentposts-right">
										<span class="recentpost-time"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/icon-clock.png"
												alt=""><?php echo get_the_date('d/m/Y'); ?></span>
										<p class="recentpost-tt"><?php the_title(); ?></p>
										<a href="<?php the_permalink() ?>">
											<button class="recentpost-btn">Xem thêm <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/icon-arrow.png"
													alt=""></button>
										</a>
									</div>
								</a>
							</div>
							<?php
						endwhile;
					endif;
				?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //////////////////////////////// -->
<div class="blog__listnews">
	<div class="container">
		<div class="blog__listnews-container">
			<h2 class="blog__listnews-heading">Tin hàng đầu trong tuần</h2>

			<div class="blog__listnews-list">
				<?php
					$args = array(
							'post_type' => 'post',
							'order' => 'DESC',
							'tax_query' => [
								[
									'taxonomy' => 'category',
									'terms' => 13,
									
								] 
							],
					);
					$post_query = new WP_Query($args);
					
					if($post_query->have_posts() ) {
						while($post_query->have_posts() ) {
									$post_query->the_post();
							?>		
							<div class="blog__listnews-item">
								<a href="<?php the_permalink() ?>">
									<div class="listnews-img">
										<?php the_post_thumbnail() ?>
									</div>
									<h5 class="listnew-title"><?php the_title(); ?></h5>
									<p class="listnew-text"><?php echo get_post_meta($post->ID, 'short-desc', true); ?></p>
									<div class="listnew-bottom">
										<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/icon-clock.png" alt=""><?php echo get_the_date('d/m/Y'); ?></span>
										<a href="<?php the_permalink() ?>">
											<button class="listnew-btn">Xem thêm <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/icon-arrow.png"
													alt=""></button>
										</a>
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
<!-- ///////////////////////////////// -->
<div class="blog__bottom">
	<div class="blog__may1">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/blog-may1.png" alt="">
	</div>
	<div class="container">
		<div class="blog__bottom-container">
			<div class="avt">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/AVT .png" alt="">
			</div>
			<h2 class="blog__bottom-title">Sáng tạo cùng <span>Mây</span></h2>
			<a href="http://maynetwork.tv/lien-he/">
				<button class="blog__bottom-btn">Liên hệ tại đây <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/icon-arrow2.png"
						alt=""></button>
			</a>
		</div>
	</div>
	<div class="blog__may2">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blogs/blog-may2.png" alt="">
	</div>
</div>
<?php get_footer(); ?>

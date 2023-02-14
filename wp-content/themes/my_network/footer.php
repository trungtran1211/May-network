<?php
/**
 * The template for displaying the footer
 */
wp_reset_postdata();
$fileName = get_field("file_name_css") ?? 'home';
?>
</main>
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="ft-top">
                    <div class="logo-footer">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/logo-ft.png" alt="">
                    </div>
                    <p class="ft-text">67 Hoàng Văn Thái, Phường Tân Phú, Quận 7, Thành phố Hồ Chí Minh</p>
                    <div class="list-social">
                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/ic-fb.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/ic-ig.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/ic-lk.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft-bottom">
            <div class="copyright">
                <span>© 2022 Mây Network | All rights reserved</span>
            </div>
        </div>
    </footer>
     
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
     <script
       type="text/javascript"
       src="https://code.jquery.com/jquery-1.11.0.min.js"
     ></script>
     <script
       type="text/javascript"
       src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
     ></script>
     <script
       type="text/javascript"
       src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
     ></script>
    <script src="<?php echo resolve_style_filename('assets/js/'. $fileName . ".js") ?>"></script>
    <script src="<?php echo resolve_style_filename('assets/js/main.js') ?>"></script>
<?php wp_footer(); ?>
</body>

</html>
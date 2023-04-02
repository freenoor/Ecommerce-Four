<footer>

<hr>

<div class="site_footer">
    <div class="container">
        <div class="row">
            <div class="logo_txt col-lg-4 col-md-4 col-sm-4 col-12">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );  
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>

                    <a class="navbar-brand-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?= $image[0]; ?>" class="img-fluid" alt="">
                    </a>

                    <p><?php dynamic_sidebar('txt_logo_footer'); ?></p>
            </div>
            <div class=" follow_us col-lg-4 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('follow_us'); ?>
                <?php dynamic_sidebar('social_media'); ?>
            </div>
            <div class="contact_us_footer col-lg-4 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('contact_us_adress'); ?>
                <?php dynamic_sidebar('tel'); ?>
                <?php dynamic_sidebar('email'); ?>
            </div>   
        </div>
    </div>
</div>

<div class="container">
    <div class="links_footer">
        <div class="row">
            <div class="information col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('information'); ?>
            </div>
            <div class="service  col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('service'); ?>
            </div>
            <div class="extras col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('extras'); ?>
            </div>   
            <div class=" my_account col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('my_account'); ?>
            </div>
            <div class="userful_links col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('userful_links'); ?>
            </div>
            <div class="our_offers col-lg-2 col-md-4 col-sm-4 col-6">
                <?php dynamic_sidebar('our_offers'); ?>
            </div>
        </div> 
    </div>
</div>

<hr>

<div class="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="copy-right col-lg-6 col-md-6 col-sm-6 ">
                <p>&copy; <?php echo date(' Y');?>.&nbsp;
                <a href="http://adsgroup.ch"> adsgroup</a></p>
            </div>
            <div class=" cart_footer col-lg-6 col-md-6 col-sm-6">
               <?php dynamic_sidebar('img_card_footer'); ?>
            </div>
        </div>
    </div>
</div>

<?php 
wp_footer();
?>
</footer>

</body>
</html>





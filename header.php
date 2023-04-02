<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?php wp_head();?>
    </head>

    <body <?php body_class(); ?>>


    <div class="topheader">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-12 lang_currency">
            
                <div class="gjuha"><?php dynamic_sidebar('language');?></div>
                <div class="currency_1"><?php dynamic_sidebar('currency');?></div>
                
            </div>
            <div class="col-lg-9 col-md-9 col-12 my_profile_cart">
                
                <?php wp_nav_menu(
                    array(
                        'theme_location'    => 'topmenu',
                    )
                    ); 
                ?>
                <!-- <?php dynamic_sidebar('search_pro');?> -->
                <div class="search_header">
                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                        <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search:', 'label', 'woocommerce' ); ?>" />
                        <button type="submit" class="search_button_1" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="fa fa-search"></i></button>
                        <!-- <input type="submit" class="search_button_1" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" /> -->
                        <input type="hidden" name="post_type" value="product" />
                    </form>  
                </div>
                
            </div>
            </div>
        </div>
    </div>


<header class="header1">
    <div class="container">
        <div class="logo_header">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <a class="active" class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?= $image[0]; ?>" class="img-fluid" alt="">
                </a>
        </div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container"> 
            <!-- <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <a class="active" class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?= $image[0]; ?>" class="img-fluid" alt="">
                </a> -->
                    <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="three">
                            <div class="hamburger" id="hamburger-1">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </button>
 
            <!-- The WordPress Primary Menu -->
            <?php wp_nav_menu(
                array(
                    'theme_location'    => 'primary',
                    'menu_class'        => 'navbar-nav ml-auto w-100 justify-content-center',
                    'container_class'  => 'collapse navbar-collapse',
                    'container_id'    => 'navbarNav',
                )
            ); ?>
        </div>         
    </nav>
</header>







<header class="header2">
     <nav class="navbar navbar-expand-lg navbar-dark ">
                  <div class="container"> 
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>
                            <a class="active" class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?= $image[0]; ?>" class="img-fluid" alt="">
                            </a>
                                <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="three">
                    <div class="hamburger" id="hamburger-1">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
            </button>
 
                        <!-- The WordPress Primary Menu -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'    => 'primary',
                                'menu_class'        => 'navbar-nav ml-auto w-100 justify-content-center',
                                'container_class'  => 'collapse navbar-collapse',
                                'container_id'    => 'navbarNav',
                            )
                        ); ?>
              </div>         
        </nav>
</header>





<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>



<script>
    jQuery(document).ready(function(){
    jQuery(".navbar-toggler").click(function(){
    jQuery(".hamburger").toggleClass("is-active");
    });
    });
</script> 


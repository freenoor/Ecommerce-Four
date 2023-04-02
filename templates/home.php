<!-- 
    Template Name:HOME
-->

<?php get_header();?>







<div class="all_slider_home">
  <div class="container">
    <div id="carousel-example-generic" class="carousel slide" >
      <ol class="carousel-indicators">
          <?php
          $args = array(
          'post_type' => 'product',
          'posts_per_page' => '-1',
          );
          $loop = new WP_Query($args);
          $count = 0;
          while($loop->have_posts()):
          $loop->the_post();
          ?>


            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count;?>" class="<?php echo $count == 0 ? 'active' : '';?>"></li>
          <?php
          $count++;
          endwhile;?>

          </ol>
          <div class="carousel-inner">
            <?php
            $count2 = 0;
            while($loop->have_posts()):
            $loop->the_post();
            ?>
                  <div class="carousel-item <?php echo $count2 == 0 ? 'active' : '';?>">
                    <div class="container">
                      <div class="slider_home " data-aos="zoom-in"  data-aos-duration="1000">
                        <div class="row">

                          <div class="col-lg-6 img_home_slider">
                               <?php the_post_thumbnail(); ?>
                          </div>

                          <div class="col-lg-6 content_home_slider" >
                            <h1 ><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>"><button class="read_more_slider_home">MORE</button></a>
                          </div>
                        </div>
                    </div>
                  </div>
            </div>

                <?php
                $count2++;
                endwhile;
                wp_reset_postdata();?>
</div>
<a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
<svg version="1.1" id="Capa_123" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 443.52 443.52" style="enable-background:new 0 0 443.52 443.52;width:30px;height:30px;fill:#000000;" xml:space="preserve">

<path d="M143.492,221.863L336.226,29.129c6.663-6.664,6.663-17.468,0-24.132c-6.665-6.662-17.468-6.662-24.132,0l-204.8,204.8
c-6.662,6.664-6.662,17.468,0,24.132l204.8,204.8c6.78,6.548,17.584,6.36,24.132-0.42c6.387-6.614,6.387-17.099,0-23.712
L143.492,221.863z"/>
</svg>
</a>

<a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
<svg version="1.1" id="Capa_1233" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;width:30px;height:30px;fill:#000000;" xml:space="preserve">
<path d="M388.425,241.951L151.609,5.79c-7.759-7.733-20.321-7.72-28.067,0.04c-7.74,7.759-7.72,20.328,0.04,28.067l222.72,222.105
L123.574,478.106c-7.759,7.74-7.779,20.301-0.04,28.061c3.883,3.89,8.97,5.835,14.057,5.835c5.074,0,10.141-1.932,14.017-5.795
l236.817-236.155c3.737-3.718,5.834-8.778,5.834-14.05S392.156,245.676,388.425,241.951z"/>
</svg>
</a>

</div>

</div>
</div>







    

<section class="all_best_seller_home">
    <div class="container">
        <h1><?php the_field('title_best_seller'); ?></h1>
        <div class="best_seller" >
            <?php dynamic_sidebar('best_seller'); ?>
            <?php echo do_shortcode('[products limit="8" columns="4" best_selling="true"]');?>
        </div>
        <div class="button_load_more">
            <button><a href="<?php the_field('button_load_more_link'); ?>"><?php the_field('button_load_more'); ?></a></button>
        </div>
    </div>
</section>




<section class="section3">
    <div class="container-fluid">
        <div class="div_home3">
            <div class="row">
                <div class="text_div_home3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <h1 data-aos="fade-down"  data-aos-duration="1500"><?php the_field('title_phone'); ?></h1>
                    <p  data-aos="fade-right"  data-aos-duration="1500"><?php the_field('text_phone'); ?></p>
                    <button><a href="<?php the_field('button1_home_link'); ?>"><?php the_field('button1_home'); ?></a></button>
                </div>
                <div class="img_div_home3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <img src="<?php the_field('img_phone'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>







<section class="newsletter">
    <div class="container">
        <div class="subscribe">
            <p class="title_sub"><?php the_field('title_subscribe'); ?>&nbsp<span><?php the_field('title_subscribe2'); ?></span></p>
            <p class="text_sub"><?php the_field('text_subscribe'); ?></p>
            <?php dynamic_sidebar('subscribe'); ?>
        </div>
    </div>
</section>



<?php get_footer();?>

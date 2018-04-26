<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 23/4/18
 * Time: 11:41 AM
 */
get_header(); ?>

<div class="banner-section">
    <div class="banner-area">
        <div class="banner-text-area">
            <h2>Activities</h2>
            <span class="border-left"></span><span class="border-right"></span>
        </div>
    </div>
    <span class="left-white-area"></span><span class="right-white-area"></span>
</div>
<div class="content-area">
    <section class="inner-pages">
        <div class="container">
            <div class="row">
                <?php
                // Start the post loop.
                if (have_posts()): while (have_posts()) :
                    the_post();
                    $sub_id = get_the_ID();
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="activities">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                    <div class="insider-heading">
                                        <div class="insider-img"><?php echo get_the_post_thumbnail(get_the_ID(), "activities_page"); ?></div>
<!--                                        <div class="insider-img"><img src="--><?php //echo get_template_directory_uri()?><!--/assets/img/activities-img.jpg" alt="" class="img-responsive"></div>-->
                                        <h2 class="block-heading"><?php the_title(); ?></h2>
                                        <span class="date-stamp-normal"><?php echo get_the_date(); ?></span>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                    <div class="social-sharing">
                                        <h3>Share this story on:</h3>
                                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                           class="facebook" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>
                                        <a href="http://twitter.com/intent/tweet/?text=<?php the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                                           class="twitter" target="_blank"><span><i class="fab fa-twitter"></i></span></a>
<!--                                        <a href="" class="instagram"><span><i class="fab fa-instagram"></i></span></a>-->
                                        <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php the_title(); ?>"
                                           class="pinterest" target="_blank"><span><i class="fab fa-pinterest-p"></i></span></a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                    <div class="sidebar">
                                        <h2>Activity List</h2>
                                        <ul>
                                            <?php $args = array('post_type' => 'activities', 'posts_per_page' => 10);
                                            $loop = new WP_Query($args);
                                            $i = 0;
                                            while ($loop->have_posts()) : $loop->the_post();
                                                $class = "";
                                                $subid = get_the_ID();
                                                if ($sub_id === $subid) {
                                                    $class = "active";
                                                } ?>
                                                <li class="<?php echo $class; ?>"><a
                                                            href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                                </li>
                                                <?php $i++; endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
</div>
</div>
<?php get_footer(); ?>
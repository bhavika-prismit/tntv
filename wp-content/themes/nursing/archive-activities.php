<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 26/4/18
 * Time: 11:37 AM
 */
get_header();
$url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
?>
<div class="banner-section">
    <div class="banner-area" style="background-image:url(<?php echo $url; ?>)">
        <div class="banner-text-area">
            <?php if (is_post_type_archive()) { ?>
                <h2><?php post_type_archive_title(); ?></h2>
            <?php } ?>
            <span class="border-left"></span><span class="border-right"></span>
        </div>
    </div>
    <span class="left-white-area"></span><span class="right-white-area"></span>
</div>
<div class="content-area">
    <section class="courses">
        <div class="container archive-all">
            <div class="row for-flex">
                <?php
                $paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
                $args = array(
                    'post_type' => 'activities',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                );
                $activities = new WP_Query($args);
                if ($activities->have_posts()) : while ($activities->have_posts()) : $activities->the_post();

                        $image = get_field('banner');
                        $url = get_the_post_thumbnail_url(get_the_ID(), "courses_offer");
                        if ($url == "") {
                            $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
                        }
                        $nameplate = get_field('name_plate');
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="frame">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <div class="frame-pic">
                                        <img src="<?php echo $url; ?>"
                                             class="img-responsive" alt="">
                                    </div>
                                    <div class="frame-nameplate">
                                        <span><?php the_title(); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
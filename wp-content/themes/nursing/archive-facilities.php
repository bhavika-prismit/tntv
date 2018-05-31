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
        <section class="inner-pages">
            <div class="container archive-all">
                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                $args = array(
                    'post_type' => 'facilities',
                    'posts_per_page' => 25,
                    'paged' => $paged,
                );
                $loop = new WP_Query($args); ?>

                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                    <div class='facilities'>
                        <div class='row'>
                            <?php
                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <div id="<?php echo get_field('icon_class'); ?>">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        <div class="facilities-icons">
                                            <?php $icon = get_field('icon_class');
                                            if (isset($icon) && $icon != "") { ?>
                                                <span><i class="<?php echo get_field('icon_class'); ?>"></i></span>
                                            <?php } else { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                                        <div class="text-area">
                                            <h3><?php the_title(); ?></h3>
                                            <p><?php
                                                $str = "";
                                                $str = get_the_content();
                                                $length = strlen($str);
                                                $str = substr($str, 0, 500);
                                                if ($length > 500) {
                                                    $str .= " ......<a href=" . get_post_permalink() . ">Read More</a>";
                                                }
                                                echo $str; ?></p>
                                            <?php //$thumbnail = get_the_post_thumbnail();
                                            $thumbnail = get_post_thumbnail_id();
                                            if ($thumbnail != "") { ?>
                                                <?php echo wp_get_attachment_image($thumbnail, "facilities_page"); ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
                ?>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
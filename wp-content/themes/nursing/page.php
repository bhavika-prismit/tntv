<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 18/4/18
 * Time: 5:53 PM
 */
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    global $post;
    $image = get_field('banner');
    if (isset($image['url'])) {
        // $url = $image['url'];
        $url = wp_get_attachment_url($image['id'], "banner");
        // $url = $image['sizes']['banner'];
    } else {
        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
    }
    $nameplate = get_field('name_plate');
    $slider = get_field('slider'); ?>

    <?php
    if ($slider != "") {
        echo '<div class="n2s-slider">';
        echo($slider);
        $slider_title = get_field('slider_title');
        if (isset($slider_title) && $slider_title[0] == 1) { ?>
            <div class="slider-title">
                <h2><?php the_title(); ?></h2>
                <span class="border-left"></span><span class="border-right"></span>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        ?>
        <div class="banner-section">
            <div class="banner-area" style="background-image:url(<?php echo $url; ?>)">
                <div class="banner-text-area">
                    <h2><?php the_title(); ?></h2>
                    <span class="border-left"></span><span class="border-right"></span>
                </div>
            </div>
            <span class="left-white-area"></span><span class="right-white-area"></span>
        </div>
    <?php } ?>

    <div class="content-area">
        <section class="inner-pages">
            <div class="container">
                <div class="row">
                    <?php //$thumbnail = get_the_post_thumbnail();
                    $thumbnail = get_post_thumbnail_id();
                    if ($thumbnail != "") { ?>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 margin-15">
                            <div class="left-side">
                                <?php echo wp_get_attachment_image($thumbnail, 'single_page');
                                if ($nameplate != "") {
                                    ?>
                                    <span class="nameplate-insidepage"><?php echo $nameplate; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="right-side for-padding"><?php
                        if ((get_the_content()) != "") {
                            the_content();
                        } else {
                            ?>
                            <h2 style='text-align: center'>Comming soon..............</h2>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endwhile; endif;
get_footer(); ?>
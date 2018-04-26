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
                <?php if (is_post_type_archive()) {?>
                        <h2><?php post_type_archive_title(); ?></h2>
                        <?php } ?>
                <span class="border-left"></span><span class="border-right"></span>
            </div>
        </div>
        <span class="left-white-area"></span><span class="right-white-area"></span>
    </div>
<?php if (have_posts()) : while (have_posts()) : the_post();
    $image = get_field('banner');
    if (isset($image['url'])) {
        $url = $image['url'];
    } else {
        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
    }
    $nameplate = get_field('name_plate');?>
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
                    <div class="right-side for-padding">
                        <h3><?php the_title();?></h3>
                        <?php
                        if ((get_the_content()) != "") {
                            the_content();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endwhile; endif;
get_footer(); ?>
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
                <?php if (have_posts()) : while (have_posts()) : the_post();
            
                    $image = get_field('banner');
                    $url =  get_the_post_thumbnail_url(get_the_ID(), "courses_offer");
                    if($url == "") {
                        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
                    }
                    $nameplate = get_field('name_plate'); ?>

                    <!-- <div class="row">
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
                        <a href="<?php echo get_the_permalink();?>">
                            <h3><?php the_title(); ?></h3>
                            </a>
                            <?php
                            if (get_the_content() != "") {
                                    $str = get_the_content();
                                    $length = strlen($str);                                
                                    $str = substr($str, 0, 600);
                                    if ($length > 600) {
                                        $str .= "...";
                                    }
                                    echo $str;
                                }
                            ?>
                        </div>
                    </div> -->

                    
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="frame">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <div class="frame-pic">
                                        <img src="<?php echo $url;?>"
                                             class="img-responsive" alt="">
                                    </div>
                                    <div class="frame-nameplate">
                                        <span><?php the_title(); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                       
                <?php endwhile; endif; ?>
            </div>
             </div>
        </section>
    </div>
<?php get_footer(); ?>
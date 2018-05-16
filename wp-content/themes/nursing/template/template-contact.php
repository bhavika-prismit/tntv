<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 23/4/18
 * Time: 6:11 PM
 */
/* Template Name: Contact */
get_header();
$content = get_option('general_settings');
if (have_posts()) : while (have_posts()) : the_post();
$image = get_field('banner');
    if (isset($image['url'])) {
        $url = $image['url'];
    } else {
        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
    }
?>
<div class="banner-section">
    <div class="banner-area" style="background-image:url(<?php echo $url;?>)">
        <div class="banner-text-area">
            <h2><?php the_title(); ?></h2>
            <span class="border-left"></span><span class="border-right"></span>
        </div>
    </div>
    <span class="left-white-area"></span><span class="right-white-area"></span>
</div>
<div class="content-area">
    <section class="inner-pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us">
                        <input type="hidden" id="contact" value="1">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="contact-form">
                                    <h2 class="block-heading">Contact Us</h2>
                                    <?php echo do_shortcode('[contact-form-7 id="295" title="Contact form 1"]'); 
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="contact-form">
                                    <h2 class="block-heading">Contact Details</h2>
                                    <div id="map1"></div>
                                    <div class="conatct-address">
                                        <p class="address"><?php echo isset($content['address']) ? $content['address'] : "";
                                            echo isset($content['city']) ? ", " . $content['city'] : "";
                                            echo isset($content['pincode']) ? " - " . $content['pincode'] : "";
                                            echo isset($content['state']) ? ", " . $content['state'] : "";
                                            echo isset($content['country']) ? ", " . $content['country']."." : "";
                                            ?>
                                        </p>
                                        <p class="phone">
                                             <a href="tel:<?php echo isset($content['phone']) ? '+91' . $content['phone'] : ''; ?>"><?php echo isset($content['phone']) ? "+91" . $content['phone'] : ""; ?></a>
                                        </p>
                                        <p class="mobile">
                                        <a href="tel:<?php echo isset($content['mobile']) ? '+91' . $content['mobile'] : ''; ?>"><?php echo isset($content['mobile']) ? "+91" . $content['mobile'] : ""; ?></a>
                                        </p>
                                        <p class="email">
                                         <a href="mailto:<?php echo isset($content['email']) ? $content['email'] : ''; ?>">Email: <?php echo isset($content['email']) ? $content['email'] : ""; ?></a>                               
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<?php endwhile; endif; get_footer(); ?>

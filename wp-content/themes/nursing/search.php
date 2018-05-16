<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 25/4/18
 * Time: 5:32 PM
 */
get_header();
$url = get_template_directory_uri() . '/assets/img/slider-01.jpg'; ?>
    <div class="banner-section">
        <div class="banner-area" style="background-image:url(<?php echo $url; ?>)">
            <div class="banner-text-area">
                <h2><?php printf(__('Search Results for: %s', 'nursing'), get_search_query()); ?></h2>
                <span class="border-left"></span><span class="border-right"></span>
            </div>
        </div>
        <span class="left-white-area"></span><span class="right-white-area"></span>
    </div>
    <div class="content-area">
    <section class="inner-pages">
        <div class="container">
        <?php if (have_posts()) {
            while (have_posts()) : the_post();
                if (is_search() && ($post->post_type == 'slider')) {
                    continue;
                }
                ?>
                <div class="search-result">
                        <div class="row">                        
                            <div class="for-padding">
                            <a href="<?php the_permalink();?>">
                            <h3><?php the_title(); ?></h3></a><?php
                                if ((get_the_content()) != "") {
                                    echo wp_trim_words( get_the_content(), 55 ,'...');
                                } ?>
                            </div>
                        </div>
                 </div>   
            <?php endwhile;
        } else { ?>
            <h2 style="text-align: center">No Record Found</h2>
        <?php } ?>
        </div>
        </section>
    </div>
<?php get_footer(); ?>
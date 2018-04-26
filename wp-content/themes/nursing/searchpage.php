<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 25/4/18
 * Time: 5:41 PM
 */
/*
Template Name: Search Page
*/
?>
<?php
get_header();
?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
                        <?php if (have_posts()) : ?>
                            <header class="page-header">
                                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h1>
                            </header><!-- .page-header -->

                            <?php shape_content_nav('nav-above'); ?>

                            <?php /* Start the Loop */ ?>
                            <?php while (have_posts()) : the_post(); ?>

                                <?php get_template_part('content', 'search'); ?>

                            <?php endwhile; ?>

                            <?php shape_content_nav('nav-below'); ?>

                        <?php else : ?>

                            <?php get_template_part('no-results', 'search'); ?>

                        <?php endif; ?>

                    </div><!-- #content .site-content -->
                </section><!-- #primary .content-area -->
                <?php get_search_form(); ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer(); ?>
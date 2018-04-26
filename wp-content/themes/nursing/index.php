<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php
    // Start the loop.
    while (have_posts()) : the_post();
        echo get_the_title();
        the_content();
        echo '<br />';
    endwhile;

// If no content, include the "No posts found" template.
else :
    get_template_part('content', 'none');

endif;
?>

<?php get_footer(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 11/4/18
 * Time: 5:20 PM
 */
/* Template Name: Home */
get_header(); ?>

    <div class="carosoul-area">
        <div id="myCarousels" class="carousel slide" data-ride="carousel" data-interval="false">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousels" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousels" data-slide-to="1"></li>
                <li data-target="#myCarousels" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->

            <div class="carousel-inner">
                <?php $args = array('post_type' => 'sliders', 'posts_per_page' => 10);
                $loop = new WP_Query($args);
                $i = 0;
                while ($loop->have_posts()) : $loop->the_post();
                    $image = get_field('slider');
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('slider-image');
                    }
                    $class = "item";
                    if ($i == 0) {
                        $class = "item active";
                    }
                    ?>
                    <div class="<?php echo $class; ?>">
                        <?php
                        if (get_field('slider')):
                            if (!empty($image)): ?>
                                <?php echo wp_get_attachment_image($image['id'], 'page_slider'); ?>
                                <!-- Static Header -->
                                <div class="header-text text-center hidden-xs">
                                    <div class="main_title ">
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_content(); ?></p>
                                        <span class="border-left"></span><span class="border-right"></span>
                                    </div>

                                </div><!-- /header-text -->
                            <?php endif;
                        endif;
                        ?>
                    </div>
                    <?php $i++; endwhile; ?>
            </div>

            <!-- Controls -->
            <span class="container-arrow">
				<a class="left carousel-control" href="#myCarousels" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#myCarousels" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
            </span>
        </div><!-- /carousel -->

        <span class="left-white-area"></span><span class="right-white-area"></span>
    </div>
    <div class="content-area">
        <section class="intro">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="content-allignment">
                                <?php
                                $content = get_option('home_about_content');
                                for ($i = 1; $i <= 4; $i++) {
                                    if (isset($content['title' . $i]) || isset($content['avatar' . $i]) || isset($content['description' . $i])) {
                                        ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="top-blocks">
                                                <?php if (isset($content['title' . $i])) { ?>
                                                    <h2 class="block-heading"><?php echo $content['title' . $i]; ?></h2>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4 picture-area">
                                                        <?php if (isset($content['avatar' . $i]) && $content['avatar' . $i] != "") { ?>
                                                            <div class="image-block">
                                                                <?php echo wp_get_attachment_image($content['avatar' . $i],"home_content"); ?>
                                                                <?php if (isset($content['avatar_name' . $i]) && $content['avatar_name' . $i] != "") {
                                                                    echo "<span class='nameplate'>" . $content['avatar_name' . $i] . "</span>";
                                                                } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 text-area">
                                                        <div class="text-block">
                                                            <p><?php echo isset($content['description' . $i]) ?
                                                                    stripslashes(trim($content['description' . $i])) : ""; ?></p>
                                                            <?php if (isset($content['read_more' . $i]) && $content['read_more' . $i] != "") { ?>
                                                                <a class="readmore"
                                                                   href="<?php echo isset($content['read_more' . $i]) ? trim($content['read_more' . $i]) : ""; ?>">Read
                                                                    More</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $content = get_option('our_facility_content');
        if (isset($content) && $content['visible'] == 1) {
            ?>
            <section class="facilities">
                <div class="container">
                    <?php if (isset($content['main_title'])) { ?>
                        <div class="section-header">
                            <h2><?php echo isset($content['main_title']) ? $content['main_title'] : ""; ?></h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 border-bottom"></div>
                        </div>
                    <?php } ?>
                    <div class="row for-rearrange">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 left-col">
                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                                if (isset($content['title' . $i]) || isset($content['description' . $i])) { ?>

                                    <div class="facilities-block">
                                        <div class="facilities-text">
                                            <h3><?php echo isset($content['title' . $i]) ? $content['title' . $i] : ""; ?></h3>
                                            <p><?php echo isset($content['description' . $i]) ?
                                                    stripslashes(trim($content['description' . $i])) : ""; ?></p>
                                            <?php if (isset($content['read_more' . $i]) && $content['read_more' . $i] != "") { ?>
                                                <a class="readmore"
                                                   href="<?php echo isset($content['read_more' . $i]) ? trim($content['read_more' . $i]) : ""; ?>">Read
                                                    More</a>
                                            <?php } ?>
                                        </div>
                                        <?php if (isset($content['icon_class' . $i]) && $content['icon_class' . $i] != "") { ?>
                                            <div class="facilities-icons"><span><i
                                                            class="<?php echo isset($content['icon_class' . $i]) ? trim($content['icon_class' . $i]) : ""; ?>"></i></span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                <?php }
                            } ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 center-col">
                            <div class="facilities-main-image">
                                <img class="img-responsive"
                                     src="<?php echo get_template_directory_uri(); ?>/assets/img/nurse.png"
                                     alt="T & TV Facilities">
                            </div>
                            <?php if (isset($content['view_all']) && $content['view_all'] != "") { ?>
                                <div class="button-area">
                                    <a href="<?php echo $content['view_all']; ?>">
                                        <button type="button" class="btn custom-btn btn-big">View All
                                        </button>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 right-col">
                            <?php
                            $content = get_option('our_facility_content');
                            for ($i = 4; $i <= 6; $i++) {
                                if (isset($content['title' . $i]) || isset($content['description' . $i])) { ?>

                                    <div class="facilities-block">
                                        <?php if (isset($content['icon_class' . $i]) && $content['icon_class' . $i] != "") { ?>
                                            <div class="facilities-icons"><span><i
                                                            class="<?php echo isset($content['icon_class' . $i]) ? trim($content['icon_class' . $i]) : ""; ?>"></i></span>
                                            </div>
                                        <?php } ?>
                                        <div class="facilities-text">
                                            <h3><?php echo isset($content['title' . $i]) ? $content['title' . $i] : ""; ?></h3>
                                            <p><?php echo isset($content['description' . $i]) ?
                                                    stripslashes(trim($content['description' . $i])) : ""; ?></p>
                                            <?php if (isset($content['read_more' . $i]) && $content['read_more' . $i] != "") { ?>
                                                <a class="readmore"
                                                   href="<?php echo isset($content['read_more' . $i]) ? trim($content['read_more' . $i]) : ""; ?>">Read
                                                    More</a>
                                            <?php } ?>
                                        </div>

                                    </div>

                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <section class="courses">
            <div class="container">
                <div class="section-header"><h2>Our Courses</h2></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 border-bottom"></div>
                </div>
                <div class="row for-flex">
                    <?php $args = array('post_type' => 'courses', 'posts_per_page' => 3);
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        $url = get_the_post_thumbnail_url(get_the_ID(), "courses_offer");
                        if ($url == "") {
                            $url = get_template_directory_uri() . '/assets/img/logo.png';
                        }

                        ?>
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
                    <?php endwhile; ?>
                </div>
            </div>
        </section>


        <!--        --><?php //$content = get_option('course_offered');
        //        if (isset($content) && $content['visible'] == 1) {
        //            ?>
        <!--            <section class="courses">-->
        <!--                <div class="container">-->
        <!--                    --><?php //if (isset($content['main_title']) && $content['main_title'] != "") { ?>
        <!--                        <div class="section-header"><h2>-->
        <?php //echo $content['main_title']; ?><!--</h2></div>-->
        <!--                    --><?php //} ?>
        <!--                    <div class="row">-->
        <!--                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 border-bottom"></div>-->
        <!--                    </div>-->
        <!--                    <div class="row for-flex">-->
        <!--                        --><?php
        //                        for ($i = 1; $i <= 3; $i++) {
        //                            if (isset($content['avatar' . $i]) && $content['avatar' . $i] != "" && isset($content['title' . $i])) {
        //                                ?>
        <!--                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">-->
        <!--                                    <div class="frame">-->
        <!--                                        <a href="-->
        <?php //echo isset($content['read_more' . $i]) ? $content['read_more' . $i] : ""; ?><!--">-->
        <!--                                            <div class="frame-pic">-->
        <!--                                                --><?php //echo wp_get_attachment_image($content['avatar' . $i], "courses_offer"); ?>
        <!--                                            </div>-->
        <!--                                            <div class="frame-nameplate">-->
        <!--                                                <span>-->
        <?php //echo $content['title' . $i]; ?><!--</span>-->
        <!--                                            </div>-->
        <!--                                        </a>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            --><?php //}
        //                        } ?>
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </section>-->
        <!--        --><?php //}?>
        <?php $content = get_option('eligibility_content');
        if (isset($content) && $content['visible'] == 1) {
            ?>
            <section class="eligibility">
                <div class="container">
                    <?php if (isset($content['main_title']) && $content['main_title'] != "") { ?>
                        <div class="section-header"><h2><?php echo $content['main_title']; ?></h2></div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 border-bottom"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="section-sub-heading"><?php echo isset($content['sub_heading']) ? trim($content['sub_heading']) : ""; ?></span>
                            <?php
                            $count = count($content['course_req']);
                            if ($count > 0) { ?>
                                <div class="table-area">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Nursing Programs</th>
                                            <th>Eligibility Criteria</th>
                                            <th>Age Criteria</th>
                                            <th>Training Duration</th>
                                            <th>Examination</th>
                                            <th>Registration</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i = 0; $i < $count; $i++) { ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['program']) ? $content['course_req'][$i]['program'] : ""; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['eligibility']) ? $content['course_req'][$i]['eligibility'] : ""; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['age']) ? $content['course_req'][$i]['age'] : ""; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['duration']) ? $content['course_req'][$i]['duration'] : ""; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['examination']) ? $content['course_req'][$i]['examination'] : ""; ?></td>
                                                <td><?php echo isset($content['course_req'][$i]['registartion']) ? $content['course_req'][$i]['registartion'] : ""; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                            <div class="section-sub-header">
                                <h3><?php echo isset($content['footer_title']) ? trim($content['footer_title']) : ""; ?></h3>
                                <p><?php echo isset($content['description']) ? stripslashes(trim($content['description'])) : ""; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
        $args = array('post_type' => 'activities', 'posts_per_page' => 10);
        $loop = new WP_Query($args);
        $post = get_posts($args);
        ?>
        <section class="recent">
            <div class="overflow-control">
                <div class="container">
                    <div class="section-header"><h2>Recent Activities</h2></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 border-bottom"></div>
                    </div>
                    <div class="slider">
                        <?php
                        $count = count($post);
                        if ($count > 0) {
                            for ($i = 0; $i < $count; $i++) {
                                $url = get_the_post_thumbnail_url($post[$i]->ID, "recent_activity");
                                if ($url == "") {
                                    $url = get_template_directory_uri() . '/assets/img/logo.png';
                                }

                                ?>
                                <div class="slides">
                                <a href="<?php echo get_post_permalink($post[$i]->ID); ?>">
                                    <div class="slide-pic">
                                        <span class="date-stamp"><?php echo date('d M Y', strtotime($post[$i]->post_date)); ?></span>
                                        <img src="<?php echo $url; ?>"
                                             class="img-responsive" alt="">
                                    </div>
                                    <h4><?php echo isset($post[$i]->post_title) ? $post[$i]->post_title : ""; ?></h4>
                                    <p><?php if (isset($post[$i]->post_content)) {
                                            $str = $post[$i]->post_content;
                                            $length = strlen($str);
                                            $str = substr($str, 0, 50);
                                            if ($length > 50) {
                                                $str .= "...";
                                            }
                                            echo $str;
                                        } ?></p>
                                    <div class="for-border">
                                        <a class="slide-readmore"
                                           href="<?php echo get_post_permalink($post[$i]->ID); ?>">Read
                                            More</a>
                                    </div>
                                    </a>
                                </div>
                                <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
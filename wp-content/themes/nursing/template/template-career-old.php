<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 24/4/18
 * Time: 11:14 AM
 */
/* Template Name: Career */
get_header();
global $post, $errorMsg,$message;
if (have_posts()) : while (have_posts()) : the_post();
    $image = get_field('banner'); 
    if (isset($image['url'])) {
        $url = $image['url'];
    } else {
        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
    }?>
    <style type="text/css">
        .errorMsg {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            display: block;
            background-color: rgbA(0, 0, 0, 0.5);
            z-index: 100;
        }

        .message {
            color: red;
            font-weight: bold;
            border: 1px solid red;
            display: inline-block;
            padding: 20px 30px;
            min-width: 300px;
            text-align: center;
            background-color: #f0f0f0;
            position: absolute;
            left: 50%;
            top: 300px;
            transform: translateX(-50%);
        }

        .errorMsg button {
            position: absolute;
            top: 341px;
            left: 50%;
        }
    </style>

    <div class="banner-section">
        <div class="banner-area" style="background-image:url(<?php echo $url; ?>)">
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
                        <div class="careers">
                            <div class="row">
                            <?php if(get_the_content() != ""){?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="insider-heading">
                                        <h2 class="block-heading">Job / Vacancy Title</h2>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="vaccancy-form">
                                        <h2 class="block-heading">Application form</h2>
                                        <?php print_r($message);?>
                                        <form class="form-group" id="applicationForm" name="applicationForm"
                                              method="post" enctype="multipart/form-data">

											 <span class="name">
													<label for="name">Name</label>
													<input type="text" id="name" name="name" required="">
												</span>
                                            <span class="email">
													<label for="email">Email</label>
													<input type="email" id="email" name="email" required="">
												</span>
                                            <span class="address">
													<label for="address">Address</label>
													<input type="text" id="address" name="address" required="">
												</span>
                                            <span class="post">
													<label for="ptitle">Professional Title</label>
													<input type="text" id="ptitle" name="ptitle" required="">
												</span>
                                            <span class="photo">
													<label for="photoupload">Upload Photo</label>
													<input type="file" id="photoupload" name="photoupload" >
												</span>
                                            <span class="resume">
													<label for="resumeupload">Upload Resume</label>
													<input type="file" id="resumeupload" name="resumeupload" required="">
												</span>
                                            <span>
											    <button type="submit" name="application_submit"
                                                        class="btn send-message">Send Message</button>
                                            </span>
                                            <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
<!--                                            <input type="hidden" name="action" value="submit_applicationform">-->

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endwhile; endif;
get_footer(); ?>
<?php $msg = $_GET['msg'];
if (isset($msg)) {
    if ($msg == false) {
        $message = "Successfully inserted.";
    } else {
        $message = "Invalid Detail.";
    }
    echo "<div class='errorMsg'><p class='message'>" . $message . "</p><button class='close'>OK</button></div>";
} ?>

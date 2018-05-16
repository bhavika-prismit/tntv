<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 24/4/18
 * Time: 11:14 AM
 */
/* Template Name: Career */
get_header();
global $post, $errorMsg, $message;
if (have_posts()) : while (have_posts()) : the_post();
    $image = get_field('banner');
    if (isset($image['url'])) {
        $url = $image['url'];
    } else {
        $url = get_template_directory_uri() . '/assets/img/slider-01.jpg';
    } ?>
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
                        <div class="vaccancy-form">
                            <div class="row">
                                <?php if (get_the_content() != "") { ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="insider-heading">
                                            <h2 class="block-heading">Job / Vacancy Title</h2>
                                            <p><?php the_content(); ?></p>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="">
                                        <h2 class="block-heading">Application form</h2>
                                        <?php $msg = $_GET['msg'];

                                        if (isset($msg)) {
                                            if ($msg == false) {
                                                $message = "Application successfully submitted.";
                                                $class = "career-message";
                                            } else {
                                                $message = "Invalid Detail.";
                                                $class = "career_error_msg";
                                            }
                                            echo '<p class="' . $class . '">' . $message . '</p>';
                                            // echo "<div class='errorMsg'><p class='message'>" . $message . "</p><button class='close'>OK</button></div>";
                                        } ?>
                                        <form action="<?php the_permalink(); ?>" class="form-group" id="applicationForm"
                                              name="applicationForm"
                                              method="post" enctype="multipart/form-data">
                                            <?php wp_nonce_field('add-item', 'pf_added'); ?>
                                            <span class="name">
													<label for="applicant_name">Name</label>
													<input type="text" id="applicant_name" name="applicant_name"
                                                           value="">
												</span>
                                            <span class="email">
													<label for="email">Email</label>
													<input type="email" id="email" name="email" value="">
												</span>

                                            <span class="post">
													<label for="ptitle">Professional Title</label>
													<input type="text" id="ptitle" name="ptitle" value="">
												</span>
                                            <span class="photo">
													<label for="photoupload">Upload Photo</label>
													<input type="file" id="photoupload" name="photoupload">
												</span>
                                            <span class="address">
                                                    <label for="address">Address</label>
                                                    <textarea type="text" id="address" name="address" value=""
                                                              cols="100" row="3"></textarea>
                                                </span>
                                            <span class="resume">
													<label for="resumeupload">Upload Resume</label>
													<input type="file" id="resumeupload" name="resumeupload">
												</span>
                                            <span class="captcha">
                                                    <div class="g-recaptcha" data-sitekey="6LcqEFkUAAAAACwrAlRskuyvgdKckV5RInEu-eNd"></div>
                                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                                 </span>
                                            <span>
                                            <input type="submit" id="application_submit" name="application_submit"
                                                   class="btn send-message" value="Send Application">

                                                <!-- <button type="submit" name="application_submit"
                                                        class="btn send-message">Send Message</button> -->
                                            </span>

                                            <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">

                                            <input type="hidden" name="action" value="submit_applicationform">
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
<?php endwhile; endif; ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
get_footer(); ?>

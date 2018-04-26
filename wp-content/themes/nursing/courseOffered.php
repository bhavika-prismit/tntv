<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 16/4/18
 * Time: 3:09 PM
 */

wp_enqueue_media();
$content = get_option('course_offered');
?>
<div class="wrap courses-offered">
    <h1>Courses Offered</h1><br>
    <form class="form-group" name="courseOfferContent" id="courseOfferContent" method="post" action="#" enctype="multipart/form-data">

        <div class="container">
            <div class="row ">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Visible on Live</label>
                        </div>
                        <div class="col-sm-8 form-group">
                            <input type="checkbox" name="visible"
                                   value="1" <?php if (isset($content['visible']) && $content['visible'] == 1) {
                                echo "checked";
                            } ?>> </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Main Title</label>
                        </div>
                        <div class="col-sm-8 form-group">
                            <input type="text" name="main_title"
                                   value="<?php echo isset($content['main_title']) ? trim($content['main_title']) : ""; ?>">
                        </div>
                    </div>
                </div>
                <?php for ($i = 1; $i <= 3; $i++) { ?>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Title <?php echo $i; ?></label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="title<?php echo $i; ?>"
                                       value="<?php echo isset($content['title' . $i]) ? trim($content['title' . $i]) : ""; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Avatar <?php echo $i; ?></label>
                                <div class="avatar<?php echo $i; ?>"><?php echo wp_get_attachment_image($content['avatar' . $i]); ?></div>
                            </div>
                            <div class="col-sm-8 form-group">
                                <button data-id="avatar<?php echo $i; ?>" class="upload-custom-img">Add Media</button>
                                <input type="hidden" name="avatar<?php echo $i; ?>" id="avatar<?php echo $i; ?>"
                                       value="<?php echo isset($content['avatar' . $i]) ? $content['avatar' . $i] : ""; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Read More Link <?php echo $i; ?></label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="read_more<?php echo $i; ?>"
                                       value="<?php echo isset($content['read_more'.$i]) ? trim($content['read_more'.$i]) : ""; ?>">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <button type="submit" name="course_offered_submit" id="course_offered_submit">Submit</button>
    </form>
</div>
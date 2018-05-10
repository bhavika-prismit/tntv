<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 13/4/18
 * Time: 5:21 PM
 */
wp_enqueue_media();
$content = get_option('home_about_content');
?>
<div class="wrap home-content">
	<div class="row">
    <div class="col-sm-3 for-padding">
	<h1>Home Page Content</h1>
	</div>
	</div>
    <form class="form-group" name="homeContent" id="homeContent" method="post" action="#" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
				<div class="row">
                        <?php for ($i = 1;$i <= 4;$i++) {
                         ?>
                            <div class="col-sm-6">
                                <div class="toggle-blocks">
                                    <h3 class="toggle-head"><?php echo isset($content['title' . $i]) ? trim($content['title' . $i]) : ""; ?></h3>
                                    <div class="toggle-body">
                                        <div class="toggle-body-inner">
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-sm-8 form-group">
                                                    <input type="text" name="title<?php echo $i; ?>"
                                                           value="<?php echo isset($content['title' . $i]) ? trim($content['title' . $i]) : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Description</label>
                                                </div>
                                                <div class="col-sm-8 form-group">
									<textarea type="text" name="description<?php echo $i; ?>" cols="19"
                                              rows="3"><?php echo isset($content['description' . $i]) ? stripslashes(trim($content['description' . $i])) : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Avatar</label>
                                                </div>
                                                <div class="col-sm-8 form-group">
                                                    <div class="avatar avatar<?php echo $i; ?>"><?php echo wp_get_attachment_image($content['avatar' . $i]); ?></div>
                                                    <button data-id="avatar<?php echo $i; ?>" class="upload-custom-img">
                                                        Add Media
                                                    </button>
                                                    <input type="hidden" name="avatar<?php echo $i; ?>"
                                                           id="avatar<?php echo $i; ?>"
                                                           value="<?php echo isset($content['avatar' . $i]) ? $content['avatar' . $i] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Avatar Name</label>
                                                </div>
                                                <div class="col-sm-8 form-group">
                                                    <input type="text" name="avatar_name<?php echo $i; ?>"
                                                           value="<?php echo isset($content['avatar_name' . $i]) ? trim($content['avatar_name' . $i]) : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Read More Link</label>
                                                </div>
                                                <div class="col-sm-8 form-group">
                                                    <input type="text" name="read_more<?php echo $i; ?>"
                                                           value="<?php echo isset($content['read_more' . $i]) ? trim($content['read_more' . $i]) : ""; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <button class="default" type="submit" name="content_submit" id="content_submit">Submit</button>
            <div>
    </form>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 13/4/18
 * Time: 5:21 PM
 */
$content = get_option('our_facility_content');
?>
<div class="wrap facility_content">
    <div class="row">
        <div class="col-sm-3">
            <h1>Facility Content</h1>
        </div>
        <form class="form-group" name="facilityContent" id="facilityContent" method="post" action="#"
              enctype="multipart/form-data">
            <div class="col-sm-2 for-padding">
                <input type="checkbox" name="visible"
                       value="1" <?php if (isset($content['visible']) && $content['visible'] == 1) {
                    echo "checked";
                } ?>> (Visible on live)
        </div>
    </div>
    <div class="container">
        <div class="top-labels">
		<div class="row ">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>View All Link</label>
                    </div>
                    <div class="col-sm-8 form-group">
                        <input type="text" name="view_all"
                               value="<?php echo isset($content['view_all']) ? trim($content['view_all']) : ""; ?>">
                    </div>
                </div>
            </div>
        </div>
		<div class="row ">
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
        </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
			<div class="row">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
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
                                            <label>Icon class</label>
                                        </div>
                                        <div class="col-sm-8 form-group">
                                            <input type="text" name="icon_class<?php echo $i; ?>"
                                                   value="<?php echo isset($content['icon_class' . $i]) ? trim($content['icon_class' . $i]) : ""; ?>">
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
        <button class="default" type="submit" name="facility_submit" id="facility_submit">Submit</button>
    </div>
    </form>
</div>
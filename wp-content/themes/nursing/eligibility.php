<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 16/4/18
 * Time: 4:18 PM
 */
$content = get_option('eligibility_content');
?>
<div class="wrap eligibility-content">
    <h1>Eligibility Content</h1><br>
    <form class="form-group" name="eligibilityContent" id="eligibilityContent" method="post" action="#"
          enctype="multipart/form-data">

        <div class="container">
            <div class="row flex">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Visible on Live</label>
                        </div>
                        <div class="col-sm-8 form-group">
                            <input type="checkbox" name="visible"
                                   value="1" <?php if (isset($content['visible']) && $content['visible'] == 1) {
                                echo "checked";
                            } ?>></div>
                    </div>
                </div>
                <div class="col-sm-6"></div>
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
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Sub heading</label>
                        </div>
                        <div class="col-sm-8 form-group">
                            <input type="text" name="sub_heading"
                                   value="<?php echo isset($content['sub_heading']) ? trim($content['sub_heading']) : ""; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Footer Title</label>
                        </div>
                        <div class="col-sm-8 form-group">
                            <input type="text" name="footer_title"
                                   value="<?php echo isset($content['footer_title']) ? trim($content['footer_title']) : ""; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Footer description</label>
                        </div>
                        <div class="col-sm-8 form-group">
                        <textarea type="text" name="description" cols="19"
                                  rows="3"><?php echo isset($content['description']) ? stripslashes(trim($content['description'])) : ""; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-sm-12">
					<button class="add_new_eligibility default" id="add_new_eligibility">Add new</button>
				</div>
            </div>
            <div class="row">
			<div class="col-sm-12 table">
                <table class="table table-striped table-responsive custom" id="add_eligibility_content">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nursing Programs</th>
                        <th>Eligibility Criteria</th>
                        <th>Age Criteria</th>
                        <th>Training Duration</th>
                        <th>Examination</th>
                        <th>Registration</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = count($content['course_req']);
                    if ($count > 0) {
                        for ($i = 0; $i < $count; $i++) {
                            ?>
                            <tr>
                                <td><a class="remove_button" href="javaScript:void(0)">Remove</a></td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][program]"
                                           value="<?php echo isset($content['course_req'][$i]['program']) ? $content['course_req'][$i]['program'] : ""; ?>">
                                </td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][eligibility]"
                                           value="<?php echo isset($content['course_req'][$i]['eligibility']) ? $content['course_req'][$i]['eligibility'] : ""; ?>">
                                </td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][age]"
                                           value="<?php echo isset($content['course_req'][$i]['age']) ? $content['course_req'][$i]['age'] : ""; ?>">
                                </td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][duration]"
                                           value="<?php echo isset($content['course_req'][$i]['duration']) ? $content['course_req'][$i]['duration'] : ""; ?>">
                                </td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][examination]"
                                           value="<?php echo isset($content['course_req'][$i]['examination']) ? $content['course_req'][$i]['examination'] : ""; ?>">
                                </td>
                                <td><input type="text" name="course_req[<?php echo $i; ?>][registartion]"
                                           value="<?php echo isset($content['course_req'][$i]['registartion']) ? $content['course_req'][$i]['registartion'] : ""; ?>">
                                </td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
			</div>
        </div>
		<div class="col-sm-12">
			<button class="default" type="submit" name="eligibility_submit" id="eligibility_submit">Submit</button>
		</div>
    </form>
</div>
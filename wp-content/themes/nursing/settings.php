<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 17/4/18
 * Time: 2:59 PM
 */
wp_enqueue_media();
$content = get_option('general_settings');
?>
<div class="wrap general-settings">
    <h1>General Settings</h1><br>
    <form class="form-group" name="generalSetting" id="generalSetting" method="post" action="#"
          enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 blocks">
                    <div class="row">
                        <h3>Contact Detail</h3>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Address</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="address"
                                           value="<?php echo isset($content['address']) ? stripslashes(trim($content['address'])) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Pincode</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="pincode"
                                           value="<?php echo isset($content['pincode']) ? trim($content['pincode']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Country</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="country"
                                           value="<?php echo isset($content['country']) ? trim($content['country']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Phone (+91)</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="phone" class="phone"
                                           value="<?php echo isset($content['phone']) ? trim($content['phone']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Latitude</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="latitude"
                                           value="<?php echo isset($content['latitude']) ? trim($content['latitude']) : ""; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>State</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="state"
                                           value="<?php echo isset($content['state']) ? trim($content['state']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>City</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="city"
                                           value="<?php echo isset($content['city']) ? trim($content['city']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Email </label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="email" name="email"
                                           value="<?php echo isset($content['email']) ? trim($content['email']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Mobile (+91)</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="mobile" class="phone"
                                           value="<?php echo isset($content['mobile']) ? trim($content['mobile']) : ""; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Longitude</label>
                                </div>
                                <div class="col-sm-8 form-group">
                                    <input type="text" name="longitude"
                                           value="<?php echo isset($content['longitude']) ? trim($content['longitude']) : ""; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="row">
				<div class="col-sm-12 blocks">
                <div class="row">
                    <h3>Social Site Detail</h3>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Facebook Link</label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="facebook"
                                       value="<?php echo isset($content['facebook']) ? trim($content['facebook']) : ""; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Instagram Link</label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="instagram"
                                       value="<?php echo isset($content['instagram']) ? trim($content['instagram']) : ""; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>LinkedIn Link</label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="linkedin"
                                       value="<?php echo isset($content['linkedin']) ? trim($content['linkedin']) : ""; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Twitter Link</label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="twitter"
                                       value="<?php echo isset($content['twitter']) ? trim($content['twitter']) : ""; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Pinterest Link</label>
                            </div>
                            <div class="col-sm-8 form-group">
                                <input type="text" name="pinterest"
                                       value="<?php echo isset($content['pinterest']) ? trim($content['pinterest']) : ""; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
				<div class="col-sm-12 blocks">
					<div class="row">
						<h3>Footer</h3>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Footer copyright text</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="text" name="copyright"
										   value="<?php echo isset($content['copyright']) ? trim($content['copyright']) : ""; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Footer Logo</label>

								</div>
								<div class="col-sm-8 form-group">
									<button data-id="footer_logo" class="upload-custom-img">Add Media</button>
									<input type="hidden" name="footer_logo" id="footer_logo"
										   value="<?php echo isset($content['footer_logo']) ? trim($content['footer_logo']) : ""; ?>">
									<div class="avatar footer_logo"><?php echo wp_get_attachment_image($content['footer_logo']); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="row">
				<div class="col-sm-12 blocks">
					<div class="row">
						<h3>Global</h3>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Header Logo</label>
								</div>
								<div class="col-sm-8 form-group">
									<button data-id="header_logo" class="upload-custom-img">Add Media</button>
									<input type="hidden" name="header_logo" id="header_logo"
										   value="<?php echo isset($content['header_logo']) ? $content['header_logo'] : ""; ?>">
									<div class="avatar header_logo"><?php echo wp_get_attachment_image($content['header_logo']); ?></div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4 form-group">
									<label>Favicon</label>
								</div>
								<div class="col-sm-8 form-group">
									<button data-id="favicon" class="upload-custom-img">Add Media</button>
									<input type="hidden" name="favicon" id="favicon"
										   value="<?php echo isset($content['favicon']) ? $content['favicon'] : ""; ?>">
									<div class="avatar favicon"><?php echo wp_get_attachment_image($content['favicon']); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="row">
        <div class="col-sm-12">
            <button class="default" type="submit" name="general_submit" id="general_submit">Submit</button>
        </div>
        </div>
    </form>
</div>
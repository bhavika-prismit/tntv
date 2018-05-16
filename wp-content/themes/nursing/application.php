<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 24/4/18
 * Time: 4:35 PM
 */
global $wpdb;
$result = $wpdb->get_results("SELECT * FROM `wp_application`");
?>
<div class="wrap application-list">
	<div class="row">
		<div class="col-sm-3 for-padding">
			<h1>Job application List</h1>
		</div>
	</div>
    <div class="container">
        <div class="row ">
			<div class="col-sm-12 table">
				<table class="custom table table-condensed table-striped table-responsive table-hover" id="application_content">
					<thead>
					<tr>
						<th>Photo</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Professional Title</th>
						<th>Resume</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = count($result);
					if ($count > 0) {
						foreach ($result as $row) {
							?>
							<tr>
								<td><?php echo isset($row->photoupload) ? wp_get_attachment_image($row->photoupload, 'thumbnail') : "-"; ?></td>
								<td><?php echo isset($row->applicant_name) ? $row->applicant_name : ""; ?></td>
								<td><?php echo isset($row->email) ? $row->email : ""; ?></td>
								<td><?php echo isset($row->address) ? $row->address : ""; ?></td>
								<td><?php echo isset($row->ptitle) ? $row->ptitle : ""; ?></td>
								<td><?php echo isset($row->resumeupload) ? '<a href="' . wp_get_attachment_url($row->resumeupload) . '" download>Download</a>' : "-"; ?></td>
							</tr>
						<?php }
					} ?>
					</tbody>
				</table>
			</div>
        </div>
    </div>
</div>


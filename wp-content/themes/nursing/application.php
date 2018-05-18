<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 24/4/18
 * Time: 4:35 PM
 */
global $wpdb;
$result_app = $wpdb->get_results("SELECT * FROM `wp_application`");
?>
<div class="wrap">
			<h1>Job application List</h1>
            <div id="message-delete"></div>
          <?php 
          $myListTable = new ListApplicationTabel();
                   $myListTable->prepare_items();
                   $myListTable->display(); 
?>
</div>
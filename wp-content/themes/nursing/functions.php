<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 30/1/18
 * Time: 5:19 PM
 */
/**
 * Proper way to enqueue scripts and styles
 */
function hide_adminbar()
{
    if (!is_admin())
        show_admin_bar(false);
}

add_action('init', 'hide_adminbar');

function wpdocs_theme_name_scripts()
{
    wp_enqueue_script("jquery");
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('slick-style', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome-all.css');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js');
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

function admindocs_theme_name_scripts()
{
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'));
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/admin-custom.css');
    wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome-all.css');
    wp_enqueue_script('mask', get_template_directory_uri() . '/assets/js/mask.js');
}

add_action('admin_enqueue_scripts', 'admindocs_theme_name_scripts');

// create custom post type
function create_post_type()
{
    register_post_type('sliders',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Sliders'),
                'singular_name' => __('Slider')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'sliders'),
        )
    );
    register_post_type('courses',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Courses'),
                'singular_name' => __('Course')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'courses'),
            'supports' => array('thumbnail', 'title', 'editor'),
        )
    );
    register_post_type('facilities',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Facilities'),
                'singular_name' => __('Facility')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'facilities'),
            'supports' => array('thumbnail', 'title', 'editor'),
        )
    );
    register_post_type('activities',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Activities'),
                'singular_name' => __('Activity')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'activities'),
            'supports' => array('thumbnail', 'title', 'editor'),
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_post_type');

add_theme_support('post-thumbnails');
// Add other useful image sizes for use through Add Media modal
add_image_size('page_slider', 1284, 900, false);
add_image_size('activities_page', 870, 0, false);
add_image_size('courses_offer', 320, 320, false);
add_image_size('recent_activity', 270, 270, false);
add_image_size('single_page', 263, 263, false);

//make filter for resize
//add_filter('image_size_names_choose', 'wpshout_custom_sizes');
//function wpshout_custom_sizes($sizes)
//{
//    return array_merge($sizes, array(
//        'slider-image' => __('page_slider')
//    ));
//}

function pietergoosen_theme_setup()
{
    register_nav_menus(array());
}

add_action('after_setup_theme', 'pietergoosen_theme_setup');

//Create the Home Content Menu in admin
add_action('admin_menu', 'register_my_custom_menu_page');
function register_my_custom_menu_page()
{
    add_menu_page('Home Page Content',
        'Home Content',
        'manage_options',
        'homecontent',
        'homePage',
        'dashicons-welcome-widgets-menus');
    add_menu_page('Job Vacancy Application',
        'Applications',
        'manage_options',
        'application',
        'application',
        'dashicons-media-text');
    add_submenu_page('homecontent',
        'Home Page Facilities',
        'Our Facility',
        'manage_options',
        'facilitycontent',
        'ourFacility');
//    add_submenu_page('homecontent.php',
//        'Courses Offered',
//        'Our Courses',
//        'manage_options',
//        'course_offered.php',
//        'courseOffered',
//        'dashicons-format-aside');
    add_submenu_page('homecontent',
        'Eligibility',
        'Eligibility',
        'manage_options',
        'eligibility',
        'eligibility',
        'dashicons-format-aside');
    add_menu_page('General Setting',
        'General Setting',
        'manage_options',
        'settings',
        'settings',
        'dashicons-admin-generic');
}

//to load home page
function homePage()
{
    require_once(trailingslashit(get_template_directory()) . 'homecontent.php');
}

//to load facility
function ourFacility()
{
    require_once(trailingslashit(get_template_directory()) . 'facilitycontent.php');
}

//course offered
function courseOffered()
{
    require_once(trailingslashit(get_template_directory()) . 'courseOffered.php');
}

//eligibility
function eligibility()
{
    require_once(trailingslashit(get_template_directory()) . 'eligibility.php');
}

//general settings
function settings()
{
    require_once(trailingslashit(get_template_directory()) . 'settings.php');
}

//view applications
function application()
{
    require_once(trailingslashit(get_template_directory()) . 'application.php');
}

//save home page content
function saveHomePageContent()
{
    if (isset($_POST['content_submit'])) {
        $place_holders = $_POST;
        unset($place_holders['content_submit']);

        // wordpress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('wporg_messages', 'wporg_message', __('Page content Saved successfully', 'wporg'), 'updated');
        }
        $content = get_option('home_about_content');
//        upload manually image file
//        foreach ($_FILES as $key => $value) {
//            $emb_file = $_FILES[$key];
//            if ($emb_file != 0) {
//                $file = $emb_file['tmp_name'];
//                $filename = $emb_file['name'];
//                $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
//                if (!$upload_file['error']) {
//                    $wp_filetype = wp_check_filetype($filename, null);
//                    $attachment = array(
//                        'post_mime_type' => $upload_file['type'],
//                        'post_parent' => '',
//                        'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
//                        'post_content' => '',
//                        'post_status' => 'inherit'
//                    );
//                    $attachment_id = wp_insert_attachment($attachment, $upload_file['file']);
//                    if (!is_wp_error($attachment_id)) {
//                        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
//                        $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
//                        wp_update_attachment_metadata($attachment_id, $attachment_data);
//                    }
//                    $place_holders[$key] = $attachment_id;
//                }
//            }
//        }
//
//        if ($place_holders)
//            if (!isset($place_holders['avatar1'])) {
//                $place_holders['avatar1'] = $content['avatar1'];
//            }
//        if (!isset($place_holders['avatar2'])) {
//            $place_holders['avatar2'] = $content['avatar2'];
//        }
//        if (!isset($place_holders['avatar3'])) {
//            $place_holders['avatar3'] = $content['avatar3'];
//        }
//        if (!isset($place_holders['avatar4'])) {
//            $place_holders['avatar4'] = $content['avatar4'];
//        }
        update_option('home_about_content', $place_holders);
    }
}

add_action('init', 'saveHomePageContent');

//save our facility content for home
function saveOurFacilityContent()
{
    if (isset($_POST['facility_submit'])) {
        $place_holders = $_POST;
        unset($place_holders['facility_submit']);

        // wordpress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('wporg_messages', 'wporg_message', __('Page content Saved successfully', 'wporg'), 'updated');
        }
        update_option('our_facility_content', $place_holders);
    }
}

add_action('init', 'saveOurFacilityContent');

//save course offered content
function saveCourseOffered()
{
    if (isset($_POST['course_offered_submit'])) {
        $place_holders = $_POST;
        unset($place_holders['course_offered_submit']);

        // wordpress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('wporg_messages', 'wporg_message', __('Page content Saved successfully', 'wporg'), 'updated');
        }
        update_option('course_offered', $place_holders);
    }
}

add_action('init', 'saveCourseOffered');

//save eligibility content for home
function saveEligibility()
{
    if (isset($_POST['eligibility_submit'])) {
        $place_holders = $_POST;
        unset($place_holders['eligibility_submit']);

        // wordpress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('wporg_messages', 'wporg_message', __('Page content Saved successfully', 'wporg'), 'updated');
        }
        update_option('eligibility_content', $place_holders);
    }
}

add_action('init', 'saveEligibility');

//save general settings content
function saveSettings()
{
    if (isset($_POST['general_submit'])) {
        $place_holders = $_POST;
        unset($place_holders['general_submit']);

        // wordpress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('wporg_messages', 'wporg_message', __('Page content Saved successfully', 'wporg'), 'updated');
        }
        update_option('general_settings', $place_holders);
    }
}

add_action('init', 'saveSettings');

//custom new menu
function wpb_custom_new_menu()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}

add_action('init', 'wpb_custom_new_menu');

//Facilities Shortcode
function facilities_func()
{
    $args = array('post_type' => 'facilities', 'posts_per_page' => 10);
    $loop = new WP_Query($args);
    ?>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='facilities'>
            <div class='row'>
                <?php
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div>
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                            <div class="facilities-icons">
                                <?php $icon = get_field('icon_class');
                                if (isset($icon) && $icon != "") { ?>
                                    <span><i class="<?php echo get_field('icon_class'); ?>"></i></span>
                                <?php } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                            <div class="text-area"><h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p></div>
                        </div>
                    </div>
                <?php endwhile;
                ?>
            </div>
        </div>
    </div>
    <?php
}

add_shortcode('facility_shortcode', 'facilities_func');

//add class in submenu
add_filter('wp_nav_menu', 'change_submenu_class');
function change_submenu_class($menu)
{
    $menu = preg_replace('/ class="sub-menu"/', '/ class="sub-menu dropdown-menu" /', $menu);
    $menu = preg_replace('/menu-item-has-children/', 'menu-item-has-children dropdown', $menu);
    $menu = preg_replace('/current-menu-item/', 'current-menu-item active', $menu);
    $menu = preg_replace('/current_page_parent/', 'current_page_parent active', $menu);
    return $menu;
}

//add span in menu
add_filter('nav_menu_item_title', 'nav_submenu');
function nav_submenu($title)
{
    return '<span>' . $title . '</span>';
}

function arphabet_widgets_init()
{

    register_sidebar(array(
        'name' => 'Activity List sidebar',
        'id' => 'activity_list_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'arphabet_widgets_init');

//save job application form
function saveApplication()
{
    global $wpdb, $message;

    if (isset($_POST['application_submit'])) {
        $error = false;
        $place_holders = $_POST;
        $post_id = $_POST['post_id'];
        unset($place_holders['application_submit']);
        unset($place_holders['post_id']);

        if ($_POST['name'] == "") {
            $error = true;
            $message = "You did not enter a name.";
        } //check if the address
        if (trim($_POST['address']) == "") {
            $error = true;
            $message = "Please enter address.";
        }
        if ($_POST['ptitle'] == "") {
            $error = true;
            $message = "Enter any title.";
        } //check if upload resume is empty
        if ($_FILES['resumeupload']['name'] == "") {
            $error = true;
            $message = "You did not select resume.";
        } //check for valid email
        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email'])) {
            $error = true;
            $message = "You did not enter a valid email.";
        }
        if ($error != true) {
            //upload manually image file
            foreach ($_FILES as $key => $value) {
                $emb_file = $_FILES[$key];
                if ($emb_file != 0) {
                    $file = $emb_file['tmp_name'];
                    $filename = $emb_file['name'];
                    $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
                    if (!$upload_file['error']) {
                        $wp_filetype = wp_check_filetype($filename, null);
                        $attachment = array(
                            'post_mime_type' => $upload_file['type'],
                            'post_parent' => '',
                            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                            'post_content' => '',
                            'post_status' => 'inherit'
                        );
                        $attachment_id = wp_insert_attachment($attachment, $upload_file['file']);
                        if (!is_wp_error($attachment_id)) {
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
                            wp_update_attachment_metadata($attachment_id, $attachment_data);
                        }
                        $place_holders[$key] = $attachment_id;
                    }
                }
            }
            $wpdb->insert("wp_application", $place_holders);
            $message = "Successfully Inserted.";
        }
        wp_redirect(get_permalink($post_id) . '?msg=' . $error);
        exit;
    }
}

add_action('init', 'saveApplication');

//wp-seupp--searchform
function wpdocs_after_setup_theme()
{
    add_theme_support('html5', array('search-form'));
}
<?php

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Class to display Internal linking report in a table using WP_List_Table.
 *
 * Displays a list of all posts and pages that are used for internal linking.
 *
 *
 * @see WP_List_Table
 */
class ListApplicationTabel extends WP_List_Table
{

    function __construct()
    {
        global $status, $page;

        //Set parent defaults
        parent::__construct(array(
            'singular' => 'Linking Application',
            'plural' => 'Linking Applications',
            'ajax' => false
        ));
    }

    function get_application($per_page = 5, $page_number = 1)
    {

        // echo $per_page;
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}application";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $sql .= " LIMIT " . $per_page;

        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;

        // echo $sql;
        $result = $wpdb->get_results($sql, 'ARRAY_A');
        // print_r($result);
        return $result;
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    function delete_customer($id)
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}application",
            ['id' => $id],
            ['%d']
        );
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}application";

        return $wpdb->get_var($sql);
    }

    /** Text displayed when no customer data is available */
    function no_items()
    {
        _e('No Application avaliable.', 'sp');
    }

    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name($item)
    {

        // create a nonce
        $delete_nonce = wp_create_nonce('sp_delete_customer');

        $title = '<strong>' . $item['id'] . '</strong>';

        $actions = [
            'delete' => sprintf('<a href="?page=%s&action=%s&applicant_name=%s&_wpnonce=%s">Delete</a>', esc_attr($_REQUEST['page']), 'delete', absint($item['id']), $delete_nonce)
        ];

        return $title . $this->row_actions($actions);
    }

    /**
     * Render a column when no column specific method exists.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    function column_default($item, $column_name)
    {
        $id = isset($item['id']) ? $item['id'] : "";
        $photoupload = isset($item['photoupload']) ? $item['photoupload'] : "";
        $resumeupload = isset($item['photoupload']) ? $item['resumeupload'] : "";
        switch ($column_name) {
            case 'photoupload':
                return isset($item['photoupload']) ? wp_get_attachment_image($item['photoupload'], 'thumbnail') : "-";
            case 'applicant_name':
                return $item[$column_name];
            case 'email':
                return $item[$column_name];
            case 'address':
                return $item[$column_name];
            case 'ptitle':
                return $item[$column_name];
            case 'resumeupload':
                return isset($item['resumeupload']) ? '<a href="' . wp_get_attachment_url($item['resumeupload']) . '" download>Download</a>' : "-";
            case 'action':
                return '<a class="delete-application" href="#" data-id="'.$id.'" data-photoupload="'.$photoupload.'" data-resumeupload="'.$resumeupload.'">Delete</a>';
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    // function column_cb($item)
    // {
    //     return sprintf(
    //         '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
    //     );
    // }

    function get_columns()
    {
        $columns = array(
            // 'cb' => '<input type="checkbox" />',
            'photoupload' => 'Profile Picture',
            'applicant_name' => 'Applicant Name',
            'email' => 'Email',
            'address' => 'Address',
            'ptitle' => 'Professional Title',
            'resumeupload' => 'Resume',
            'action' => 'Action'
        );
        return $columns;
    }

    function get_sortable_columns()
    {
        $sortable_columns = array(
            'applicant_name' => array('applicant_name', true),
            'email' => array('email', true),
            'address' => array('address', true),
            'ptitle' => array('ptitle', true),
        );
        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    // function get_bulk_actions()
    // {
    //     $actions = [
    //         'bulk-delete' => 'Delete'
    //     ];

    //     return $actions;
    // }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        // $this->_column_headers = $this->get_column_info();
        $this->_column_headers = array($columns, $hidden, $sortable);;

        /** Process bulk action */
        // $this->process_bulk_action();

        $per_page = $this->get_items_per_page('application_per_page', 5);

        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args([
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page //WE have to determine how many items to show on a page
        ]);

        $this->items = self::get_application($per_page, $current_page);
    }

    public function process_bulk_action()
    {

        //Detect when a bulk action is being triggered...
        if ('delete' === $this->current_action()) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);

            if (!wp_verify_nonce($nonce, 'sp_delete_customer')) {
                die('Go get a life script kiddies');
            } else {
                $this->delete_customer(absint($_GET['id']));

                wp_redirect(esc_url(add_query_arg()));
                exit;
            }

        }

        // If the delete bulk action is triggered
        if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete')
            || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')
        ) {

            $delete_ids = esc_sql($_POST['bulk-delete']);

            // loop over the array of record IDs and delete them
            foreach ($delete_ids as $id) {
                $this->delete_customer($id);

            }
            wp_redirect(esc_url(add_query_arg()));
            exit;
        }
    }
}

?>

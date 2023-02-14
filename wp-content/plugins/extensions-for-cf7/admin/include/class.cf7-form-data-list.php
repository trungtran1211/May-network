<?php

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

/**
 * HT CF7 Email List
*/
class Extensions_Cf7_Page implements Extensions_Cf7_Form_Datalist_Render
{
    function cf7_layout_render(){
        $eamil_list_table = new Extensions_Cf7_list();
        $eamil_list_table->set_data();  
        $eamil_list_table->prepare_items();
        ob_start();
        ?>
        <div class="wrap">
            <h2><?php _e("Email List","cf7-extensions") ?></h2>
            <form method="post" action="" enctype="multipart/form-data">
                <?php
                $eamil_list_table->search_box('search','search_id');  
                $eamil_list_table->display();
                ?>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
}


if(!class_exists('WP_List_Table')){
	require_once ABSPATH."wp-admin/includes/class-wp-list-table.php";
}

/**
 * HT CF7 Email List Manage
*/
class Extensions_Cf7_list extends WP_List_Table
{
	private $cf7_post_id;

	public function __construct() {

        parent::__construct(
            array(
                'singular' => 'contact_form',
                'plural'   => 'contact_forms',
                'ajax'     => false
            )
        );

    }
	
	function set_data(){
		$this->cf7_post_id = absint($_GET['cf7_id']);
		$data = array();
        global $wpdb;
        $search          = isset($_REQUEST['s']) && !empty( $_REQUEST['s'] ) ?  esc_sql( $_REQUEST['s'] ) : false;
        $form_date       = isset($_REQUEST['from_data']) && !empty( $_REQUEST['from_data'] )?esc_sql( $_REQUEST['from_data'] ).' 00:00:00' : false;
        $to_date         = isset($_REQUEST['to_data']) && !empty( $_REQUEST['to_data'] )?esc_sql( $_REQUEST['to_data'] ).' 23:59:00' : false;
        $table_name      = $wpdb->prefix.'extcf7_db';
        $page            = $this->get_pagenum();
        $page            = $page - 1;
        $start           = $page * 100;
        $cf7_post_id     = $this->cf7_post_id;
        $get_cf7_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : '';
        $cf7_orderby     = 'date' == $get_cf7_orderby ? 'form_date' : 'id';
        $cf7_order       = isset($_GET['order']) && sanitize_text_field($_GET['order']) == 'asc' ? 'ASC' : 'DESC';

        $this->process_bulk_action();

        if(current_user_can('upload_files')){
            if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){
                
                $sanitiaze_file_name = sanitize_file_name($_FILES["file"]["name"]);

                $fileInfo = wp_check_filetype(basename($sanitiaze_file_name));

                if ( !empty($fileInfo['ext']) && 'csv' == $fileInfo['ext'] ) {
                    $csv_import_file["name"] = $sanitiaze_file_name;  
                    $csv_import_file["tmp_name"] = realpath($_FILES["file"]["tmp_name"]);  
                }else{
                    $csv_import_file = false; 
                    ?>
                    <div class="notice notice-error is-dismissible">
                        <p><?php echo esc_html__('Invalid file.Please import a csv file','cf7-extensions'); ?></p>
                    </div>
                    <?php
                }

                if($csv_import_file ) $this->import_csv_file($csv_import_file);
            }
        }
        
        if( $search && $form_date && $to_date ){
            $results = $wpdb->get_results( "SELECT * FROM $table_name 
                        WHERE form_date BETWEEN '$form_date' 
                        AND '$to_date' 
                        AND form_value LIKE '%$search%'
                        AND form_id = '$cf7_post_id'
                        ORDER BY $cf7_orderby $cf7_order
                        LIMIT $start,100", OBJECT 
                    );

        }else if( $search ) {

           $results = $wpdb->get_results( "SELECT * FROM $table_name 
                        WHERE  form_value LIKE '%$search%'
                        AND form_id = '$cf7_post_id'
                        ORDER BY $cf7_orderby $cf7_order
                        LIMIT $start,100", OBJECT 
                    );
        }else if( $form_date && $to_date ){
            $results = $wpdb->get_results( "SELECT * FROM $table_name 
                        WHERE  form_date BETWEEN '$form_date' 
                        AND '$to_date'
                        AND form_id = '$cf7_post_id'
                        ORDER BY $cf7_orderby $cf7_order
                        LIMIT $start,100", OBJECT 
                    );
        }else{

            $results = $wpdb->get_results( "SELECT * FROM $table_name 
                        WHERE form_id = $cf7_post_id
                        ORDER BY $cf7_orderby $cf7_order
                        LIMIT $start,100", OBJECT 
                    );
        }


        foreach ( $results as $result ) {

            $cf7_form_value        = unserialize( $result->form_value );
            $cf7_form_values['id'] = $result->id;
            $cf7_form_data = [];

            foreach ($cf7_form_value as $k => $value){
                $key_value       = str_replace( 'your-', '', $k);
                $key_value       = str_replace( array('_', '-'), ' ', $key_value);
                if(is_array($value)){
                    $array_data = implode(', ',$value);
                    $cf7_form_data[]     = ucwords( $key_value ).': '.esc_html($array_data);
                }else{
                    $cf7_form_data[]     = ucwords( $key_value ).': '.esc_html($value);
                }
                if ( sizeof($cf7_form_data) > 2) break;
            }
            $cf7_form_values['form_data'] = implode(".<br>",$cf7_form_data);
            $cf7_form_values['form_title'] = get_the_title($cf7_post_id);
            $cf7_form_values['date'] = date_format(date_create($result->form_date),"F j, Y");
            $data[] = $cf7_form_values;

        }

        $this->items= $data;
	}

    /**
     * import csv in to database
     * @param  csv-file
     * @return array
    */
    public function import_csv_file($csv_file){
        global $wpdb;
        $csv_import_data = array();
        $db_formate = array();
        $current_form_id = absint($_REQUEST['cf7_id']);
        $file = fopen($csv_file['tmp_name'], "r");
        $hearder_row = fgetcsv($file);
        while (($line = fgetcsv($file)) !== FALSE){

            $csv_import_data['form_date'] = $line[0];
            $csv_import_data['form_id'] = $line[1];

            foreach ($line as $k => $value) {
                if(1 < $k){
                    $hearder_row[$k] = strtolower($hearder_row[$k]);
                    $mkey = str_replace( ' ', '_', $hearder_row[$k]);
                    $csv_import_data['form_value'][$mkey] = $value;
                }
            }
            $db_formate [] = $csv_import_data;
        }
        fclose($file);

        $table_name = $wpdb->prefix . 'extcf7_db';
        foreach ($db_formate as $value) {
            $data  = [
                'form_id'      => $current_form_id,
                'form_value'   => serialize($value['form_value']),
                'form_date'    => $value['form_date'],
            ];
            $wpdb->insert( $table_name, $data );
        }
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo esc_html__('Successfully Imported CSV File','cf7-extensions'); ?></p>
        </div>
        <?php

    }

	/**
     * Define check box for bulk action (each row)
     * @param  $item
     * @return checkbox
    */
    public function column_cb($item){
        return "<input type='checkbox' name='cf7_emails_id[]' value='{$item['id']}' />";
    }

    public function column_form_data($item){
        $nonce = wp_create_nonce("cf7_email_delete");
        $actions = [
            'view' => sprintf("<b><a href=admin.php?page=contat-form-list&cf7_id=%s&cf7em_id=%s>%s</a></b>",$this->cf7_post_id,$item['id'],'View'),
            'delete' => sprintf('<b><a href=admin.php?page=contat-form-list&cf7_id=%s&n=%s&cf7em_id=%s&action=%s onclick=\'return confirm("Are you sure to delete this file");\'>%s</a></b>',$this->cf7_post_id,$nonce,$item['id'],'delete',__('Delete','cf7-extensions' )),
        ];
        return sprintf("%s %s",$item['form_data'],$this->row_actions($actions));
    }

    public function column_date($item){
        $nonce = wp_create_nonce("cf7_email_delete");
        $actions = [
            'view' => sprintf('<b><a href=admin.php?page=contat-form-list&cf7_id=%s&cf7em_id=%s>%s</a></b>',$this->cf7_post_id,$item['id'],'View'),
            'delete' => sprintf('<b><a href=admin.php?page=contat-form-list&cf7_id=%s&n=%s&cf7em_id=%s&action=%s onclick=\'return confirm("Are you sure to delete this file");\'>%s</a></b>',$this->cf7_post_id,$nonce,$item['id'],'delete',__('Delete','cf7-extensions' )),
        ];
        return sprintf("%s %s",$item['date'],$this->row_actions($actions));
    }


    function get_sortable_columns(){
        return [
            'date'=>['date',true],
        ];
    }

	function get_columns(){

		return array(
            'cb' => '<input type="checkbox" />',
            'form_data' => __( 'Form Data', 'cf7-extensions' ),
            'form_title' => __( 'Form Title', 'cf7-extensions' ),
            'date' => __( 'Date', 'cf7-extensions' ),
        );

	}

    function extra_tablenav( $which ){
        if('top' == $which):
        $form_date = isset($_REQUEST['from_data']) && !empty($_REQUEST['from_data']) ? sanitize_text_field($_REQUEST['from_data']) : '';
        $to_data = isset($_REQUEST['to_data']) && !empty($_REQUEST['to_data']) ? sanitize_text_field($_REQUEST['to_data']) : '';
        ?>
        <div class="actions alignleft">
            from
            <input type="text" id="form-data" name="from_data" style="width: 130px;" placeholder="YYYY-MM-DD" value="<?php echo $form_date; ?>" autocomplete="off">
            to
            <input type="text" id="to-date" name="to_data" style="width: 130px;" placeholder="YYYY-MM-DD" value="<?php echo $to_data; ?>" autocomplete="off">
            <script type="text/javascript">
            (function($){
                $(document).ready(function(){
                    $("#form-data").datepicker({
                        dateFormat : 'yy-mm-dd'
                    });
                    $("#to-date").datepicker({
                        dateFormat : 'yy-mm-dd'
                    });
                });
            })(jQuery);
            </script>
            <?php 
                submit_button(__('Filter','cf7-extensions'),'button','sumbit',false);
            ?>
        </div>
        <div class="actions alignleft">
            CSV File
           <input type="file" name="file" id="file" style="width: 150px;">
           <?php 
                submit_button(__('Import CSV','cf7-extensions'),'button','csv-import',false);
            ?>
        </div> 
        <?php
        endif;
        $csv_nonce = wp_create_nonce( 'csv_download_nonce' );

        echo "<a href='".esc_html($_SERVER['REQUEST_URI'])."&download_csv=true&nonce=".$csv_nonce."'class='button'>";
        echo esc_html__( 'Export CSV', 'cf7-extensions' );
        echo '</a>';
    }

    /**
     * Define bulk action
     * @return Array
    */
    public function get_bulk_actions() {

        return array(
            'delete' => __( 'Delete', 'cf7-extensions' )
        );

    }

	function prepare_items(){
		$this->_column_headers = array($this->get_columns(),array('id'),$this->get_sortable_columns());

        $search = empty( $_REQUEST['s'] ) ? false :  esc_sql( $_REQUEST['s'] );
        $from_date    = isset($_REQUEST['from_data']) && !empty( $_REQUEST['from_data'] )?esc_sql( $_REQUEST['from_data'] ).' 00:00:00' : false;
        $to_date      = isset($_REQUEST['to_data']) && !empty( $_REQUEST['to_data'] )?esc_sql( $_REQUEST['to_data'] ).' 23:59:00' : false;
        $cf7_post_id  = $this->cf7_post_id;

        global $wpdb;

        $table_name  = $wpdb->prefix.'extcf7_db';
   
        $perPage     = 100;
        $currentPage = $this->get_pagenum();
        if ( ! empty($search) &&  ! empty($$from_date) && ! empty($to_date)) {

            $totalIemails  = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_date
                                            BETWEEN '$from_date' 
                                            AND '$to_date' 
                                            AND form_value LIKE '%$search%' 
                                            AND form_id = '$cf7_post_id' ");
        }else if(! empty($search)){

            $totalIemails  = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_value LIKE '%$search%' AND form_id = '$cf7_post_id' ");
        }else if(! empty($from_date) && ! empty($to_date)){

            $totalIemails  = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_date
                                            BETWEEN '$from_date' 
                                            AND '$to_date' 
                                            AND form_id = '$cf7_post_id' ");
        }else{

            $totalIemails  = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_id = '$cf7_post_id'");
        }

        $this->set_pagination_args( array(
            'total_items' => $totalIemails,
            'per_page'    => $perPage
        ) );
	}

    /**
     * Define bulk action
     *
     */
    public function process_bulk_action(){

        global $wpdb;
        $table_name  = $wpdb->prefix.'extcf7_db';
        $action      = $this->current_action();

        if ( isset( $_POST['_wpnonce'] ) && ! empty( $_POST['_wpnonce'] ) ) {

            $nonce        = filter_input( INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING );
            $nonce_action = 'bulk-' . $this->_args['plural'];

            if ( !wp_verify_nonce( $nonce, $nonce_action ) ){

                wp_die( 'Nope! Security check failed!' );
            }
        }

        if(isset( $_POST['cf7_emails_id'] ) && is_array($_POST['cf7_emails_id'])){
            $form_ids = array_map('absint', extcf7_clean($_POST['cf7_emails_id']));
        }else{
            $form_ids = array();
        }
        

        if( 'delete' === $action ) {
            foreach ($form_ids as $form_id):
                $form_id         = $form_id;
                $delete_row      = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = '$form_id' LIMIT 1", OBJECT );
                $del_row_value   = $delete_row[0]->form_value;
                $del_row_values  = unserialize($del_row_value);
                $cf7_upload_dir  = wp_upload_dir();
                $cfdb7_dirname   = $cf7_upload_dir['basedir'].'/extcf7_uploads';

                foreach ($del_row_values as $key => $result) {

                    if ( ( strpos($key, 'file') !== false ) &&
                        file_exists($cfdb7_dirname.'/'.$result) ) {
                        unlink($cfdb7_dirname.'/'.$result);
                    }

                }

                $wpdb->delete(
                    $table_name ,
                    array( 'id' => $form_id ),
                    array( '%d' )
                );
            endforeach;
        }
    }

	function column_default($items,$column_name){
		return $items[$column_name];
	}

    protected function bulk_actions( $which = '' ) {
        if ( is_null( $this->_actions ) ) {
            $this->_actions = $this->get_bulk_actions();
            $bulk_action_position = '';
        }else {
            $bulk_action_position = '2';
        }

        if ( empty( $this->_actions ) )
            return;

        echo '<select name="action' . $bulk_action_position . '">';
        echo '<option value="-1">' . __( 'Bulk Actions', 'cf7-extensions' ) . "</option>";
        foreach ( $this->_actions as $name => $title ) {
            echo '<option value="' . $name . '">' . $title . "</option>";
        }
        echo "</select>";

        submit_button( __( "Apply", "cf7-extensions" ), 'action', '', false, array( 'id' => "doaction$bulk_action_position" ) );
    }

}
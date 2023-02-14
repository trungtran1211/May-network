<?php
if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

/**
 * HT CF7 Email csv
*/
class Extensions_Cf7_Csv
{
	
	function __construct()
	{
        $download_csv_status = isset($_REQUEST['download_csv']) && $_REQUEST['download_csv'] == true ? true : false;

		if( $download_csv_status  && isset( $_REQUEST['nonce'] ) ){

            $nonce  = filter_input( INPUT_GET, 'nonce', FILTER_SANITIZE_STRING );

            if ( ! wp_verify_nonce( $nonce, 'csv_download_nonce' ) ) wp_die('Not Valid.. Download Request..!!');

            $this->Extensions_Cf7_Download_Csv();
        }

	}
	/**
     * Download file
     * @return void
    */
    public function Extensions_Cf7_Download_Csv(){

        global $wpdb;
        $table_name  = $wpdb->prefix.'extcf7_db';

        $cf7_id          = absint($_REQUEST['cf7_id']);
        $csv_heading_row = $wpdb->get_results("SELECT * FROM $table_name
            WHERE form_id = '$cf7_id' ORDER BY id DESC LIMIT 1",OBJECT);

        $csv_heading_row    = reset( $csv_heading_row );
        $csv_heading_row    = unserialize( $csv_heading_row->form_value );
        $csv_heading_key    = array_keys( $csv_heading_row );


        $total_data_rows   = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_id = '$cf7_id' "); 
        $per_query_n       = 1000;
        $total_query_n     = ( $total_data_rows / $per_query_n );
        $csv_heading       = array('Date','Form Id');

        foreach ($csv_heading_key as $hKeys ){
            $tmp_K       = str_replace( 'your-', '', $hKeys );
            $tmp_K       = str_replace( array('-','_'), ' ', $tmp_K );
            $csv_heading[] = ucwords( $tmp_K );
        }

        $filename = "extcf7-" . date("Y-m-d") . ".csv";

        $csv_df = fopen($filename, 'w');

        fputcsv( $csv_df, $csv_heading );

        for( $k = 0; $k <= $total_query_n; $k++ ){

            $offset  = $k * $per_query_n;
            $results = $wpdb->get_results("SELECT * FROM $table_name
            WHERE form_id = '$cf7_id' ORDER BY id DESC  LIMIT $offset, $per_query_n",OBJECT);
            
            $csv_data  = array();

            foreach ($results as $result) :
                
                $csv_data['form_date']  = $result->form_date;
                $csv_data['id']    		= $result->form_id;
                $csv_result_tmp         = unserialize( $result->form_value );
                $upload_dir             = wp_upload_dir();
                $extcf7_dir_url         = $upload_dir['baseurl'].'/extcf7_uploads';

                foreach ($csv_result_tmp as $key => $value):
                    if ( ! in_array( $key, $csv_heading_key ) ) continue;

                    if (strpos($key, 'file') !== false ){
                        $csv_data[$key] = empty( $value ) ? '' : $extcf7_dir_url.'/'.$value;
                        continue;
                    }

                    if(is_array($value)){
                      $csv_data[$key] = implode(', ',$value); 
                    }else{
                      $csv_data[$key] = $value;
                    }
                    
                endforeach;
                fputcsv($csv_df, $csv_data);
            endforeach;
        }
        fclose( $csv_df );

        header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".$filename);
		header("Content-Type: application/csv; "); 

		readfile($filename);
		unlink($filename);
        die();
    }
		
}

new Extensions_Cf7_Csv();
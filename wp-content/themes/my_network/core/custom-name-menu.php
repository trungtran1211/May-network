<?php

function rename_header_to_logo( $translated, $original, $domain ) {

    $strings = array(
        'HT Cf7 Extension' => 'Dữ liệu từ Form',
        'Cf7 DB' => 'Dữ liệu chính'
    );
    
    if ( isset( $strings[$original] ) && is_admin() ) {
        $translations = &get_translations_for_domain( $domain );
        $translated = $translations->translate( $strings[$original] );
    }
    
      return $translated;
    }
    
    add_filter( 'gettext', 'rename_header_to_logo', 10, 3 );
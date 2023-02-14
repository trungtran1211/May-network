<?php

/**
 * [extcf7_clean]
 * @param  [JSON] $var
 * @return [array]
 */
function extcf7_clean( $var ) {
    if ( is_array( $var ) ) {
        return array_map( 'extcf7_clean', $var );
    } else {
        return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
    }
}
<?php
/**
 * Plugin Name: TasteNsee Workshop Admin Columns
 * Description: Workshop dates and registration statuses in the Kids and Adult Workshop lists.
 * Version: 1.0.0
 */
defined( 'ABSPATH' ) || exit;

function tastensee_workshop_admin_columns( $columns ) {
    $updated = array();
    foreach ( $columns as $key => $label ) {
        $updated[ $key ] = $label;
        if ( 'title' === $key ) {
            $updated['tastensee_workshop_date'] = __( 'Workshop Date', 'tastensee' );
            $updated['tastensee_workshop_status'] = __( 'Status', 'tastensee' );
        }
    }
    return $updated;
}

function tastensee_workshop_admin_column_content( $column, $post_id ) {
    if ( ! in_array( $column, array( 'tastensee_workshop_date', 'tastensee_workshop_status' ), true ) ) {
        return;
    }

    $type = get_post_type( $post_id );
    $details = 'kids_workshop' === $type ? tastensee_kids_details( $post_id ) : tastensee_adult_details( $post_id );
    if ( 'tastensee_workshop_date' === $column ) {
        echo esc_html( $details['date'] ? wp_date( get_option( 'date_format' ), $details['date']->getTimestamp() ) : '—' );
        return;
    }

    $status = $details['status'];
    $field = function_exists( 'get_field_object' ) ? get_field_object( $type . '_status', $post_id, false, false ) : false;
    $labels = array(
        'open' => __( 'Open', 'tastensee' ),
        'full' => __( 'Fully booked', 'tastensee' ),
        'closed' => __( 'Closed', 'tastensee' ),
        'cancelled' => __( 'Cancelled', 'tastensee' ),
    );
    echo esc_html( '' === $status ? '—' : ( $field['choices'][ $status ] ?? $labels[ $status ] ?? ucwords( str_replace( array( '_', '-' ), ' ', $status ) ) ) );
}

foreach ( array( 'kids_workshop', 'adult_workshop' ) as $tastensee_workshop_type ) {
    add_filter( 'manage_' . $tastensee_workshop_type . '_posts_columns', 'tastensee_workshop_admin_columns' );
    add_action( 'manage_' . $tastensee_workshop_type . '_posts_custom_column', 'tastensee_workshop_admin_column_content', 10, 2 );
}

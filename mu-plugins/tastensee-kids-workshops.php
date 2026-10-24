<?php
/**
 * Plugin Name: TasteNsee Kids Workshops
 * Description: Kids workshop listings and the reusable Forminator registration connection.
 * Version: 1.0.0
 */
defined( 'ABSPATH' ) || exit;

add_action( 'init', function () {
    register_post_type( 'kids_workshop', array(
        'labels' => array( 'name' => 'Kids Workshops', 'singular_name' => 'Kids Workshop', 'add_new_item' => 'Add New Kids Workshop', 'edit_item' => 'Edit Kids Workshop' ),
        'public' => true, 'show_in_rest' => true, 'has_archive' => false,
        'rewrite' => array( 'slug' => 'kids-workshops', 'with_front' => false ),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
    ) );
} );

function tastensee_kids_registration_url( $id = 0 ) {
    $page = get_page_by_path( 'workshops-events/workshop-kids-registration' );
    $url = $page ? get_permalink( $page ) : home_url( '/workshops-events/workshop-kids-registration/' );
    return $id ? add_query_arg( 'workshop', absint( $id ), $url ) : $url;
}

function tastensee_kids_details( $id ) {
    $raw = (string) get_post_meta( $id, 'kids_workshop_date', true );
    $date = DateTimeImmutable::createFromFormat( '!Ymd', $raw, wp_timezone() );
    if ( ! $date || $date->format( 'Ymd' ) !== $raw ) { $date = null; }
    $times = array();
    foreach ( array( 'kids_workshop_start_time', 'kids_workshop_end_time' ) as $key ) {
        $raw_time = (string) get_post_meta( $id, $key, true );
        $time = DateTimeImmutable::createFromFormat( '!H:i:s', $raw_time, wp_timezone() );
        if ( $time && $time->format( 'H:i:s' ) === $raw_time ) { $times[] = wp_date( 'g:i A', $time->getTimestamp() ); }
    }
    return array(
        'date' => $date, 'time' => implode( ' – ', $times ),
        'location' => (string) get_post_meta( $id, 'kids_workshop_location', true ),
        'price' => get_post_meta( $id, 'kids_workshop_price', true ),
        'status' => (string) get_post_meta( $id, 'kids_workshop_status', true ),
    );
}

function tastensee_kids_query_args( $open_only = false ) {
    $meta = array( array( 'key' => 'kids_workshop_date', 'value' => current_datetime()->format( 'Ymd' ), 'compare' => '>=', 'type' => 'NUMERIC' ) );
    if ( $open_only ) { $meta[] = array( 'key' => 'kids_workshop_status', 'value' => 'open' ); }
    return array( 'post_type' => 'kids_workshop', 'post_status' => 'publish', 'posts_per_page' => -1,
        'no_found_rows' => true, 'meta_key' => 'kids_workshop_date', 'orderby' => array( 'meta_value_num' => 'ASC', 'ID' => 'ASC' ), 'meta_query' => $meta );
}

function tastensee_kids_available( $id ) {
    $d = tastensee_kids_details( $id );
    return 'kids_workshop' === get_post_type( $id ) && 'publish' === get_post_status( $id ) && 'open' === $d['status'] && $d['date'] && $d['date']->format( 'Ymd' ) >= current_datetime()->format( 'Ymd' );
}

function tastensee_kids_options() {
    $options = array();
    foreach ( get_posts( tastensee_kids_query_args( true ) ) as $p ) {
        $d = tastensee_kids_details( $p->ID );
        if ( ! $d['date'] ) { continue; }
        $label = get_the_title( $p ) . ' — ' . wp_date( 'M j, Y', $d['date']->getTimestamp() );
        if ( $d['time'] ) { $label .= ' · ' . $d['time']; }
        if ( '' !== $d['price'] ) { $label .= ' · CAD $' . number_format( (float) $d['price'], 2 ); }
        $options[] = array( 'label' => $label, 'value' => (string) $p->ID, 'limit' => '', 'key' => 'kids-' . $p->ID, 'default' => false );
    }
    return $options;
}

// Persist the current options before Forminator loads submission validation or entry labels.
// Only this field's options are managed here; the remaining form is dashboard-editable.
function tastensee_kids_sync_options() {
    $id = (int) get_option( 'tastensee_kids_form_id' );
    if ( ! $id || ! class_exists( 'Forminator_API' ) ) { return; }
    $options = tastensee_kids_options();
    $field = Forminator_API::get_form_field( $id, 'select-1', false );
    if ( ! is_wp_error( $field ) && $field && $field->options !== $options ) {
        Forminator_API::update_form_field( $id, 'select-1', array( 'options' => $options ) );
    }
}
add_action( 'init', 'tastensee_kids_sync_options', 99 );

add_filter( 'forminator_cform_render_fields', function ( $wrappers, $form_id ) {
    if ( (int) $form_id !== (int) get_option( 'tastensee_kids_form_id' ) ) { return $wrappers; }
    $requested = isset( $_GET['workshop'] ) && is_scalar( $_GET['workshop'] ) ? absint( $_GET['workshop'] ) : 0;
    foreach ( $wrappers as &$wrapper ) {
        foreach ( $wrapper['fields'] as &$field ) {
            if ( 'select-1' === $field['element_id'] ) {
                $field['options'] = tastensee_kids_options();
                foreach ( $field['options'] as &$option ) { $option['default'] = (string) $requested === $option['value']; }
                unset( $option );
            }
        }
        unset( $field );
    }
    unset( $wrapper );
    return $wrappers;
}, 10, 2 );

add_filter( 'forminator_custom_form_submit_errors', function ( $errors, $form_id, $data ) {
    if ( (int) $form_id !== (int) get_option( 'tastensee_kids_form_id' ) ) { return $errors; }
    $values = array_column( $data, 'value', 'name' );
    $value = $values['select-1'] ?? '';
    if ( ! is_scalar( $value ) || ! ctype_digit( (string) $value ) || ! tastensee_kids_available( (int) $value ) ) {
        $errors[] = array( 'select-1' => 'This workshop is no longer available. Please select an upcoming, open workshop.' );
    }
    $age = $values['number-1'] ?? '';
    if ( ! is_scalar( $age ) || ! preg_match( '/^(8|9|1[0-4])$/', (string) $age ) ) {
        $errors[] = array( 'number-1' => 'Please enter a whole-number age from 8 to 14.' );
    }
    return $errors;
}, 10, 3 );

add_action( 'wp_enqueue_scripts', function () {
    if ( is_page( 'workshop-kids-registration' ) ) {
        wp_enqueue_style( 'tastensee-kids-form', get_theme_file_uri( 'kids-form.css' ), array( 'tastensee' ), (string) filemtime( get_theme_file_path( 'kids-form.css' ) ) );
    }
} );

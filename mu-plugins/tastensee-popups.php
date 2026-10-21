<?php
/**
 * Plugin Name: TasteNsee Pop-Up Markets
 * Description: Pop-up market events, ACF details, and upcoming market queries.
 * Version: 1.0.0
 * Text Domain: tastensee
 */
defined( 'ABSPATH' ) || exit;

function tastensee_register_popups() {
    register_post_type( 'popup', array(
        'labels' => array(
            'name' => __( 'Pop-Up Markets', 'tastensee' ),
            'singular_name' => __( 'Pop-Up Market', 'tastensee' ),
            'add_new_item' => __( 'Add New Pop-Up Market', 'tastensee' ),
            'edit_item' => __( 'Edit Pop-Up Market', 'tastensee' ),
            'view_item' => __( 'View Pop-Up Market', 'tastensee' ),
            'not_found' => __( 'No pop-up markets found.', 'tastensee' ),
            'featured_image' => __( 'Market image', 'tastensee' ),
            'set_featured_image' => __( 'Set market image', 'tastensee' ),
        ),
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => false,
        'rewrite' => array( 'slug' => 'pop-up-markets', 'with_front' => false ),
        'menu_icon' => 'dashicons-store',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
    ) );
}
add_action( 'init', 'tastensee_register_popups' );

// Market Details is managed in ACF → Field Groups. Keep the field names and keys stable.

/** ACF stores date-picker values as Ymd, independently of their display format. */
function tastensee_popup_query_args( $past = false ) {
    return array(
        'post_type' => 'popup',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'no_found_rows' => true,
        'meta_key' => 'popup_date',
        'orderby' => array( 'meta_value_num' => 'DESC', 'ID' => 'DESC' ),
        'meta_query' => array( array(
            'key' => 'popup_date',
            'value' => current_datetime()->format( 'Ymd' ),
            'compare' => $past ? '<' : '>=',
            'type' => 'NUMERIC',
        ) ),
    );
}

/** Read raw metadata so display also works if ACF is temporarily unavailable. */
function tastensee_popup_details( $post_id ) {
    $raw_date = (string) get_post_meta( $post_id, 'popup_date', true );
    $date = DateTimeImmutable::createFromFormat( '!Ymd', $raw_date, wp_timezone() );
    if ( ! $date || $date->format( 'Ymd' ) !== $raw_date ) {
        $date = null;
    }
    $times = array();
    foreach ( array( 'popup_start_time', 'popup_end_time' ) as $key ) {
        $raw_time = (string) get_post_meta( $post_id, $key, true );
        $time = DateTimeImmutable::createFromFormat( '!H:i:s', $raw_time, wp_timezone() );
        if ( $time && $time->format( 'H:i:s' ) === $raw_time ) {
            $times[] = wp_date( get_option( 'time_format' ), $time->getTimestamp(), wp_timezone() );
        }
    }
    return array(
        'date' => $date,
        'time' => implode( ' – ', $times ),
        'location' => (string) get_post_meta( $post_id, 'popup_location', true ),
    );
}

function tastensee_popup_rewrite_rules() {
    if ( '1' !== get_option( 'tastensee_popup_rewrite_version' ) ) {
        flush_rewrite_rules( false );
        update_option( 'tastensee_popup_rewrite_version', '1' );
    }
}
add_action( 'init', 'tastensee_popup_rewrite_rules', 20 );

function tastensee_popup_body_class( $classes ) {
    if ( is_singular( 'popup' ) ) {
        $classes[] = 'event-detail-page';
    }
    return $classes;
}
add_filter( 'body_class', 'tastensee_popup_body_class' );

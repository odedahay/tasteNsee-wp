<?php
/**
 * Plugin Name: TasteNsee Past Events & Workshops
 * Description: Combines published past markets and kids/adult workshops by their own event dates.
 * Version: 1.0.0
 */
defined( 'ABSPATH' ) || exit;

function tastensee_past_activity_query_args( $limit = -1 ) {
    return array(
        'post_type' => array( 'popup', 'kids_workshop', 'adult_workshop' ),
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
        'tastensee_past_activities' => true,
    );
}

// Each post type has its own ACF date key. Match the key to its type before
// filtering and ordering, so an unrelated date field cannot move an event.
add_filter( 'posts_clauses', function ( $clauses, $query ) {
    if ( ! $query->get( 'tastensee_past_activities' ) ) { return $clauses; }
    global $wpdb;
    $clauses['join'] .= " INNER JOIN {$wpdb->postmeta} AS tastensee_past_date ON (
        tastensee_past_date.post_id = {$wpdb->posts}.ID
        AND tastensee_past_date.meta_key = CASE {$wpdb->posts}.post_type
            WHEN 'popup' THEN 'popup_date'
            WHEN 'kids_workshop' THEN 'kids_workshop_date'
            WHEN 'adult_workshop' THEN 'adult_workshop_date'
        END
    )";
    $clauses['where'] .= $wpdb->prepare(
        " AND tastensee_past_date.meta_value REGEXP '^[0-9]{8}$'
          AND CAST(tastensee_past_date.meta_value AS UNSIGNED) < %d",
        (int) current_datetime()->format( 'Ymd' )
    );
    $clauses['groupby'] = "{$wpdb->posts}.ID";
    $clauses['orderby'] = "MAX(CAST(tastensee_past_date.meta_value AS UNSIGNED)) DESC, {$wpdb->posts}.ID DESC";
    return $clauses;
}, 10, 2 );

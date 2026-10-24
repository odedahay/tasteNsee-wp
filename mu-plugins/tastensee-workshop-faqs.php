<?php
/**
 * Plugin Name: TasteNsee Workshop FAQs
 * Description: Reusable questions and answers with Kids/Adult audiences and display order.
 * Version: 1.0.0
 */
defined( 'ABSPATH' ) || exit;

add_action( 'init', function () {
    register_taxonomy( 'faq_audience', array( 'workshop_faq' ), array(
        'labels' => array( 'name' => 'FAQ Audiences', 'singular_name' => 'FAQ Audience', 'menu_name' => 'FAQ Audiences', 'all_items' => 'All FAQ Audiences', 'edit_item' => 'Edit FAQ Audience', 'add_new_item' => 'Add FAQ Audience' ),
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'show_admin_column' => true,
        'hierarchical' => true, 'rewrite' => false,
    ) );
    register_post_type( 'workshop_faq', array(
        'labels' => array( 'name' => 'FAQs', 'singular_name' => 'FAQ', 'add_new_item' => 'Add New FAQ', 'edit_item' => 'Edit FAQ', 'all_items' => 'All FAQs', 'not_found' => 'No FAQs found.' ),
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'exclude_from_search' => true,
        'rewrite' => false, 'has_archive' => false, 'menu_icon' => 'dashicons-editor-help',
        'supports' => array( 'title', 'editor', 'revisions' ), 'taxonomies' => array( 'faq_audience' ),
    ) );
} );

add_filter( 'enter_title_here', function ( $text, $post ) {
    return 'workshop_faq' === $post->post_type ? 'Enter the FAQ question' : $text;
}, 10, 2 );

function tastensee_faq_order_box( $post ) {
    wp_nonce_field( 'tastensee_faq_order', 'tastensee_faq_order_nonce' );
    echo '<p><label for="tastensee-faq-order">Display order</label></p>';
    echo '<input type="number" min="0" step="1" id="tastensee-faq-order" name="tastensee_faq_order" value="' . esc_attr( $post->menu_order ) . '" class="small-text" />';
    echo '<p>Lower numbers appear first. Use 10, 20, 30 to leave room between questions.</p>';
    echo '<p>Write the answer in the content editor. Select Kids Workshops, Adult Workshops, or both under FAQ Audience. Only published FAQs with a matching audience appear.</p>';
}
add_action( 'add_meta_boxes_workshop_faq', function () {
    add_meta_box( 'tastensee-faq-settings', 'FAQ Settings', 'tastensee_faq_order_box', 'workshop_faq', 'side' );
} );

function tastensee_save_faq_order( $post_id, $post ) {
    if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) { return; }
    if ( ! isset( $_POST['tastensee_faq_order_nonce'], $_POST['tastensee_faq_order'] ) || ! is_string( $_POST['tastensee_faq_order_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tastensee_faq_order_nonce'] ) ), 'tastensee_faq_order' ) ) { return; }
    $order = filter_var( $_POST['tastensee_faq_order'], FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 0 ) ) );
    if ( false === $order || $order === (int) $post->menu_order ) { return; }
    remove_action( 'save_post_workshop_faq', 'tastensee_save_faq_order', 10 );
    wp_update_post( array( 'ID' => $post_id, 'menu_order' => $order ) );
    add_action( 'save_post_workshop_faq', 'tastensee_save_faq_order', 10, 2 );
}
add_action( 'save_post_workshop_faq', 'tastensee_save_faq_order', 10, 2 );

add_filter( 'manage_workshop_faq_posts_columns', function ( $columns ) {
    $columns['title'] = 'Question';
    $columns['tastensee_faq_order'] = 'Display order';
    return $columns;
} );
add_action( 'manage_workshop_faq_posts_custom_column', function ( $column, $post_id ) {
    if ( 'tastensee_faq_order' === $column ) { echo esc_html( (string) get_post_field( 'menu_order', $post_id ) ); }
}, 10, 2 );
add_filter( 'manage_edit-workshop_faq_sortable_columns', function ( $columns ) {
    $columns['tastensee_faq_order'] = 'menu_order';
    return $columns;
} );
add_action( 'pre_get_posts', function ( $query ) {
    if ( is_admin() && $query->is_main_query() && 'workshop_faq' === $query->get( 'post_type' ) && ! $query->get( 'orderby' ) ) {
        $query->set( 'orderby', array( 'menu_order' => 'ASC', 'ID' => 'ASC' ) );
    }
} );

function tastensee_workshop_faq_query_args( $audience ) {
    return array(
        'post_type' => 'workshop_faq', 'post_status' => 'publish', 'posts_per_page' => -1,
        'no_found_rows' => true, 'ignore_sticky_posts' => true,
        'orderby' => array( 'menu_order' => 'ASC', 'ID' => 'ASC' ),
        'tax_query' => array( array( 'taxonomy' => 'faq_audience', 'field' => 'slug', 'terms' => in_array( $audience, array( 'kids', 'adult' ), true ) ? $audience : 'invalid-audience', 'include_children' => false ) ),
    );
}

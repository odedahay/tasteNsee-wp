<?php
/**
 * Plugin Name: TasteNsee Testimonials
 * Description: Client testimonials, categories, and star ratings.
 * Version: 1.0.0
 * @package TasteNsee
 */
defined( 'ABSPATH' ) || exit;

function tastensee_register_testimonials() {
    register_post_type( 'testimonial', array(
        'labels' => array(
            'name' => __( 'Testimonials', 'tastensee' ),
            'singular_name' => __( 'Testimonial', 'tastensee' ),
            'add_new_item' => __( 'Add New Testimonial', 'tastensee' ),
            'edit_item' => __( 'Edit Testimonial', 'tastensee' ),
            'featured_image' => __( 'Client photo', 'tastensee' ),
            'set_featured_image' => __( 'Set client photo', 'tastensee' ),
        ),
        'public' => true,
        'has_archive' => 'testimonials',
        'rewrite' => array( 'slug' => 'testimonials', 'with_front' => false ),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'taxonomies' => array( 'testimonial_category' ),
    ) );
    register_taxonomy( 'testimonial_category', 'testimonial', array(
        'labels' => array(
            'name' => __( 'Testimonial Categories', 'tastensee' ),
            'singular_name' => __( 'Testimonial Category', 'tastensee' ),
            'menu_name' => __( 'Categories', 'tastensee' ),
            'add_new_item' => __( 'Add New Testimonial Category', 'tastensee' ),
            'edit_item' => __( 'Edit Testimonial Category', 'tastensee' ),
        ),
        'hierarchical' => true,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => false,
    ) );
}
add_action( 'init', 'tastensee_register_testimonials' );

function tastensee_default_testimonial_categories() {
    if ( '1' === get_option( 'tastensee_testimonial_categories_version' ) ) {
        return;
    }
    $categories = array(
        'custom-cake' => 'Custom Cake',
        'kids-workshop' => 'Kids’ Workshop',
        'celebrations' => 'Celebrations',
        'dessert-table' => 'Dessert Table',
        'inclusive-workshop' => 'Inclusive Workshop',
        'birthday-cake' => 'Birthday Cake',
    );
    foreach ( $categories as $slug => $name ) {
        if ( ! term_exists( $slug, 'testimonial_category' ) ) {
            $term = wp_insert_term( $name, 'testimonial_category', array( 'slug' => $slug ) );
            if ( is_wp_error( $term ) ) {
                return;
            }
        }
    }
    update_option( 'tastensee_testimonial_categories_version', '1' );
}
add_action( 'init', 'tastensee_default_testimonial_categories', 15 );

function tastensee_testimonial_rating_box() {
    add_meta_box( 'tastensee-testimonial-rating', __( 'Star rating', 'tastensee' ), 'tastensee_testimonial_rating_field', 'testimonial', 'side' );
}
add_action( 'add_meta_boxes_testimonial', 'tastensee_testimonial_rating_box' );

function tastensee_testimonial_rating_field( $post ) {
    wp_nonce_field( 'tastensee_save_testimonial', 'tastensee_testimonial_nonce' );
    $rating = get_post_meta( $post->ID, '_tastensee_testimonial_rating', true ) ?: 5;
    echo '<p>' . esc_html__( 'Use the title for the client’s name, the editor for their quote, and the client photo for their avatar.', 'tastensee' ) . '</p>';
    echo '<label for="tastensee-rating">' . esc_html__( 'Rating', 'tastensee' ) . '</label> <select id="tastensee-rating" name="tastensee_testimonial_rating">';
    for ( $star = 1; $star <= 5; $star++ ) {
        echo '<option value="' . esc_attr( $star ) . '" ' . selected( $rating, $star, false ) . '>' . esc_html( $star ) . '</option>';
    }
    echo '</select>';
}

function tastensee_save_testimonial_rating( $post_id ) {
    if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( ! isset( $_POST['tastensee_testimonial_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tastensee_testimonial_nonce'] ) ), 'tastensee_save_testimonial' ) ) {
        return;
    }
    if ( isset( $_POST['tastensee_testimonial_rating'] ) ) {
        update_post_meta( $post_id, '_tastensee_testimonial_rating', max( 1, min( 5, absint( $_POST['tastensee_testimonial_rating'] ) ) ) );
    }
}
add_action( 'save_post_testimonial', 'tastensee_save_testimonial_rating' );

function tastensee_testimonial_archive_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'testimonial' ) ) {
        $query->set( 'posts_per_page', 12 );
        $query->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
    }
}
add_action( 'pre_get_posts', 'tastensee_testimonial_archive_query' );

function tastensee_testimonial_rewrite_rules() {
    if ( '1' !== get_option( 'tastensee_testimonial_rewrite_version' ) ) {
        flush_rewrite_rules( false );
        update_option( 'tastensee_testimonial_rewrite_version', '1' );
    }
}
add_action( 'init', 'tastensee_testimonial_rewrite_rules', 20 );

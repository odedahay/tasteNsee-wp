<?php
/**
 * Plugin Name: TasteNsee Cakes
 * Description: Registers the Cake post type and Cake Categories independently of the theme.
 * Version: 1.0.0
 * Text Domain: tastensee
 *
 * @package TasteNsee
 */
defined( 'ABSPATH' ) || exit;

function tastensee_register_cakes() {
    register_post_type( 'cake', array(
        'labels' => array(
            'name' => __( 'Cakes', 'tastensee' ),
            'singular_name' => __( 'Cake', 'tastensee' ),
            'add_new_item' => __( 'Add New Cake', 'tastensee' ),
            'edit_item' => __( 'Edit Cake', 'tastensee' ),
            'featured_image' => __( 'Cake image', 'tastensee' ),
            'set_featured_image' => __( 'Set cake image', 'tastensee' ),
        ),
        'public' => true,
        'has_archive' => 'cakes',
        'rewrite' => array( 'slug' => 'cakes', 'with_front' => false ),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'taxonomies' => array( 'cake_category' ),
    ) );

    register_taxonomy( 'cake_category', array( 'cake' ), array(
        'labels' => array(
            'name' => __( 'Cake Categories', 'tastensee' ),
            'singular_name' => __( 'Cake Category', 'tastensee' ),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        // Categories filter the gallery rather than creating separate archives.
        'public' => false,
        'rewrite' => false,
    ) );
}
add_action( 'init', 'tastensee_register_cakes' );

function tastensee_cake_featured_meta_box() {
    add_meta_box(
        'tastensee-cake-homepage',
        __( 'Homepage feature', 'tastensee' ),
        'tastensee_cake_featured_field',
        'cake',
        'side'
    );
}
add_action( 'add_meta_boxes_cake', 'tastensee_cake_featured_meta_box' );

function tastensee_cake_featured_field( $post ) {
    wp_nonce_field( 'tastensee_save_cake_featured', 'tastensee_cake_featured_nonce' );
    ?>
    <label for="tastensee-cake-featured">
        <input id="tastensee-cake-featured" type="checkbox" name="tastensee_cake_featured" value="1" <?php checked( get_post_meta( $post->ID, '_tastensee_cake_featured', true ), '1' ); ?> />
        <?php esc_html_e( 'Featured on homepage', 'tastensee' ); ?>
    </label>
    <p><?php esc_html_e( 'Shows under “Order a Custom Cake”. Upload a cake image first. Up to 10 featured cakes appear, sorted by Order, then title.', 'tastensee' ); ?></p>
    <?php
}

function tastensee_save_cake_featured( $post_id ) {
    if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( ! isset( $_POST['tastensee_cake_featured_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tastensee_cake_featured_nonce'] ) ), 'tastensee_save_cake_featured' ) ) {
        return;
    }
    if ( isset( $_POST['tastensee_cake_featured'] ) && '1' === $_POST['tastensee_cake_featured'] ) {
        update_post_meta( $post_id, '_tastensee_cake_featured', '1' );
    } else {
        delete_post_meta( $post_id, '_tastensee_cake_featured' );
    }
}
add_action( 'save_post_cake', 'tastensee_save_cake_featured' );

function tastensee_cake_archive_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'cake' ) ) {
        // Load the complete collection so category filters and counts agree.
        $query->set( 'posts_per_page', -1 );
        $query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
    }
}
add_action( 'pre_get_posts', 'tastensee_cake_archive_query' );

function tastensee_cake_rewrite_rules() {
    if ( '1' !== get_option( 'tastensee_cake_rewrite_version' ) ) {
        flush_rewrite_rules( false );
        update_option( 'tastensee_cake_rewrite_version', '1' );
    }
}
add_action( 'init', 'tastensee_cake_rewrite_rules', 20 );

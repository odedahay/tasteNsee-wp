<?php
/**
 * Plugin Name: TasteNsee Admin Menu
 * Description: Groups the TasteNsee content menus in the preferred order.
 */
defined( 'ABSPATH' ) || exit;

add_filter( 'custom_menu_order', '__return_true' );

add_filter( 'menu_order', function ( $menu_order ) {
    $preferred_order = array(
        'edit.php?post_type=adult_workshop',
        'edit.php?post_type=kids_workshop',
        'edit.php?post_type=popup',
        'edit.php?post_type=cake',
        'edit.php?post_type=testimonial',
        'edit.php?post_type=workshop_faq',
    );
    $available_menus = array_values( array_intersect( $preferred_order, $menu_order ) );
    $ordered_menus = array();
    $inserted = false;

    foreach ( $menu_order as $menu ) {
        if ( in_array( $menu, $preferred_order, true ) ) {
            if ( ! $inserted ) {
                $ordered_menus = array_merge( $ordered_menus, $available_menus );
                $inserted = true;
            }
            continue;
        }
        $ordered_menus[] = $menu;
    }

    return $ordered_menus;
} );

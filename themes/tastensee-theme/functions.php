<?php
/** Theme setup and assets. @package TasteNsee */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tastensee_setup() {
    load_theme_textdomain( 'tastensee', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'tastensee_setup' );

function tastensee_enqueue_assets() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'tastensee-fonts', 'https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Nunito:wght@400;500;600;700;800&display=swap', array(), null );
    wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css', array(), '4.9.0' );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12' );
    wp_enqueue_style( 'tastensee', get_stylesheet_uri(), array( 'tastensee-fonts', 'remixicon', 'swiper' ), (string) filemtime( get_stylesheet_directory() . '/style.css' ) );
    // Load the original design stylesheet when available.
    if ( file_exists( get_theme_file_path( 'styles.css' ) ) ) {
        wp_enqueue_style( 'tastensee-design', get_theme_file_uri( 'styles.css' ), array( 'tastensee' ), (string) filemtime( get_theme_file_path( 'styles.css' ) ) );
    }
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12', true );
    wp_enqueue_script( 'tastensee', get_theme_file_uri( 'scripts/script.js' ), array( 'swiper' ), (string) filemtime( get_theme_file_path( 'scripts/script.js' ) ), true );
}
add_action( 'wp_enqueue_scripts', 'tastensee_enqueue_assets' );

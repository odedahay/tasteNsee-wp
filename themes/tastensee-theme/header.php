<?php
/** Shared site header. @package TasteNsee */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#f0fae8" />
  <?php if ( ! has_site_icon() ) : ?>
    <link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/favicon.ico' ) ); ?>" />
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/apple-touch-icon.png' ) ); ?>" />
  <?php endif; ?>
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header" id="home">
      <div class="site-header__inner page-shell">
        <a class="site-header__brand" href="<?php echo esc_url( home_url( '/#home' ) ); ?>" aria-label="tasteNsee home">
          <img class="site-header__logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/tastensee-logo.svg' ) ); ?>" alt="tasteNsee" />
        </a>

        <button
          class="site-header__menu-toggle"
          type="button"
          aria-expanded="false"
          aria-controls="primary-navigation"
          aria-label="Open navigation"
        >
          <span class="site-header__menu-line"></span>
          <span class="site-header__menu-line"></span>
          <span class="site-header__menu-line"></span>
        </button>

        <nav class="site-header__nav" id="primary-navigation" aria-label="Primary navigation">
          <a class="site-header__nav-link <?php echo is_front_page() ? 'site-header__nav-link--active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( is_front_page() ) : ?>aria-current="page"<?php endif; ?>>Home</a>
          <a class="site-header__nav-link <?php echo is_post_type_archive( 'cake' ) ? 'site-header__nav-link--active' : ''; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'cake' ) ); ?>" <?php if ( is_post_type_archive( 'cake' ) ) : ?>aria-current="page"<?php endif; ?>>Cakes Gallery</a>
          
          <a class="site-header__nav-link" href="<?php echo esc_url( home_url( '/workshops-events/' ) ); ?>">Workshop &amp; Events</a>
          <div class="site-header__dropdown">
            <button class="site-header__nav-link site-header__dropdown-toggle" type="button" aria-expanded="false">
              More <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
            </button>
            <div class="site-header__dropdown-menu">
              <a class="site-header__dropdown-link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Me</a>
              <a class="site-header__dropdown-link" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
              <a class="site-header__dropdown-link" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">Testimonials</a>
            </div>
          </div>
          <a class="site-header__nav-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        </nav>

        <div class="site-header__actions">
          <a class="site-header__social" href="<?php echo esc_url( home_url( '/#instagram' ) ); ?>" aria-label="Instagram"><i class="ri-instagram-line" aria-hidden="true"></i></a>
          <a class="site-header__social" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" aria-label="Facebook"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
          <a class="button button--small button--solid" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Inquire Now</a>
        </div>
      </div>
    </header>


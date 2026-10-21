<?php
/** Shared site header. @package TasteNsee */
$about_active = is_page( 'about' );
$contact_active = is_page( 'contact' );
$workshops_events_active = is_page( array( 'workshops-events', 'past-events', 'past-event' ) ) || is_singular( 'popup' );
$blog_active = is_page( 'blog' ) || ( is_home() && ! is_front_page() ) || is_singular( 'post' ) || is_category() || is_tag() || is_date() || is_author();
$testimonials_active = is_page( 'testimonials' ) || is_post_type_archive( 'testimonial' ) || is_singular( 'testimonial' ) || is_tax( 'testimonial_category' );
$more_active = $about_active || $blog_active || $testimonials_active;
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
        <a class="site-header__brand" href="<?php echo esc_url( home_url( '' ) ); ?>" aria-label="tasteNsee home">
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
          
          <a class="site-header__nav-link <?php echo $workshops_events_active ? 'site-header__nav-link--active' : ''; ?>" href="<?php echo esc_url( home_url( '/workshops-events/' ) ); ?>" <?php if ( $workshops_events_active ) : ?>aria-current="<?php echo is_page( 'workshops-events' ) ? 'page' : 'location'; ?>"<?php endif; ?>>Workshop &amp; Events</a>
          <div class="site-header__dropdown">
            <button class="site-header__nav-link site-header__dropdown-toggle <?php echo $more_active ? 'site-header__nav-link--active' : ''; ?>" type="button" aria-expanded="false">
              More <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
            </button>
            <div class="site-header__dropdown-menu">
              <a class="site-header__dropdown-link <?php echo $about_active ? 'site-header__dropdown-link--active' : ''; ?>" href="<?php echo esc_url( home_url( '/about/' ) ); ?>" <?php if ( $about_active ) : ?>aria-current="page"<?php endif; ?>>About Me</a>
              <!-- <a class="site-header__dropdown-link <?php //echo $blog_active ? 'site-header__dropdown-link--active' : ''; ?>" href="<?php //echo esc_url( home_url( '/blog/' ) ); ?>" <?php //if ( $blog_active ) : ?>aria-current="page"<?php //endif; ?>>Blog</a> -->
              <a class="site-header__dropdown-link <?php echo $testimonials_active ? 'site-header__dropdown-link--active' : ''; ?>" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" <?php if ( $testimonials_active ) : ?>aria-current="page"<?php endif; ?>>Testimonials</a>
            </div>
          </div>
          <a class="site-header__nav-link <?php echo $contact_active ? 'site-header__nav-link--active' : ''; ?>" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" <?php if ( $contact_active ) : ?>aria-current="page"<?php endif; ?>>Contact</a>
          <div class="site-header__actions site-header__actions--mobile">
            <a class="site-header__social" href="<?php echo esc_url( home_url( '/#instagram' ) ); ?>" aria-label="Instagram"><i class="ri-instagram-line" aria-hidden="true"></i></a>
            <a class="site-header__social" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" aria-label="Facebook"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
            <a class="button button--small button--solid" href="<?php echo esc_url( home_url( '/inquire/' ) ); ?>">Inquire Now</a>
          </div>
        </nav>

        <div class="site-header__actions">
          <a class="site-header__social" href="<?php echo esc_url( home_url( '/#instagram' ) ); ?>" aria-label="Instagram"><i class="ri-instagram-line" aria-hidden="true"></i></a>
          <a class="site-header__social" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" aria-label="Facebook"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
          <a class="button button--small button--solid" href="<?php echo esc_url( home_url( '/inquire/' ) ); ?>">Inquire Now</a>
        </div>
      </div>
    </header>


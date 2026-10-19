<?php
/** Unavailable page template. @package TasteNsee */
get_header();
?>
<main id="main-content">
    <section class="section section--mint not-found" aria-labelledby="not-found-title">
        <div class="page-shell not-found__inner">
            <p class="eyebrow"><?php esc_html_e( 'A little detour', 'tastensee' ); ?></p>
            <p class="not-found__code" aria-hidden="true">404</p>
            <h1 class="section-heading__title" id="not-found-title"><?php esc_html_e( 'This page is unavailable', 'tastensee' ); ?></h1>
            <p class="not-found__description"><?php esc_html_e( 'The page may have moved, or the link may be incorrect. Let’s help you find something sweet.', 'tastensee' ); ?></p>
            <div class="not-found__actions">
                <a class="button button--solid" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'tastensee' ); ?></a>
                <a class="button button--outline" href="<?php echo esc_url( get_post_type_archive_link( 'cake' ) ?: home_url( '/cakes/' ) ); ?>"><?php esc_html_e( 'Browse Cakes', 'tastensee' ); ?></a>
            </div>
            <p class="not-found__help"><?php esc_html_e( 'Need a hand?', 'tastensee' ); ?> <a href="<?php echo esc_url( home_url( '/inquire/' ) ); ?>"><?php esc_html_e( 'Make an inquiry', 'tastensee' ); ?></a></p>
        </div>
    </section>
</main>
<?php get_footer(); ?>

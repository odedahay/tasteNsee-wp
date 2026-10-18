<?php
/** Shared site footer. @package TasteNsee */
?>
    <footer class="site-footer" id="contact">
      <div class="site-footer__inner page-shell">
        <div class="site-footer__grid">
          <div class="site-footer__brand-column">
            <img class="site-footer__logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/tastensee-logo.svg' ) ); ?>" alt="tasteNsee" />
            <p class="site-footer__summary">Custom cakes &amp; desserts, kids and adult creative workshop, dessert tables and edible gifts</p>
            <div class="site-footer__socials">
              <a class="site-footer__social" href="<?php echo esc_url( home_url( '/#instagram' ) ); ?>" aria-label="Instagram"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-instagram.svg' ) ); ?>" alt="" /></a>
              <a class="site-footer__social" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" aria-label="Facebook"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-facebook.svg' ) ); ?>" alt="" /></a>
            </div>
          </div>

          <nav class="site-footer__column" aria-label="Footer quick links">
            <h2 class="site-footer__heading">Quick Links</h2>
            <a href="<?php echo esc_url( home_url( '/#home' ) ); ?>">Home</a>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'cake' ) ); ?>">Cakes</a>
            <a href="<?php echo esc_url( home_url( '/workshops-events/#workshops' ) ); ?>">Workshops</a>
            <a href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">Pop-Up Markets</a>
          </nav>

          <nav class="site-footer__column" aria-label="Customer care links">
            <h2 class="site-footer__heading">Customer Care</h2>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">FAQ</a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Ordering &amp; Pricing</a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Payment &amp; Delivery</a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Returns &amp; Refunds</a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
          </nav>

          <div class="site-footer__column">
            <h2 class="site-footer__heading">Contact Us</h2>
            <a href="tel:+12049638496">204-963-8496</a>
            <a href="mailto:tastensee82@gmail.com">tastensee82@gmail.com</a>
            <address class="site-footer__address">1-204-963-8496 at 270 Sora Way SE<br />Calgary AB</address>
            <h2 class="site-footer__heading site-footer__heading--spaced">Business Hours</h2>
            <p class="site-footer__hours">Mon – Fri: 10:00 AM – 6:00 PM<br />Sat: 10:00 AM – 4:00 PM<br />Sun: Closed</p>
          </div>
        </div>

        <div class="site-footer__bottom">
          <p>© <span data-current-year><?php echo esc_html( wp_date( 'Y' ) ); ?></span> tasteNsee Cakes &amp; Desserts. All Rights Reserved.</p>
          <div class="site-footer__legal">
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Privacy Policy</a>
            <span aria-hidden="true">|</span>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>

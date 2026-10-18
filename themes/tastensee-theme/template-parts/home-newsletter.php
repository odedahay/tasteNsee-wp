<?php
/** Homepage newsletter section. @package TasteNsee */
?>
      <section class="newsletter" aria-labelledby="newsletter-title">
        <div class="newsletter__inner page-shell">
          <div class="newsletter__intro">
            <span class="newsletter__icon" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-mail.svg' ) ); ?>" alt="" /></span>
            <div>
              <h2 class="newsletter__title" id="newsletter-title">Let's Stay in Touch!</h2>
              <p class="newsletter__text">Get baking tips, workshop updates, and special offers straight to your inbox.</p>
            </div>
          </div>
          <form class="newsletter__form" novalidate>
            <label class="sr-only" for="newsletter-email">Your email address</label>
            <input class="newsletter__input" id="newsletter-email" name="email" type="email" placeholder="Your email address" required />
            <button class="button button--solid newsletter__submit" type="submit">Subscribe</button>
            <p class="newsletter__message" aria-live="polite"></p>
          </form>
        </div>
      </section>

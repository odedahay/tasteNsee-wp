<?php
/** Homepage hero section. @package TasteNsee */
?>
      <section class="hero">
        <div class="hero__inner page-shell">
          <div class="hero__content">
            <p class="eyebrow">How sweet it can be!</p>
            <h1 class="hero__title">Made for you!<br />Custom Cakes &amp;<br />Desserts</h1>
            <p class="hero__description">
              Custom cakes, delicious desserts, and creative edible arts workshops for every celebration.
            </p>
            <div class="hero__actions">
              <a class="button button--solid" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order a Cake</a>
              <a class="button button--outline" href="<?php echo esc_url( home_url( '/workshops-events/' ) ); ?>">Join a Workshop</a>
            </div>
          </div>
          <div class="hero__visual">
            <img class="hero__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/hero-cake.png' ) ); ?>" alt="Floral custom cake displayed outdoors" />
            <div class="hero__seal" aria-hidden="true">
              <i class="hero__seal-heart ri-heart-line"></i>
              <span>Made<br />for you</span>
            </div>
          </div>
        </div>
      </section>

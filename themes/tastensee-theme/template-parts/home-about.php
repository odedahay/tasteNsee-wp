<?php
/** Homepage about section. @package TasteNsee */
?>
      <section class="section about" id="about">
        <div class="about__grid page-shell">
          <div class="about__media">
            <img class="about__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-founder.png' ) ); ?>" alt="tasteNsee founder decorating a cake" />
          </div>
          <div class="about__content">
            <p class="eyebrow">About tasteNsee</p>
            <h2 class="section-heading__title">More Than Just Cakes</h2>
            <p class="about__text">
              I'm a certified cake designer, registered nurse, and passionate home baker with over 10 years of
              experience.
            </p>
            <p class="about__text">
              Baking is my way of connecting, creating joy, and making every moment sweeter. Every cake is a blend
              of professional care, thoughtful touch, and love for celebration.
            </p>
            <ul class="about__features">
              <li class="about__feature"><i class="ri-palette-line" aria-hidden="true"></i> Custom Designs</li>
              <li class="about__feature"><i class="ri-cake-3-line" aria-hidden="true"></i> Inclusive &amp; Creative Workshops</li>
              <li class="about__feature"><i class="ri-restaurant-2-line" aria-hidden="true"></i> Made with Premium Ingredients</li>
              <li class="about__feature"><i class="ri-alarm-line" aria-hidden="true"></i> Reliable &amp; On-Time Service</li>
              <li class="about__feature"><i class="ri-user-heart-line" aria-hidden="true"></i> Nurse &amp; Cake Designer</li>
              <li class="about__feature"><i class="ri-service-line" aria-hidden="true"></i> Passionate &amp; Detail-Oriented</li>
            </ul>
            <a class="button button--outline" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Learn Our Story</a>
          </div>
        </div>
      </section>

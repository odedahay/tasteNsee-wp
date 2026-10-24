<?php get_header(); ?>
    
<main id="main-content">
    <section class="page-hero" aria-labelledby="workshops-events-hero-title">
      <div class="page-hero__inner page-shell">
        <p class="eyebrow">Inspire. Create. Belong.</p>
        <h1 class="page-hero__title" id="workshops-events-hero-title">Workshops &amp; Pop-Up Markets</h1>
        <p class="page-hero__description">
          Join a creative workshop for kids or adults, or find tasteNsee at an upcoming Calgary pop-up market.
        </p>
      </div>
    </section>

    <div class="workshops-events-listings">
      <section class="activity-collection page-shell" id="workshops" aria-labelledby="workshops-title">
        <header class="activity-collection__header">
          <div>
            <p class="eyebrow">Learn, make &amp; celebrate</p>
            <h2 class="activity-collection__title" id="workshops-title">Workshops</h2>
          </div>
        </header>

        <div class="workshop-track" id="kids-workshops">
          <div class="workshop-track__header">
            <div>
              <p class="eyebrow">Ages 8–14</p>
              <h3>Kids’ Creative Workshops</h3>
            </div>
            <a class="button button--solid" href="<?php echo esc_url( tastensee_kids_registration_url() ); ?>">Register a Child</a>
          </div>
          <?php $kids_workshops = new WP_Query( tastensee_kids_query_args() ); ?>
          <?php if ( $kids_workshops->have_posts() ) : ?>
          <div class="activity-collection__grid activity-collection__grid--workshops">
            <?php while ( $kids_workshops->have_posts() ) : $kids_workshops->the_post(); ?>
              <?php get_template_part( 'template-parts/kids-workshop-card' ); ?>
            <?php endwhile; ?>
          </div>
          <?php else : ?>
            <p class="activity-collection__empty">New kids’ workshops are coming soon. Please check back for upcoming dates.</p>
          <?php endif; wp_reset_postdata(); ?>
        </div>

        <div class="workshop-track" id="adult-workshops">
          <div class="workshop-track__header">
            <div>
              <p class="eyebrow">Create something delicious</p>
              <h3>Adults’ Edible Art Workshops</h3>
            </div>
            <a class="button button--solid" href="<?php echo esc_url( tastensee_adult_registration_url() ); ?>">Register as an Adult</a>
          </div>
          <?php $adult_workshops = new WP_Query( tastensee_adult_query_args() ); ?>
          <?php if ( $adult_workshops->have_posts() ) : ?>
          <div class="activity-collection__grid activity-collection__grid--workshops">
            <?php while ( $adult_workshops->have_posts() ) : $adult_workshops->the_post(); ?>
              <?php get_template_part( 'template-parts/adult-workshop-card' ); ?>
            <?php endwhile; ?>
          </div>
          <?php else : ?>
            <p class="activity-collection__empty">New adult workshops are coming soon. Please check back for upcoming dates.</p>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </section>

      <section class="activity-collection page-shell" id="markets" aria-labelledby="markets-title">
        <header class="activity-collection__header">
          <div>
            <p class="eyebrow">Find tasteNsee in Calgary</p>
            <h2 class="activity-collection__title" id="markets-title">Pop-Up Markets</h2>
          </div>
          <a class="text-link activity-collection__link" href="<?php echo esc_url( home_url( '/past-events/' ) ); ?>">View Past Events <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
        </header>
        <?php $markets = new WP_Query( tastensee_popup_query_args() ); ?>
        <?php if ( $markets->have_posts() ) : ?>
          <div class="activity-collection__grid">
            <?php while ( $markets->have_posts() ) : $markets->the_post(); ?>
              <?php get_template_part( 'template-parts/popup-card' ); ?>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <p class="activity-collection__empty">No upcoming pop-up markets right now. Check back soon for our next market dates!</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </section>

      <section class="activity-collection page-shell" id="past-workshops" aria-labelledby="past-workshops-title">
        <header class="activity-collection__header">
          <div>
            <p class="eyebrow">Sweet memories</p>
            <h2 class="activity-collection__title" id="past-workshops-title">Past Events & Workshops</h2>
          </div>
          <a class="text-link activity-collection__link" href="<?php echo esc_url( home_url( '/past-events/' ) ); ?>">View All Past Events &amp; Workshops <i
              class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
        </header>
        <?php
        $past_event_args = tastensee_past_activity_query_args( 3 );
        $past_events = new WP_Query( $past_event_args );
        ?>
        <?php if ( $past_events->have_posts() ) : ?>
          <div class="activity-collection__grid">
            <?php while ( $past_events->have_posts() ) : $past_events->the_post(); ?>
              <?php get_template_part( 'template-parts/past-activity-card' ); ?>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <p class="activity-collection__empty">No past events or workshops to display yet. Check back soon for sweet memories!</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </section>
    </div>

    <section class="workshop-values" aria-labelledby="workshop-values-title">
      <div class="workshop-values__inner page-shell">
        <header class="workshop-values__header">
          <p class="eyebrow">Made for every imagination</p>
          <h2 class="workshop-values__title" id="workshop-values-title">See why tasteNsee is made to inspire!</h2>
        </header>
        <div class="workshop-values__grid">
          <article class="workshop-value">
            <span class="workshop-value__icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-small-groups.svg' ) ); ?>" alt="" /></span>
            <h3 class="workshop-value__title">Inclusive</h3>
            <p class="workshop-value__text">Designed for all abilities, with special care for children with autism and
              special needs.</p>
          </article>
          <article class="workshop-value">
            <span class="workshop-value__icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-inclusive.svg' ) ); ?>" alt="" /></span>
            <h3 class="workshop-value__title">Hands-On</h3>
            <p class="workshop-value__text">Every student gets their hands in the dough — learning by doing, not
              watching.</p>
          </article>
          <article class="workshop-value">
            <span class="workshop-value__icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-hands-on.svg' ) ); ?>" alt="" /></span>
            <h3 class="workshop-value__title">Small Groups</h3>
            <p class="workshop-value__text">Limited spots ensure every participant gets personal attention and guidance.
            </p>
          </article>
          <article class="workshop-value">
            <span class="workshop-value__icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-safe-space.svg' ) ); ?>" alt="" /></span>
            <h3 class="workshop-value__title">Safe Space</h3>
            <p class="workshop-value__text">A warm, judgment-free environment where creativity blossoms at every level.
            </p>
          </article>
        </div>
      </div>
    </section>

    <section class="private-events" aria-labelledby="private-events-title">
      <div class="private-events__inner page-shell">
        <div class="private-events__content">
          <p class="private-events__eyebrow">Made for your celebration</p>
          <h2 class="private-events__title" id="private-events-title">Private Events &amp; Group Bookings</h2>
          <p class="private-events__text">
            See why tasteNsee is made to celebrate! Host an unforgettable private cookie, cupcake, or cake decorating
            workshop. Perfect for corporate team building, birthday parties, bridal showers, and private group
            gatherings.
          </p>
          <div class="private-events__actions">
            <a class="button private-events__button private-events__button--solid" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
          </div>
        </div>
        <div class="private-events__media">
          <img class="private-events__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/workshop-event-private.jpeg' ) ); ?>"
            alt="Children celebrating with a decorated birthday cake" />
          <ul class="private-events__features">
            <li>✓ Birthday parties</li>
            <li>✓ School groups</li>
            <li>✓ Team building</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Newsletter subscription section hidden.
      <section class="newsletter newsletter--workshops" aria-labelledby="newsletter-title">
        <div class="newsletter__inner page-shell">
          <div class="newsletter__intro">
            <span class="newsletter__icon" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-workshop-mail.svg' ) ); ?>" alt="" /></span>
            <div>
              <h2 class="newsletter__title" id="newsletter-title">Stay in the Loop!</h2>
              <p class="newsletter__text">Get workshop dates and special offers straight to your inbox.</p>
            </div>
          </div>
          <form class="newsletter__form" novalidate>
            <label class="sr-only" for="workshop-newsletter-email">Your email address</label>
            <input class="newsletter__input" id="workshop-newsletter-email" name="email" type="email" placeholder="Your email address" required />
            <button class="button button--solid newsletter__submit" type="submit">Subscribe</button>
            <p class="newsletter__message" aria-live="polite"></p>
          </form>
        </div>
      </section>
      -->
  </main>


<?php get_footer(); ?>

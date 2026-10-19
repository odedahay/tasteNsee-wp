<?php
get_header();
$thank_you_page = get_page_by_path( 'inquire/thank-you' ) ?: get_page_by_path( 'thank-you' );
$thank_you_url = $thank_you_page ? get_permalink( $thank_you_page ) : home_url( '/thank-you/' );
?>

 <main id="main-content">
      <section class="contact contact--message">
        <div class="contact__inner contact__inner--message">
          <header class="contact__heading">
            <p class="contact__eyebrow">Let's talk cake</p>
            <h1 class="contact__title">How can we help?</h1>
            <p class="contact__intro">
              Questions about an existing order, workshops, events, or anything else? Send us a message.
            </p>
          </header>

          <div class="contact__layout contact__layout--message">
            <?php echo do_shortcode( '[contact-form-7 id="8315dcb" title="Contact"]' ); ?>

            <aside class="contact__aside contact__aside--message" aria-label="Other contact options">
              <section class="contact-panel contact-inquiry-card">
                <div class="contact-inquiry-card__eyebrow">
                  <img src="<?php echo esc_url( get_theme_file_uri( 'assets/contact-celebration.svg' ) ); ?>" alt="" />
                  <p>Planning Celebration?</p>
                </div>
                <h2>Looking for a custom cake?</h2>
                <p class="contact-panel__intro">Tells about your date, serving, flavour and design ideas.</p>
                <a class="contact-inquiry-card__button" href="consultation.html">
                  Start a Cake Inquiry <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </section>

              <section class="contact-panel contact-reach-card">
                <h2>Other ways to reach us</h2>
                <p class="contact-panel__intro">Tells about your date, serving, flavour and design ideas.</p>

                <address class="contact-reach-card__list">
                  <a class="contact-reach-card__item" href="tel:+12049638496">
                    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/contact-card-phone.svg' ) ); ?>" alt="" />
                    <span><strong>Phone</strong><small>204-963-8496</small></span>
                  </a>
                  <a class="contact-reach-card__item" href="mailto:tastensee82@gmail.com">
                    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/contact-card-email.svg' ) ); ?>" alt="" />
                    <span><strong>Email</strong><small>tastensee82@gmail.com</small></span>
                  </a>
                  <a class="contact-reach-card__item" href="index.html#instagram">
                    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/contact-card-instagram.svg' ) ); ?>" alt="" />
                    <span><strong>Instagram</strong><small>@tatsensee82</small></span>
                  </a>
                  <div class="contact-reach-card__item contact-reach-card__item--hours">
                    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/contact-card-hours.svg' ) ); ?>" alt="" />
                    <span>
                      <strong>Business Hours</strong>
                      <small>Mon - Friday: 10:00 am - 6:00 pm<br />Sat: 10:00 am - 4:00 pm<br />Sun: Close</small>
                    </span>
                  </div>
                </address>
              </section>
            </aside>
          </div>

          <a class="contact__back" href="index.html"><i class="ri-arrow-left-line" aria-hidden="true"></i>Back to home</a>
        </div>
      </section>
    </main>


<?php get_footer(); ?>

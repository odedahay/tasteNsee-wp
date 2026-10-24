<?php
/** Template Name: Adult Workshop Registration */
get_header();
?>

   <main id="main-content">
      <section class="workshop-registration">
        <div class="workshop-registration__inner">
          <header class="workshop-registration__heading">
            <h1 class="workshop-registration__title">Adult Edible Art Workshop</h1>
            <p class="workshop-registration__intro">Choose your workshop and share anything that will help us make your experience comfortable and inspiring.</p>
          </header>
          <div class="workshop-registration__layout workshop-registration__layout--centered">
            <div class="registration-form registration-form--forminator">
              <header class="registration-form__header"><h2 class="registration-form__title">Workshop Registration</h2><p class="registration-form__subtitle">Adult participant registration and consent form</p></header>
              <div class="registration-form__body">
                <?php $adult_form_id = (int) get_option( 'tastensee_adult_form_id' ); ?>
                <?php if ( ! function_exists( 'forminator_form' ) || ! $adult_form_id ) : ?>
                  <p role="status">Registration is temporarily unavailable. Please contact us for assistance.</p>
                <?php elseif ( ! tastensee_adult_options() ) : ?>
                  <p role="status">No adult workshops are currently open for registration. Please check back soon.</p>
                <?php else : ?>
                  <?php echo do_shortcode( '[forminator_form id="' . $adult_form_id . '"]' ); ?>
                <?php endif; ?>
              </div>
              <footer class="registration-form__footer">
                <address class="registration-form__contact"><a href="tel:+12049638496"><i class="ri-phone-line" aria-hidden="true"></i>204-963-8496</a><a href="mailto:tastensee82@gmail.com"><i class="ri-mail-line" aria-hidden="true"></i>tastensee82@gmail.com</a></address>
                <a class="registration-form__back" href="<?php echo esc_url( home_url( '/workshops-events/#adult-workshops' ) ); ?>"><i class="ri-arrow-left-line" aria-hidden="true"></i>Back to workshops</a>
              </footer>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
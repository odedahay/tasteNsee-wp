<?php get_header(); ?>

<main id="main-content">
    <section class="workshop-registration">
        <div class="workshop-registration__inner">
            <header class="workshop-registration__heading">
                <h1 class="workshop-registration__title">Kids’ Workshop Registration</h1>
                <p class="workshop-registration__intro">
                    Choose a workshop and tell us what your child needs for a safe, creative, and joyful experience.
                </p>
            </header>

            <div class="workshop-registration__layout">
                <div class="registration-form registration-form--forminator">
                    <header class="registration-form__header">
                        <h2 class="registration-form__title">Workshop Registration</h2>
                        <p class="registration-form__subtitle">Registration &amp; Consent Form. Participant Age Group: 8–14 yrs old</p>
                    </header>

                    <div class="registration-form__body">
                        <?php
                        $kids_form_id = (int) get_option( 'tastensee_kids_form_id' );
                        if ( ! function_exists( 'forminator_form' ) || ! $kids_form_id ) : ?>
                            <p role="status">Registration is temporarily unavailable. Please contact us for assistance.</p>
                        <?php elseif ( ! tastensee_kids_options() ) : ?>
                            <p role="status">No kids’ workshops are currently open for registration. Please check back soon.</p>
                        <?php else : ?>
                            <?php echo do_shortcode( '[forminator_form id="' . $kids_form_id . '"]' ); ?>
                        <?php endif; ?>
                    </div>

                    <footer class="registration-form__footer">
                        <address class="registration-form__contact">
                            <a href="tel:+12049638496"><i class="ri-phone-line" aria-hidden="true"></i>204-963-8496</a>
                            <a href="mailto:tastensee82@gmail.com"><i class="ri-mail-line" aria-hidden="true"></i>tastensee82@gmail.com</a>
                        </address>
                        <a class="registration-form__back" href="<?php echo esc_url( home_url( '/workshops-events/#kids-workshops' ) ); ?>"><i class="ri-arrow-left-line" aria-hidden="true"></i>Back to workshops</a>
                    </footer>
                </div>

                <aside class="workshop-registration__aside" aria-label="Workshop contact information">
                    <section class="studio-card studio-card--workshop">
                        <img class="studio-card__image" src="<?php echo esc_url(get_theme_file_uri('assets/workshop-studio.png')); ?>" alt="Interior of the tasteNsee studio" />
                        <div class="studio-card__overlay" aria-hidden="true"></div>
                        <div class="studio-card__content">
                            <p class="studio-card__eyebrow">Come say hello</p>
                            <h2 class="studio-card__title">tasteNsee Studio</h2>
                            <address class="studio-card__details">
                                <span><i class="ri-map-pin-line" aria-hidden="true"></i>270 Sora Way SE, Calgary AB</span>
                                <span><i class="ri-time-line" aria-hidden="true"></i>Mon – Fri: 10 AM – 6 PM</span>
                                <span><i class="ri-calendar-line" aria-hidden="true"></i>Sat by appointment · Sun closed</span>
                            </address>
                        </div>
                    </section>

                    <section class="workshop-host">
                        <img class="workshop-host__image" src="<?php echo esc_url(get_theme_file_uri('assets/workshop-host.png')); ?>" alt="Karen from tasteNsee" />
                        <div class="workshop-host__content">
                            <p class="workshop-host__eyebrow">Who you're writing to</p>
                            <h2 class="workshop-host__name">Karen</h2>
                            <p class="workshop-host__role">Certified Cake Designer · Registered Nurse · Calgary, AB</p>
                            <p class="workshop-host__description">
                                Every inquiry is read personally and answered with warmth and detail. There’s no question too small and no brief too vague — Karen loves a good conversation about cake.
                            </p>
                            <ul class="workshop-host__tags" aria-label="Experience and qualifications">
                                <li>10+ years experience</li>
                                <li>200+ custom cakes</li>
                                <li>Inclusive approach</li>
                                <li>Certified cake designer</li>
                            </ul>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
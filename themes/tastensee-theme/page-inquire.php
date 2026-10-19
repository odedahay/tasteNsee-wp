<?php
get_header();
$thank_you_page = get_page_by_path( 'inquire/thank-you' ) ?: get_page_by_path( 'thank-you' );
$thank_you_url = $thank_you_page ? get_permalink( $thank_you_page ) : home_url( '/thank-you/' );
?>


<main id="main-content">
    <section class="contact contact--consultation">
        <div class="contact__inner contact__inner--consultation">
            <header class="contact__heading">
                <p class="contact__eyebrow">Lets create something sweet</p>
                <h1 class="contact__title">Request a Custom Cake Quote</h1>
                <p class="contact__intro">
                    Tell us about your celebration. We’ll review your date and requirements and respond within 24 hours.
                </p>
            </header>

            <div class="contact__layout" data-inquiry-success-url="<?php echo esc_url( $thank_you_url ); ?>">
               <?php echo do_shortcode( '[contact-form-7 id="63" title="Contact form - Inquire"]' ); ?>

                <aside class="contact__aside" aria-label="Consultation information">
                    <section class="quote-steps">
                        <h2 class="quote-steps__title">What happen next</h2>
                        <ol class="quote-steps__list">
                            <li>
                                <span class="quote-steps__number">1</span>
                                <div>
                                    <h3>We review your details</h3>
                                    <p>We check your date, requirements and delivery area</p>
                                </div>
                            </li>
                            <li>
                                <span class="quote-steps__number">2</span>
                                <div>
                                    <h3>We receive your quotes</h3>
                                    <p>We approve, we approve it when you’re ready</p>
                                </div>
                            </li>
                            <li>
                                <span class="quote-steps__number">3</span>
                                <div>
                                    <h3>We contact you</h3>
                                    <p>We clarify ideas, flavours, sizing, pickup, and delivery</p>
                                </div>
                            </li>
                        </ol>
                    </section>

                    <section class="quote-consultant">
                        <div class="quote-consultant__profile">
                            <img class="workshop-host__image" src="<?php echo esc_url( get_theme_file_uri('assets/workshop-host.png') ); ?>" alt="Karen, tasteNsee consultant" />
                            <div class="workshop-host__content">
                                <p class="workshop-host__eyebrow">Meet your consultant</p>
                                <h2 class="workshop-host__name">Karen</h2>
                                <p class="workshop-host__role">Certified Cake Designer · Registered Nurse · Calgary, AB</p>
                                <p class="workshop-host__description">
                                    Karen brings ten years of professional cake design experience and a genuine warmth to every consultation. She takes time to truly understand your vision and helps shape it into something beautiful and uniquely yours.
                                </p>
                            </div>
                        </div>
                        <ul class="workshop-host__tags" aria-label="Experience and qualifications">
                            <li>10+ years experience</li>
                            <li>200+ custom cakes</li>
                            <li>Inclusive approach</li>
                            <li>Certified cake designer</li>
                        </ul>
                    </section>

                    <section class="studio-card">
                        <img class="studio-card__image" src="<?php echo esc_url( get_theme_file_uri('assets/contact-studio.png')); ?>" alt="Interior of the tasteNsee studio" />
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
                </aside>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>

<?php

/** Kids workshop details, using the existing workshop layout. */
$kids_detail_id = get_queried_object_id();
$kids_detail = tastensee_kids_details($kids_detail_id);
$kids_date_label = $kids_detail['date'] ? wp_date('l, F j, Y', $kids_detail['date']->getTimestamp()) : 'Date to be announced';
$kids_location = $kids_detail['location'] ?: 'Location to be confirmed';
$kids_time_label = $kids_detail['time'] ?: 'Time to be confirmed';
$kids_booking_url = tastensee_kids_registration_url($kids_detail_id);
$kids_is_available = tastensee_kids_available($kids_detail_id);
$kids_unavailable_message = 'full' === $kids_detail['status'] ? 'This workshop is fully booked.' : 'Registration is currently closed for this workshop.';
if ($kids_detail['date'] && $kids_detail['date']->format('Ymd') < current_datetime()->format('Ymd')) {
    $kids_unavailable_message = 'This workshop has ended. Browse our upcoming kids’ workshops for new dates.';
}

// Validate the stored times before calculating duration or the suggested schedule.
$kids_times = array();
foreach (array('start', 'end') as $kids_time_key) {
    $kids_raw_time = (string) get_post_meta($kids_detail_id, 'kids_workshop_' . $kids_time_key . '_time', true);
    $kids_parsed_time = DateTimeImmutable::createFromFormat('!H:i:s', $kids_raw_time, wp_timezone());
    $kids_times[$kids_time_key] = $kids_parsed_time && $kids_parsed_time->format('H:i:s') === $kids_raw_time ? $kids_parsed_time : null;
}
$kids_start_dt = $kids_times['start'];
$kids_end_dt = $kids_times['end'];
$kids_minutes = $kids_start_dt && $kids_end_dt ? max(0, (int) (($kids_end_dt->getTimestamp() - $kids_start_dt->getTimestamp()) / 60)) : 0;
$kids_duration_parts = array();
if ($kids_minutes >= 60) {
    $kids_hours = intdiv($kids_minutes, 60);
    $kids_duration_parts[] = $kids_hours . (1 === $kids_hours ? ' hour' : ' hours');
}
if ($kids_minutes % 60) {
    $kids_duration_parts[] = ($kids_minutes % 60) . ' minutes';
}
$kids_duration = $kids_duration_parts ? implode(' ', $kids_duration_parts) : 'Contact us for details';
// Optional sidebar values are managed in the workshop's editable ACF group.
$kids_custom_duration = trim((string) get_post_meta($kids_detail_id, 'kids_workshop_duration', true));
if ('' !== $kids_custom_duration) {
    $kids_duration = $kids_custom_duration;
}
$kids_level = trim((string) get_post_meta($kids_detail_id, 'kids_workshop_level', true));
$kids_level = '' !== $kids_level ? $kids_level : 'All abilities';
$kids_group_size = filter_var(get_post_meta($kids_detail_id, 'kids_workshop_group_size', true), FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)));
$kids_group_size = false !== $kids_group_size ? $kids_group_size : 12;
$kids_schedule_time = static function ($fraction) use ($kids_start_dt, $kids_minutes) {
    return $kids_start_dt && $kids_minutes ? wp_date('g:i A', $kids_start_dt->getTimestamp() + (int) round($kids_minutes * $fraction) * 60) : '—';
};
$kids_image_id = get_post_thumbnail_id($kids_detail_id);
$kids_image_alt = $kids_image_id ? get_post_meta($kids_image_id, '_wp_attachment_image_alt', true) : '';
$kids_image_alt = $kids_image_alt ?: get_the_title($kids_detail_id);
$kids_facebook_url = add_query_arg('u', get_permalink($kids_detail_id), 'https://www.facebook.com/sharer/sharer.php');
get_header();
?>


<main id="main-content">
    <nav class="workshop-detail-breadcrumb page-shell" aria-label="Breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a><i class="ri-arrow-right-s-line" aria-hidden="true"></i>
        <a href="<?php echo esc_url(home_url('/workshops-events/#kids-workshops')); ?>">Workshops</a><i class="ri-arrow-right-s-line" aria-hidden="true"></i>
        <strong><?php echo esc_html(get_the_title($kids_detail_id)); ?></strong>
    </nav>

    <section class="workshop-detail-hero page-shell" aria-labelledby="workshop-detail-title">
        <img class="workshop-detail-hero__image" src="<?php echo esc_url(get_the_post_thumbnail_url($kids_detail_id, 'large') ?: get_theme_file_uri('assets/workshop-details-hero.jpg')); ?>" alt="<?php echo esc_attr($kids_image_alt); ?>" />
        <div class="workshop-detail-hero__overlay" aria-hidden="true"></div>
        <!-- <div class="workshop-detail-hero__status">
          <span>All abilities</span><strong>8 spots left</strong>
        </div> -->
        <div class="workshop-detail-hero__content">
            <!-- <div class="workshop-detail-hero__tags"><span>Kids</span><span>Edible Art</span><span>Inclusive</span></div> -->
            <p class="workshop-detail-hero__eyebrow">Fun, Engaging &amp; Inclusive</p>
            <h1 id="workshop-detail-title"><?php echo esc_html(get_the_title($kids_detail_id)); ?></h1>
            <ul class="workshop-detail-hero__facts" aria-label="Workshop details">
                <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-date.svg')); ?>" alt="" /><?php echo esc_html($kids_date_label); ?></li>
                <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-time.svg')); ?>" alt="" /><?php echo esc_html($kids_time_label); ?></li>
                <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-time.svg')); ?>" alt="" /><?php echo esc_html($kids_duration); ?></li>
                <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-location.svg')); ?>" alt="" /><?php echo esc_html($kids_location); ?></li>
            </ul>
        </div>
    </section>

    <section class="workshop-detail-content">
        <div class="workshop-detail-content__inner page-shell">
            <div class="workshop-detail-main">
                <section class="workshop-detail-about" aria-labelledby="workshop-about-title">
                    <p class="workshop-detail-heading">About this Workshop</p>
                    <h2 id="workshop-about-title"><?php echo esc_html(get_the_title($kids_detail_id)); ?></h2>
                    <?php if (trim(get_post_field('post_content', $kids_detail_id))) : ?>
                        <?php echo apply_filters('the_content', get_post_field('post_content', $kids_detail_id)); ?>
                    <?php else : ?>
                      <p>
                            No Details uploaded
                        </p>
                    <?php endif; ?>
                </section>

                <!-- <section class="workshop-detail-schedule" aria-labelledby="workshop-schedule-title">
                    <p class="workshop-detail-heading" id="workshop-schedule-title">Workshop Schedule</p>
                    <p class="workshop-detail-schedule__intro">A suggested flow for the workshop<?php echo $kids_minutes ? esc_html(' (' . $kids_duration . ')') : ''; ?></p>
                    <ol class="workshop-detail-schedule__list">
                        <li><time><?php echo esc_html($kids_schedule_time(0)); ?></time><span>Welcome &amp; aprons on — meet your fellow bakers!</span></li>
                        <li><time><?php echo esc_html($kids_schedule_time(0.125)); ?></time><span>Meet the materials — colour, texture, tools, and safe techniques</span></li>
                        <li><time><?php echo esc_html($kids_schedule_time(0.292)); ?></time><span>Build your edible canvas with guided, step-by-step decorating</span></li>
                        <li><time><?php echo esc_html($kids_schedule_time(0.5)); ?></time><span>Create buttercream, fondant, and edible-art details</span></li>
                        <li><time><?php echo esc_html($kids_schedule_time(0.792)); ?></time><span>Add personal finishing touches and decorate your presentation board</span></li>
                        <li><time><?php echo esc_html($kids_schedule_time(0.917)); ?></time><span>Celebrate, share photos, and take your creation home!</span></li>
                    </ol>
                </section> -->

                <!-- <section class="workshop-detail-card workshop-detail-learn" aria-labelledby="workshop-learn-title">
                    <h2 id="workshop-learn-title">What You'll Learn</h2>
                    <ul>
                        <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Confident use of child-friendly decorating tools</li>
                        <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Buttercream piping and simple fondant details</li>
                        <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Colour mixing, texture, and edible decoration</li>
                        <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Basic composition and creative planning</li>
                        <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Creative confidence, patience, and self-expression</li>
                    </ul>
                </section>

                <div class="workshop-detail-info-grid">
                    <section class="workshop-detail-card workshop-detail-list" aria-labelledby="workshop-included-title">
                        <h2 id="workshop-included-title">What's Included</h2>
                        <ul>
                            <li>All materials and ingredients provided</li>
                            <li>A personal edible-art creation to take home</li>
                            <li>Patient, step-by-step guided instruction</li>
                            <li>Apron provided for the class</li>
                            <li>Take-home recipe card and tip sheet</li>
                            <li>Celebration and photo moment at the end</li>
                        </ul>
                    </section>
                    <section class="workshop-detail-card workshop-detail-list workshop-detail-list--green" aria-labelledby="workshop-know-title">
                        <h2 id="workshop-know-title">Good to Know</h2>
                        <ul>
                            <li><i class="ri-arrow-right-line" aria-hidden="true"></i>Suitable for ages 8–14</li>
                            <li><i class="ri-arrow-right-line" aria-hidden="true"></i>All abilities and experience levels are welcome</li>
                            <li><i class="ri-arrow-right-line" aria-hidden="true"></i>Comfortable clothing recommended</li>
                            <li><i class="ri-arrow-right-line" aria-hidden="true"></i>Please note allergies or support needs during registration</li>
                        </ul>
                    </section>
                </div> -->

                <section class="workshop-detail-faq" aria-labelledby="workshop-faq-title">
                    <p class="workshop-detail-heading">Have Questions?</p>
                    <h2 id="workshop-faq-title">Frequently Asked</h2>
                    <div class="workshop-detail-faq__list site-accordion" data-accordion>
                        <article class="workshop-detail-faq__item site-accordion__item">
                            <button class="site-accordion__trigger" type="button" aria-expanded="false" aria-controls="workshop-faq-parent" data-faq-trigger>
                                <span>Can a parent stay and watch?</span><i class="ri-add-line" aria-hidden="true"></i>
                            </button>
                            <div class="workshop-detail-faq__answer site-accordion__panel" id="workshop-faq-parent" aria-hidden="true">
                                <div class="site-accordion__panel-inner">
                                    <div class="site-accordion__content">
                                        <p>Parents are welcome to stay when space allows. Let us know during registration so we can prepare the room comfortably.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="workshop-detail-faq__item site-accordion__item">
                            <button class="site-accordion__trigger" type="button" aria-expanded="false" aria-controls="workshop-faq-allergies" data-faq-trigger>
                                <span>What if my child has food allergies?</span><i class="ri-add-line" aria-hidden="true"></i>
                            </button>
                            <div class="workshop-detail-faq__answer site-accordion__panel" id="workshop-faq-allergies" aria-hidden="true">
                                <div class="site-accordion__panel-inner">
                                    <div class="site-accordion__content">
                                        <p>Please list every allergy on the registration form. We will contact you before class to confirm whether suitable accommodations can be made.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="workshop-detail-faq__item site-accordion__item">
                            <button class="site-accordion__trigger" type="button" aria-expanded="false" aria-controls="workshop-faq-group" data-faq-trigger>
                                <span>Can I book for a group or birthday party?</span><i class="ri-add-line" aria-hidden="true"></i>
                            </button>
                            <div class="workshop-detail-faq__answer site-accordion__panel" id="workshop-faq-group" aria-hidden="true">
                                <div class="site-accordion__panel-inner">
                                    <div class="site-accordion__content">
                                        <p>Yes. Private workshops can be tailored for birthdays, school groups, and community events. Contact us for availability and pricing.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="workshop-detail-faq__item site-accordion__item">
                            <button class="site-accordion__trigger" type="button" aria-expanded="false" aria-controls="workshop-faq-time" data-faq-trigger>
                                <span>How do you support children with different abilities?</span><i class="ri-add-line" aria-hidden="true"></i>
                            </button>
                            <div class="workshop-detail-faq__answer site-accordion__panel" id="workshop-faq-time" aria-hidden="true">
                                <div class="site-accordion__panel-inner">
                                    <div class="site-accordion__content">
                                        <p>We use small groups, visual demonstrations, a patient pace, and individual guidance. Share any support needs during registration so we can help your child feel comfortable and successful.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <?php get_template_part( 'template-parts/workshop-instructor' ); ?>
            </div>

            <aside class="workshop-booking" aria-label="Book this workshop">
                <div class="workshop-booking__card">
                    <header class="workshop-booking__price">
                        <span>Workshop fee</span><strong><?php echo esc_html('' !== $kids_detail['price'] ? 'CAD $' . number_format((float) $kids_detail['price'], 2) : 'Contact us'); ?></strong><small>per person · all materials included</small>
                    </header>
                    <div class="workshop-booking__body">
                        <div class="workshop-booking__date">
                            <?php if ($kids_detail['date']) : ?><time datetime="<?php echo esc_attr($kids_detail['date']->format('Y-m-d')); ?>"><span><?php echo esc_html(wp_date('M', $kids_detail['date']->getTimestamp())); ?></span><strong><?php echo esc_html($kids_detail['date']->format('d')); ?></strong></time><?php endif; ?>
                            <div><strong><?php echo esc_html($kids_date_label); ?></strong><span><?php echo esc_html($kids_time_label); ?></span></div>
                        </div>
                        <dl class="workshop-booking__facts">
                            <div>
                                <dt>Duration</dt>
                                <dd><?php echo esc_html($kids_duration); ?></dd>
                            </div>
                            <div>
                                <dt>Level</dt>
                                <dd><?php echo esc_html($kids_level); ?></dd>
                            </div>
                            <div>
                                <dt>Group size</dt>
                                <dd><?php echo esc_html('Max ' . $kids_group_size); ?></dd>
                            </div>
                            <div>
                                <dt>Location</dt>
                                <dd><?php echo esc_html($kids_location); ?></dd>
                            </div>
                        </dl>
                        <div class="workshop-booking__actions">
                            <?php if ($kids_is_available) : ?><a class="button button--solid" href="<?php echo esc_url($kids_booking_url); ?>">Book Your Spot</a><?php else : ?><p role="status"><?php echo esc_html($kids_unavailable_message); ?></p><?php endif; ?>
                            <button class="button button--outline" type="button" data-copy-link>Share this workshop</button>
                            <span class="workshop-booking__message" aria-live="polite" data-copy-message></span>
                        </div>
                        <ul class="workshop-booking__benefits">
                            <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-cancel.svg')); ?>" alt="" />Cancellation terms apply; please review the workshop policy</li>
                            <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-materials.svg')); ?>" alt="" />All materials and ingredients included</li>
                            <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-address.svg')); ?>" alt="" /><?php echo esc_html($kids_location); ?></li>
                        </ul>
                    </div>
                    <footer class="workshop-booking__share">
                        <span>Share this workshop</span>
                        <div>
                            <a href="<?php echo esc_url($kids_facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook"><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-facebook.svg')); ?>" alt="" /></a>
                            <button type="button" aria-label="Copy workshop link to share on Instagram" data-copy-link><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-instagram.svg')); ?>" alt="" /></button>
                            <button type="button" aria-label="Copy workshop link" data-copy-link><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-link.svg')); ?>" alt="" /></button>
                        </div>
                    </footer>
                </div>
            </aside>
        </div>
    </section>

</main>



<?php get_footer(); ?>
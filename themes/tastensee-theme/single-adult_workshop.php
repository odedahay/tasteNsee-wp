<?php

/** Adult workshop details. */
$adult_id = get_queried_object_id();
$adult = tastensee_adult_details($adult_id);
$adult_date_label = $adult['date'] ? wp_date('l, F j, Y', $adult['date']->getTimestamp()) : 'Date to be announced';
$adult_location = $adult['location'] ?: 'Location to be confirmed';
$adult_open = tastensee_adult_available($adult_id);
$adult_status = 'full' === $adult['status'] ? 'This workshop is fully booked.' : 'Registration is currently closed for this workshop.';
if ($adult['date'] && $adult['date']->format('Ymd') < current_datetime()->format('Ymd')) {
  $adult_status = 'This workshop has ended. Browse our upcoming adult workshops for new dates.';
}
$adult_booking_url = tastensee_adult_registration_url($adult_id);
$adult_time_label = $adult['time'] ?: 'Time to be confirmed';
$adult_times = array();
foreach (array('start', 'end') as $adult_time_key) {
  $adult_raw_time = (string) get_post_meta($adult_id, 'adult_workshop_' . $adult_time_key . '_time', true);
  $adult_parsed_time = DateTimeImmutable::createFromFormat('!H:i:s', $adult_raw_time, wp_timezone());
  $adult_times[$adult_time_key] = $adult_parsed_time && $adult_parsed_time->format('H:i:s') === $adult_raw_time ? $adult_parsed_time : null;
}
$adult_start_dt = $adult_times['start'];
$adult_end_dt = $adult_times['end'];
$adult_minutes = $adult_start_dt && $adult_end_dt ? max(0, (int) (($adult_end_dt->getTimestamp() - $adult_start_dt->getTimestamp()) / 60)) : 0;
$adult_duration_parts = array();
if ($adult_minutes >= 60) {
  $adult_hours = intdiv($adult_minutes, 60);
  $adult_duration_parts[] = $adult_hours . (1 === $adult_hours ? ' hour' : ' hours');
}
if ($adult_minutes % 60) {
  $adult_duration_parts[] = ($adult_minutes % 60) . ' minutes';
}
$adult_duration = $adult_duration_parts ? implode(' ', $adult_duration_parts) : 'Contact us for details';
// Optional sidebar values are managed in the workshop's editable ACF group.
$adult_custom_duration = trim((string) get_post_meta($adult_id, 'adult_workshop_duration', true));
if ('' !== $adult_custom_duration) {
    $adult_duration = $adult_custom_duration;
}
$adult_level = trim((string) get_post_meta($adult_id, 'adult_workshop_level', true));
$adult_level = '' !== $adult_level ? $adult_level : 'All abilities';
$adult_group_size = filter_var(get_post_meta($adult_id, 'adult_workshop_group_size', true), FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)));
$adult_group_size = false !== $adult_group_size ? $adult_group_size : 12;
$adult_schedule_time = static function ($fraction) use ($adult_start_dt, $adult_minutes) {
  return $adult_start_dt && $adult_minutes ? wp_date('g:i A', $adult_start_dt->getTimestamp() + (int) round($adult_minutes * $fraction) * 60) : '—';
};
$adult_image_id = get_post_thumbnail_id($adult_id);
$adult_image_alt = $adult_image_id ? get_post_meta($adult_image_id, '_wp_attachment_image_alt', true) : '';
$adult_image_alt = $adult_image_alt ?: get_the_title($adult_id);
$adult_share_url = add_query_arg('u', rawurlencode(get_permalink($adult_id)), 'https://www.facebook.com/sharer/sharer.php');
get_header();
?>

<main id="main-content">
  <nav class="workshop-detail-breadcrumb page-shell" aria-label="Breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a><i class="ri-arrow-right-s-line" aria-hidden="true"></i>
    <a href="<?php echo esc_url(home_url('/workshops-events/#adult-workshops')); ?>">Workshops</a><i class="ri-arrow-right-s-line" aria-hidden="true"></i>
    <strong><?php echo esc_html(get_the_title($adult_id)); ?></strong>
  </nav>

  <section class="workshop-detail-hero page-shell" aria-labelledby="workshop-detail-title">
    <img class="workshop-detail-hero__image" src="<?php echo esc_url(get_the_post_thumbnail_url($adult_id, 'large') ?: get_theme_file_uri('assets/workshop-event-cake.jpeg')); ?>" alt="<?php echo esc_attr($adult_image_alt); ?>" />
    <div class="workshop-detail-hero__overlay" aria-hidden="true"></div>
    <!-- <div class="workshop-detail-hero__status">
          <span>All abilities</span><strong>8 spots left</strong>
        </div> -->
    <div class="workshop-detail-hero__content">
      <!-- <div class="workshop-detail-hero__tags"><span>Adults</span><span>Edible Art</span><span>Inclusive</span></div> -->
      <p class="workshop-detail-hero__eyebrow">Fun, Engaging &amp; Inclusive</p>
      <h1 id="workshop-detail-title"><?php echo esc_html(get_the_title($adult_id)); ?></h1>
      <ul class="workshop-detail-hero__facts" aria-label="Workshop details">
        <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-date.svg')); ?>" alt="" /><?php echo esc_html($adult_date_label); ?></li>
        <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-time.svg')); ?>" alt="" /><?php echo esc_html($adult_time_label); ?></li>
        <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-time.svg')); ?>" alt="" /><?php echo esc_html($adult_duration); ?></li>
        <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-location.svg')); ?>" alt="" /><?php echo esc_html($adult_location); ?></li>
      </ul>
    </div>
  </section>

  <section class="workshop-detail-content">
    <div class="workshop-detail-content__inner page-shell">
      <div class="workshop-detail-main">
        <section class="workshop-detail-about" aria-labelledby="workshop-about-title">
          <p class="workshop-detail-heading">About this Workshop</p>
          <h2 id="workshop-about-title"><?php echo esc_html(get_the_title($adult_id)); ?></h2>
          <?php if (trim(get_post_field('post_content', $adult_id))) : ?>
            <?php echo apply_filters('the_content', get_post_field('post_content', $adult_id)); ?>
          <?php else : ?>
            <p>
              No Details uploaded
            </p>
          <?php endif; ?>
        </section>

        <!-- <section class="workshop-detail-schedule" aria-labelledby="workshop-schedule-title">
              <p class="workshop-detail-heading" id="workshop-schedule-title">Workshop Schedule</p>
              <p class="workshop-detail-schedule__intro">A suggested flow for the workshop<?php echo $adult_minutes ? esc_html(' (' . $adult_duration . ')') : ''; ?></p>
              <ol class="workshop-detail-schedule__list">
                <li><time><?php echo esc_html($adult_schedule_time(0)); ?></time><span>Welcome &amp; aprons on — meet your fellow bakers!</span></li>
                <li><time><?php echo esc_html($adult_schedule_time(0.125)); ?></time><span>Meet the materials — colour, texture, tools, and safe techniques</span></li>
                <li><time><?php echo esc_html($adult_schedule_time(0.292)); ?></time><span>Build your edible canvas with guided, step-by-step decorating</span></li>
                <li><time><?php echo esc_html($adult_schedule_time(0.5)); ?></time><span>Create buttercream, fondant, and edible-art details</span></li>
                <li><time><?php echo esc_html($adult_schedule_time(0.792)); ?></time><span>Add personal finishing touches and decorate your presentation board</span></li>
                <li><time><?php echo esc_html($adult_schedule_time(0.917)); ?></time><span>Celebrate, share photos, and take your creation home!</span></li>
              </ol>
            </section> -->

        <!-- <section class="workshop-detail-card workshop-detail-learn" aria-labelledby="workshop-learn-title">
              <h2 id="workshop-learn-title">What You'll Learn</h2>
              <ul>
                <li><span><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-check.svg')); ?>" alt="" /></span>Confident use of decorating tools</li>
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
                  <li><i class="ri-arrow-right-line" aria-hidden="true"></i>For adults aged 18 and above</li>
                  <li><i class="ri-arrow-right-line" aria-hidden="true"></i>All abilities and experience levels are welcome</li>
                  <li><i class="ri-arrow-right-line" aria-hidden="true"></i>Comfortable clothing recommended</li>
                  <li><i class="ri-arrow-right-line" aria-hidden="true"></i>Please note allergies or support needs during registration</li>
                </ul>
              </section>
            </div> -->

        <?php get_template_part( 'template-parts/workshop-faqs', null, array( 'audience' => 'adult' ) ); ?>

        <?php get_template_part('template-parts/workshop-instructor'); ?>
      </div>

      <aside class="workshop-booking" aria-label="Book this workshop">
        <div class="workshop-booking__card">
          <header class="workshop-booking__price">
            <span>Workshop fee</span><strong><?php echo esc_html('' !== $adult['price'] ? 'CAD $' . number_format((float) $adult['price'], 2) : 'Contact us'); ?></strong><small>per person · all materials included</small>
          </header>
          <div class="workshop-booking__body">
            <div class="workshop-booking__date">
              <?php if ($adult['date']) : ?><time datetime="<?php echo esc_attr($adult['date']->format('Y-m-d')); ?>"><span><?php echo esc_html(wp_date('M', $adult['date']->getTimestamp())); ?></span><strong><?php echo esc_html($adult['date']->format('d')); ?></strong></time><?php endif; ?>
              <div><strong><?php echo esc_html($adult_date_label); ?></strong><span><?php echo esc_html($adult_time_label); ?></span></div>
            </div>
            <dl class="workshop-booking__facts">
              <div>
                <dt>Duration</dt>
                <dd><?php echo esc_html($adult_duration); ?></dd>
              </div>
              <div>
                <dt>Level</dt>
                <dd><?php echo esc_html($adult_level); ?></dd>
              </div>
              <div>
                <dt>Group size</dt>
                <dd><?php echo esc_html('Max ' . $adult_group_size); ?></dd>
              </div>
              <div>
                <dt>Location</dt>
                <dd><?php echo esc_html($adult_location); ?></dd>
              </div>
            </dl>
            <div class="workshop-booking__actions">
              <?php if ($adult_open) : ?><a class="button button--solid" href="<?php echo esc_url($adult_booking_url); ?>">Book Your Spot</a><?php else : ?><p role="status"><?php echo esc_html($adult_status); ?></p><?php endif; ?>
              <button class="button button--outline" type="button" data-copy-link>Share this workshop</button>
              <span class="workshop-booking__message" aria-live="polite" data-copy-message></span>
            </div>
            <ul class="workshop-booking__benefits">
              <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-cancel.svg')); ?>" alt="" />Cancellation terms apply; please review the workshop policy</li>
              <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-materials.svg')); ?>" alt="" />All materials and ingredients included</li>
              <li><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-address.svg')); ?>" alt="" /><?php echo esc_html($adult_location); ?></li>
            </ul>
          </div>
          <footer class="workshop-booking__share">
            <span>Share this workshop</span>
            <div>
              <a href="<?php echo esc_url($adult_share_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook"><img src="<?php echo esc_url(get_theme_file_uri('assets/icon-workshop-facebook.svg')); ?>" alt="" /></a>
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
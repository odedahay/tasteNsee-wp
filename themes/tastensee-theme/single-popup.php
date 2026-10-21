<?php
/** Individual pop-up market. @package TasteNsee */
get_header();
?>
<main id="main-content">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php $market = tastensee_popup_details( get_the_ID() ); ?>
    <section class="event-detail-hero" aria-labelledby="event-detail-title">
      <div class="event-detail-hero__inner page-shell">
        <p class="event-detail-hero__eyebrow">Pop-Up Market</p>
        <h1 class="event-detail-hero__title" id="event-detail-title"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="event-detail" aria-label="Market information">
      <div class="event-detail__layout page-shell">
        <article class="event-detail__article">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'event-detail__image' ) ); ?>
          <?php endif; ?>
          <?php if ( $market['date'] && $market['date']->format( 'Ymd' ) < current_datetime()->format( 'Ymd' ) ) : ?>
            <p class="event-detail__intro">This market has ended. Find our next dates on the <a href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">Pop-Up Markets listing</a>.</p>
          <?php endif; ?>
          <div class="event-detail__content"><?php the_content(); ?></div>
          <a class="button button--outline" href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">Back to Pop-Up Markets</a>
        </article>
        <aside class="event-detail-side" aria-label="Event details and tools">
          <section class="event-detail-facts" aria-labelledby="event-facts-title">
            <h2 id="event-facts-title">Event Details</h2>
            <dl class="event-detail-facts__list">
              <?php if ( $market['date'] ) : ?>
                <div>
                  <dt><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-event-calendar.svg' ) ); ?>" alt="" />Date</dt>
                  <dd><time datetime="<?php echo esc_attr( $market['date']->format( 'Y-m-d' ) ); ?>"><?php echo esc_html( wp_date( 'l, F j, Y', $market['date']->getTimestamp() ) ); ?></time></dd>
                </div>
              <?php endif; ?>
              <?php if ( $market['time'] ) : ?>
                <div>
                  <dt><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-event-time.svg' ) ); ?>" alt="" />Time</dt>
                  <dd><?php echo esc_html( $market['time'] ); ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( $market['location'] ) : ?>
                <div>
                  <dt><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-event-location.svg' ) ); ?>" alt="" />Location</dt>
                  <dd><?php echo esc_html( $market['location'] ); ?></dd>
                </div>
              <?php endif; ?>
            </dl>
          </section>
          <div class="event-detail-meta">
            <button class="event-detail-meta__share" type="button" data-copy-link>
              <img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-event-share.svg' ) ); ?>" alt="" /> Share
            </button>
            <span class="sr-only" aria-live="polite" data-copy-message></span>
          </div>
        </aside>
      </div>
    </section>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>

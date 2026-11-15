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
          <?php else : ?>
            <img class="event-detail__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/market-placeholder.svg' ) ); ?>" alt="" />
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
          <?php
          $share_url   = get_permalink();
          $share_title = wp_specialchars_decode( wp_strip_all_tags( get_the_title() ), ENT_QUOTES );
          $share_links = array(
            'Facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $share_url ),
            'WhatsApp' => 'https://wa.me/?text=' . rawurlencode( $share_title . ' ' . $share_url ),
            'Email'    => 'mailto:?subject=' . rawurlencode( $share_title ) . '&body=' . rawurlencode( $share_url ),
          );
          ?>
          <details class="event-detail-meta event-detail-meta--share" data-event-share data-share-title="<?php echo esc_attr( $share_title ); ?>" data-share-url="<?php echo esc_url( $share_url ); ?>">
            <summary class="event-detail-meta__share">
              <img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-event-share.svg' ) ); ?>" alt="" /> Share
            </summary>
            <div class="event-detail-meta__share-options">
              <button class="event-detail-meta__share" type="button" data-native-share hidden>Share via device</button>
              <?php foreach ( $share_links as $label => $url ) : ?>
                <a class="event-detail-meta__share" href="<?php echo esc_url( $url ); ?>"<?php if ( 'Email' !== $label ) : ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html( $label ); ?></a>
              <?php endforeach; ?>
              <button class="event-detail-meta__share" type="button" data-copy-link hidden><span data-copy-label>Copy link</span></button>
            </div>
            <p class="event-detail-meta__share-status" role="status" data-copy-message></p>
          </details>
        </aside>
      </div>
    </section>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>

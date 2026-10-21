<?php
/** Past pop-up market events. @package TasteNsee */
get_header();
?>
<main id="main-content">
  <section class="page-hero" aria-labelledby="past-events-title">
    <div class="page-hero__inner page-shell">
      <p class="eyebrow">Sweet memories</p>
      <h1 class="page-hero__title" id="past-events-title"><?php echo esc_html( get_the_title( get_queried_object_id() ) ); ?></h1>
      <p class="page-hero__description">Look back at the pop-up markets and community events where we shared something sweet.</p>
    </div>
  </section>
  <div class="workshops-events-listings">
    <section class="activity-collection page-shell" aria-labelledby="past-markets-title">
      <header class="activity-collection__header">
        <div>
          <p class="eyebrow">Around Calgary</p>
          <h2 class="activity-collection__title" id="past-markets-title">Past Pop-Up Markets</h2>
        </div>
        <a class="text-link activity-collection__link" href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">Upcoming Markets <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
      </header>
      <?php $markets = new WP_Query( tastensee_popup_query_args( true ) ); ?>
      <?php if ( $markets->have_posts() ) : ?>
        <div class="activity-collection__grid">
          <?php while ( $markets->have_posts() ) : $markets->the_post(); ?>
            <?php get_template_part( 'template-parts/popup-card', null, array( 'past' => true ) ); ?>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <p class="activity-collection__empty">No past pop-up events to display yet. Check out our upcoming markets!</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>

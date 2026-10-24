<?php
/** Past pop-up markets and kids/adult workshops. @package TasteNsee */
get_header();
?>
<main id="main-content">
  <section class="page-hero" aria-labelledby="past-events-title">
    <div class="page-hero__inner page-shell">
      <p class="eyebrow">Sweet memories</p>
      <h1 class="page-hero__title" id="past-events-title">Past Events &amp; Workshops</h1>
      <p class="page-hero__description">Look back at our kids’ workshops, adult edible art workshops, pop-up markets, and community events.</p>
    </div>
  </section>
  <div class="workshops-events-listings">
    <section class="activity-collection page-shell" aria-labelledby="past-activities-title">
      <header class="activity-collection__header">
        <div>
          <p class="eyebrow">Around Calgary</p>
          <h2 class="activity-collection__title" id="past-activities-title">Past Events &amp; Workshops</h2>
        </div>
        <a class="text-link activity-collection__link" href="<?php echo esc_url( home_url( '/workshops-events/' ) ); ?>">Upcoming Events &amp; Workshops <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
      </header>
      <?php $past_activities = new WP_Query( tastensee_past_activity_query_args() ); ?>
      <?php if ( $past_activities->have_posts() ) : ?>
        <div class="activity-collection__grid">
          <?php while ( $past_activities->have_posts() ) : $past_activities->the_post(); ?>
            <?php get_template_part( 'template-parts/past-activity-card' ); ?>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <p class="activity-collection__empty">No past events or workshops to display yet. Check out our upcoming dates!</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>

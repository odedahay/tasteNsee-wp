<?php
/** Audience-specific FAQ accordion shared by Kids and Adult workshops. */
$faq_audience = $args['audience'] ?? '';
if ( ! in_array( $faq_audience, array( 'kids', 'adult' ), true ) ) { return; }
$workshop_faqs = new WP_Query( tastensee_workshop_faq_query_args( $faq_audience ) );
if ( ! $workshop_faqs->have_posts() ) { return; }
$faq_heading_id = 'workshop-faq-title-' . $faq_audience;
?>
<section class="workshop-detail-faq" aria-labelledby="<?php echo esc_attr( $faq_heading_id ); ?>">
  <p class="workshop-detail-heading">Have Questions?</p>
  <h2 id="<?php echo esc_attr( $faq_heading_id ); ?>">Frequently Asked</h2>
  <div class="workshop-detail-faq__list site-accordion" data-accordion>
    <?php while ( $workshop_faqs->have_posts() ) : $workshop_faqs->the_post(); ?>
      <?php $faq_panel_id = 'workshop-faq-' . $faq_audience . '-' . get_the_ID(); ?>
      <article class="workshop-detail-faq__item site-accordion__item">
        <button class="site-accordion__trigger" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $faq_panel_id ); ?>" data-faq-trigger>
          <span><?php echo esc_html( get_the_title() ); ?></span><i class="ri-add-line" aria-hidden="true"></i>
        </button>
        <div class="workshop-detail-faq__answer site-accordion__panel" id="<?php echo esc_attr( $faq_panel_id ); ?>" aria-hidden="true">
          <div class="site-accordion__panel-inner"><div class="site-accordion__content"><?php the_content(); ?></div></div>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</section>
<?php wp_reset_postdata(); ?>

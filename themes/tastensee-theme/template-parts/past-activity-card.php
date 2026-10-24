<?php
/** Shared card for the combined Past Events & Workshops collection. */
$past_type = get_post_type();
if ( 'popup' === $past_type ) {
    get_template_part( 'template-parts/popup-card', null, array( 'past' => true ) );
    return;
}
$past_is_kids = 'kids_workshop' === $past_type;
$past_details = $past_is_kids ? tastensee_kids_details( get_the_ID() ) : tastensee_adult_details( get_the_ID() );
$past_label = $past_is_kids ? 'Kids Workshop' : 'Adult Workshop';
$past_fallback = $past_is_kids ? 'assets/workshop-event-cupcakes.jpeg' : 'assets/workshop-event-cake.jpeg';
?>
<article class="activity-card activity-card--compact">
  <div class="activity-card__media">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail( 'large', array( 'class' => 'activity-card__image' ) ); ?>
    <?php else : ?>
      <img class="activity-card__image" src="<?php echo esc_url( get_theme_file_uri( $past_fallback ) ); ?>" alt="" loading="lazy" />
    <?php endif; ?>
    <?php if ( $past_details['date'] ) : ?>
      <time class="activity-card__date" datetime="<?php echo esc_attr( $past_details['date']->format( 'Y-m-d' ) ); ?>"><span><?php echo esc_html( wp_date( 'M', $past_details['date']->getTimestamp() ) ); ?></span><strong><?php echo esc_html( $past_details['date']->format( 'd' ) ); ?></strong></time>
    <?php endif; ?>
    <span class="activity-card__level activity-card__level--past">Past workshop</span>
  </div>
  <div class="activity-card__body">
    <h3 class="activity-card__title"><?php the_title(); ?></h3>
    <p class="activity-card__time"><?php echo esc_html( $past_details['date'] ? wp_date( 'l, F j, Y', $past_details['date']->getTimestamp() ) : '' ); ?><?php echo esc_html( $past_details['time'] ? ' · ' . $past_details['time'] : '' ); ?></p>
    <?php if ( $past_details['location'] ) : ?><p class="activity-card__description"><i class="ri-map-pin-line" aria-hidden="true"></i> <?php echo esc_html( $past_details['location'] ); ?></p><?php endif; ?>
    <?php if ( has_excerpt() ) : ?><p class="activity-card__description"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
    <ul class="activity-card__tags"><li><?php echo esc_html( $past_label ); ?></li></ul>
    <div class="activity-card__actions"><a class="activity-card__read-more" href="<?php the_permalink(); ?>">Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a></div>
  </div>
</article>

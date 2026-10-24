<?php
$featured = ! empty( $args['featured'] );
$heading_tag = $featured ? 'h3' : 'h4';
$d = tastensee_adult_details( get_the_ID() );
$open = tastensee_adult_available( get_the_ID() );
?>
<article class="activity-card <?php echo $featured ? 'activity-card--featured' : 'activity-card--compact'; ?>">
  <div class="activity-card__media">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail( 'large', array( 'class' => 'activity-card__image' ) ); ?>
    <?php else : ?>
      <img class="activity-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/workshop-event-cake.jpeg' ) ); ?>" alt="Adult edible art workshop" loading="lazy" />
    <?php endif; ?>
    <?php if ( $d['date'] ) : ?>
      <time class="activity-card__date" datetime="<?php echo esc_attr( $d['date']->format( 'Y-m-d' ) ); ?>"><span><?php echo esc_html( wp_date( 'M', $d['date']->getTimestamp() ) ); ?></span><strong><?php echo esc_html( $d['date']->format( 'd' ) ); ?></strong></time>
    <?php endif; ?>
  </div>
  <div class="activity-card__body">
    <<?php echo esc_html( $heading_tag ); ?> class="activity-card__title"><?php the_title(); ?></<?php echo esc_html( $heading_tag ); ?>>
    <p class="activity-card__time"><?php echo esc_html( $d['date'] ? wp_date( 'l, F j', $d['date']->getTimestamp() ) : '' ); ?><?php echo esc_html( $d['time'] ? ' · ' . $d['time'] : '' ); ?></p>
    <ul class="activity-card__tags"><li>Adults · Ages 18+</li><?php if ( '' !== $d['price'] ) : ?><li><?php echo esc_html( 'CAD $' . number_format( (float) $d['price'], 2 ) ); ?></li><?php endif; ?></ul>
    <div class="activity-card__actions">
      <a class="activity-card__read-more" href="<?php the_permalink(); ?>">Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
      <?php if ( $open ) : ?><a class="button button--outline button--compact activity-card__event-button" href="<?php echo esc_url( tastensee_adult_registration_url( get_the_ID() ) ); ?>">Register</a>
      <?php else : ?><span class="activity-card__time"><?php echo 'full' === $d['status'] ? 'Fully booked' : 'Registration closed'; ?></span><?php endif; ?>
    </div>
  </div>
</article>

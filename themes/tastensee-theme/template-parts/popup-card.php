<?php
/** Shared pop-up market card. @package TasteNsee */
$market = tastensee_popup_details( get_the_ID() );
$past = ! empty( $args['past'] );
?>
              <article class="activity-card activity-card--compact">
                <div class="activity-card__media">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'class' => 'activity-card__image' ) ); ?>
                  <?php else : ?>
                    <img class="activity-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/blog-market.png' ) ); ?>" alt="" loading="lazy" />
                  <?php endif; ?>
                  <?php if ( $market['date'] ) : ?>
                    <time class="activity-card__date" datetime="<?php echo esc_attr( $market['date']->format( 'Y-m-d' ) ); ?>">
                      <span><?php echo esc_html( wp_date( 'M', $market['date']->getTimestamp() ) ); ?></span>
                      <strong><?php echo esc_html( $market['date']->format( 'd' ) ); ?></strong>
                    </time>
                  <?php endif; ?>
                  <?php if ( $past ) : ?>
                    <span class="activity-card__level activity-card__level--past">Past event</span>
                  <?php endif; ?>
                </div>
                <div class="activity-card__body">
                  <h3 class="activity-card__title"><?php the_title(); ?></h3>
                  <p class="activity-card__time">
                    <?php if ( $market['date'] ) : ?><?php echo esc_html( wp_date( 'l, F j, Y', $market['date']->getTimestamp() ) ); ?><?php endif; ?>
                    <?php if ( $market['time'] ) : ?> · <?php echo esc_html( $market['time'] ); ?><?php endif; ?>
                  </p>
                  <?php if ( $market['location'] ) : ?>
                    <p class="activity-card__description"><i class="ri-map-pin-line" aria-hidden="true"></i> <?php echo esc_html( $market['location'] ); ?></p>
                  <?php endif; ?>
                  <?php if ( has_excerpt() ) : ?>
                    <p class="activity-card__description"><?php echo esc_html( get_the_excerpt() ); ?></p>
                  <?php endif; ?>
                  <ul class="activity-card__tags"><li>Pop-Up Market</li></ul>
                  <div class="activity-card__actions">
                    <a class="activity-card__read-more" href="<?php the_permalink(); ?>">Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
                  </div>
                </div>
              </article>

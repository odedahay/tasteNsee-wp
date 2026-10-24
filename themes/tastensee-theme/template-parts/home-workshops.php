<?php
/** Homepage workshops section. @package TasteNsee */
?>
      <section class="section workshops" id="workshops">
        <div class="workshops__grid page-shell">
          <div class="workshops__content">
            <p class="eyebrow">What's Happening</p>
            <h2 class="section-heading__title">Creative Workshops <br>for Kids &amp; Adults</h2>
            <p class="workshops__text">
              Kids can explore playful, inclusive baking projects, while adults create beautiful edible art in our
              relaxed Cake &amp; Canvas and seasonal workshops.
            </p>
            <a class="button button--solid" href="<?php echo esc_url( home_url( '/workshops-events/#workshops' ) ); ?>">View All Workshops</a>
          </div>
          <div class="workshops__media">
            <a class="text-link activity-card__link" href="<?php echo esc_url( home_url( '/workshops-events/#workshops' ) ); ?>">View All Workshops for Kids &amp; Adults <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
            <?php
            // Show the two most recently published upcoming workshops across both tracks.
            $today = current_datetime()->format( 'Ymd' );
            $home_workshops = new WP_Query( array(
                'post_type'           => array( 'kids_workshop', 'adult_workshop' ),
                'post_status'         => 'publish',
                'posts_per_page'      => 2,
                'orderby'            => array( 'date' => 'DESC', 'ID' => 'DESC' ),
                'ignore_sticky_posts' => true,
                'no_found_rows'       => true,
                'meta_query'         => array(
                    'relation' => 'OR',
                    array( 'key' => 'kids_workshop_date', 'value' => $today, 'compare' => '>=', 'type' => 'NUMERIC' ),
                    array( 'key' => 'adult_workshop_date', 'value' => $today, 'compare' => '>=', 'type' => 'NUMERIC' ),
                ),
            ) );
            ?>
            <div class="workshops__cards">
              <?php if ( $home_workshops->have_posts() ) : ?>
                <?php while ( $home_workshops->have_posts() ) : $home_workshops->the_post(); ?>
                  <?php get_template_part( 'template-parts/' . ( 'kids_workshop' === get_post_type() ? 'kids' : 'adult' ) . '-workshop-card', null, array( 'featured' => true ) ); ?>
                <?php endwhile; ?>
              <?php else : ?>
                <p class="activity-collection__empty">New workshops are coming soon. Please check back for upcoming dates.</p>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </section>

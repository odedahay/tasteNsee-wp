<?php
/** Homepage testimonials section. @package TasteNsee */
$homepage_testimonials = new WP_Query( array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'orderby' => array( 'date' => 'DESC', 'ID' => 'DESC' ),
    'no_found_rows' => true,
) );
if ( $homepage_testimonials->have_posts() ) :
?>
      <section class="section testimonials" aria-labelledby="testimonials-title">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Kind Words</p>
              <h2 class="section-heading__title" id="testimonials-title">What Our Clients Say</h2>
            </div>
            <a class="text-link testimonials__all-link" href="<?php echo esc_url( get_post_type_archive_link( 'testimonial' ) ); ?>">View All Testimonials <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <div class="swiper testimonials__viewport" data-testimonials-slider>
            <div class="swiper-wrapper testimonials__track">
              <?php while ( $homepage_testimonials->have_posts() ) : $homepage_testimonials->the_post();
                  $rating = max( 1, min( 5, (int) ( get_post_meta( get_the_ID(), '_tastensee_testimonial_rating', true ) ?: 5 ) ) );
                  ?>
              <article class="swiper-slide testimonial-card">
                <div class="testimonial-card__stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'tastensee' ), $rating ) ); ?>">
                  <?php for ( $star = 1; $star <= 5; $star++ ) : ?>
                    <i class="<?php echo $star <= $rating ? 'ri-star-fill' : 'ri-star-line'; ?>" aria-hidden="true"></i>
                  <?php endfor; ?>
                </div>
                <blockquote class="testimonial-card__quote"><?php the_content(); ?></blockquote>
                <div class="testimonial-card__author">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'testimonial-card__avatar', 'alt' => '' ) ); ?>
                  <?php endif; ?>
                  <cite>— <?php the_title(); ?></cite>
                </div>
              </article>
              <?php endwhile; ?>
            </div>
            <div class="testimonials__controls">
              <?php if ( $homepage_testimonials->post_count > 3 ) : ?>
              <button class="testimonials__button testimonials__button--previous" type="button" aria-label="Previous testimonial">
                <i class="ri-arrow-left-line" aria-hidden="true"></i>
              </button>
              <?php endif; ?>
              <div class="swiper-pagination testimonials__pagination"></div>
              <?php if ( $homepage_testimonials->post_count > 3 ) : ?>
              <button class="testimonials__button testimonials__button--next" type="button" aria-label="Next testimonial">
                <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>

<?php endif; wp_reset_postdata(); ?>

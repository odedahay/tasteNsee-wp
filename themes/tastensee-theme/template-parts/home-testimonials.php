<?php
/** Homepage testimonials section. @package TasteNsee */
?>
      <section class="section testimonials" aria-labelledby="testimonials-title">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Kind Words</p>
              <h2 class="section-heading__title" id="testimonials-title">What Our Clients Say</h2>
            </div>
            <a class="text-link testimonials__all-link" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">View All Testimonials <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <div class="swiper testimonials__viewport" data-testimonials-slider>
            <div class="swiper-wrapper testimonials__track">
              <article class="swiper-slide testimonial-card">
                <div class="testimonial-card__stars" aria-label="5 out of 5 stars">
                  <i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i>
                </div>
                <blockquote class="testimonial-card__quote">“The cake was even more beautiful than we imagined! It looked amazing and was the highlight of our celebration.”</blockquote>
                <div class="testimonial-card__author">
                  <img class="testimonial-card__avatar" src="<?php echo esc_url( get_theme_file_uri( 'assets/avatar-sarah.png' ) ); ?>" alt="" />
                  <cite>— Sarah M.</cite>
                </div>
              </article>
              <article class="swiper-slide testimonial-card">
                <div class="testimonial-card__stars" aria-label="5 out of 5 stars">
                  <i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i>
                </div>
                <blockquote class="testimonial-card__quote">“My son loved the workshop! The instructors are so patient and kind. A wonderful experience for the kids!”</blockquote>
                <div class="testimonial-card__author">
                  <img class="testimonial-card__avatar" src="<?php echo esc_url( get_theme_file_uri( 'assets/avatar-melissa.png' ) ); ?>" alt="" />
                  <cite>— Melissa T.</cite>
                </div>
              </article>
              <article class="swiper-slide testimonial-card">
                <div class="testimonial-card__stars" aria-label="5 out of 5 stars">
                  <i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i>
                </div>
                <blockquote class="testimonial-card__quote">“Professional, creative, and so easy to work with. We always order from tasteNsee for every occasion!”</blockquote>
                <div class="testimonial-card__author">
                  <img class="testimonial-card__avatar" src="<?php echo esc_url( get_theme_file_uri( 'assets/avatar-janice.png' ) ); ?>" alt="" />
                  <cite>— Janice R.</cite>
                </div>
              </article>
              <article class="swiper-slide testimonial-card">
                <div class="testimonial-card__stars" aria-label="5 out of 5 stars">
                  <i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i><i class="ri-star-fill" aria-hidden="true"></i>
                </div>
                <blockquote class="testimonial-card__quote">“Our dessert table was absolutely stunning, and every treat tasted as wonderful as it looked. Our guests are still talking about it!”</blockquote>
                <div class="testimonial-card__author">
                  <img class="testimonial-card__avatar" src="<?php echo esc_url( get_theme_file_uri( 'assets/avatar-melissa.png' ) ); ?>" alt="" />
                  <cite>— Amanda L.</cite>
                </div>
              </article>
            </div>
            <div class="testimonials__controls">
              <button class="testimonials__button testimonials__button--previous" type="button" aria-label="Previous testimonial">
                <i class="ri-arrow-left-line" aria-hidden="true"></i>
              </button>
              <div class="swiper-pagination testimonials__pagination"></div>
              <button class="testimonials__button testimonials__button--next" type="button" aria-label="Next testimonial">
                <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </section>

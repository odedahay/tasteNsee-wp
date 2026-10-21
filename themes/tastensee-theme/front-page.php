<?php get_header(); ?>

   <main id="main-content">
      <section class="hero">
        <div class="hero__inner page-shell">
          <div class="hero__content">
            <p class="eyebrow">How sweet it can be!</p>
            <h1 class="hero__title">Made for you!<br />Custom Cakes &amp;<br />Desserts</h1>
            <p class="hero__description">
              Custom cakes, delicious desserts, and creative edible arts workshops for every celebration.
            </p>
            <div class="hero__actions">
              <a class="button button--solid" href="consultation.html">Order a Cake</a>
              <a class="button button--outline" href="workshops-events.html">Join a Workshop</a>
            </div>
          </div>
          <div class="hero__visual">
            <img class="hero__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/hero-cake.png' ) ); ?>" alt="Floral custom cake displayed outdoors" />
            <div class="hero__seal" aria-hidden="true">
              <i class="hero__seal-heart ri-heart-line"></i>
              <span>Made<br />for you</span>
            </div>
          </div>
        </div>
      </section>

      <section class="benefits" aria-label="Why choose tasteNsee">
        <div class="benefits__grid page-shell">
          <article class="benefits__item">
            <i class="benefits__icon ri-cake-3-line" aria-hidden="true"></i>
            <h2 class="benefits__title">Custom Cakes</h2>
            <p class="benefits__text">Made to order for your special moments</p>
          </article>
          <article class="benefits__item">
            <i class="benefits__icon ri-heart-3-line" aria-hidden="true"></i>
            <h2 class="benefits__title">Inclusive &amp; Autism-Friendly</h2>
            <p class="benefits__text">Workshops designed for all abilities</p>
          </article>
          <article class="benefits__item">
            <i class="benefits__icon ri-palette-line" aria-hidden="true"></i>
            <h2 class="benefits__title">Hands-On Learning</h2>
            <p class="benefits__text">Fun, creative, and meaningful experiences</p>
          </article>
          <article class="benefits__item">
            <i class="benefits__icon ri-group-2-line" aria-hidden="true"></i>
            <h2 class="benefits__title">Social Impact</h2>
            <p class="benefits__text">Supporting special needs youth and families</p>
          </article>
        </div>
      </section>

      <!-- Cake Feauture Gallery -->
      <section class="section section--mint creations" id="cakes">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Made for your celebration</p>
              <h2 class="section-heading__title">Order a Custom Cake</h2>
            </div>
            <a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'cake' ) ); ?>">View All Cakes <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>

          <div class="creations__grid creations__grid--custom">
            <?php
            $featured_cakes = new WP_Query( array(
                'post_type' => 'cake',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'no_found_rows' => true,
                'orderby' => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
                'meta_query' => array(
                    array( 'key' => '_tastensee_cake_featured', 'value' => '1' ),
                    array( 'key' => '_thumbnail_id', 'value' => 0, 'compare' => '>', 'type' => 'NUMERIC' ),
                ),
            ) );
            while ( $featured_cakes->have_posts() ) : $featured_cakes->the_post();
                $cake_terms = get_the_terms( get_the_ID(), 'cake_category' );
                $category_label = is_array( $cake_terms ) ? implode( ', ', wp_list_pluck( $cake_terms, 'name' ) ) : __( 'Custom Cakes', 'tastensee' );
                $image_id = get_post_thumbnail_id();
                ?>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button"
                data-gallery-title="<?php echo esc_attr( get_the_title() ); ?>"
                data-gallery-category="<?php echo esc_attr( $category_label ); ?>"
                data-gallery-image="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>"
                aria-label="<?php echo esc_attr( sprintf( __( 'View %s photo', 'tastensee' ), get_the_title() ) ); ?>"
                aria-haspopup="dialog" aria-controls="gallery-modal">
                <?php echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'product-card__image', 'alt' => get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: get_the_title() ) ); ?>
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title"><?php the_title(); ?></h3>
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/inquire/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      </section>

      <section class="section about" id="about">
        <div class="about__grid page-shell">
          <div class="about__media">
            <img class="about__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-founder.png' ) ); ?>" alt="tasteNsee founder decorating a cake" />
          </div>
          <div class="about__content">
            <p class="eyebrow">About tasteNsee</p>
            <h2 class="section-heading__title">More Than Just Cakes</h2>
            <p class="about__text">
              I'm a certified cake designer, registered nurse, and passionate home baker with over 10 years of
              experience.
            </p>
            <p class="about__text">
              Baking is my way of connecting, creating joy, and making every moment sweeter. Every cake is a blend
              of professional care, thoughtful touch, and love for celebration.
            </p>
            <ul class="about__features">
              <li class="about__feature"><i class="ri-palette-line" aria-hidden="true"></i> Custom Designs</li>
              <li class="about__feature"><i class="ri-cake-3-line" aria-hidden="true"></i> Inclusive &amp; Creative Workshops</li>
              <li class="about__feature"><i class="ri-restaurant-2-line" aria-hidden="true"></i> Made with Premium Ingredients</li>
              <li class="about__feature"><i class="ri-alarm-line" aria-hidden="true"></i> Reliable &amp; On-Time Service</li>
              <li class="about__feature"><i class="ri-user-heart-line" aria-hidden="true"></i> Nurse &amp; Cake Designer</li>
              <li class="about__feature"><i class="ri-service-line" aria-hidden="true"></i> Passionate &amp; Detail-Oriented</li>
            </ul>
            <a class="button button--outline" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Learn Our Story</a>
          </div>
        </div>
      </section>

      <section class="section workshops" id="workshops">
        <div class="workshops__grid page-shell">
          <div class="workshops__content">
            <p class="eyebrow">What's Happening</p>
            <h2 class="section-heading__title">Creative Workshops <br>for Kids &amp; Adults</h2>
            <p class="workshops__text">
              Kids can explore playful, inclusive baking projects, while adults create beautiful edible art in our
              relaxed Cake &amp; Canvas and seasonal workshops.
            </p>
            <a class="button button--solid" href="workshops-events.html#workshops">View All Workshops</a>
          </div>
          <div class="workshops__media">
            <a class="text-link activity-card__link" href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">View All Workshops for Kids & Adults <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
            <article class="activity-card activity-card--featured">
              <div class="activity-card__media">
                <img
                  class="activity-card__image"
                  src="<?php echo esc_url( get_theme_file_uri( 'assets/workshop-event-cupcakes.jpeg' ) ); ?>"
                  alt="Child mixing cupcake batter during a creative workshop"
                />
                <time class="activity-card__date" datetime="2026-10-19"><span>Oct</span><strong>19</strong></time>
              </div>
              <div class="activity-card__body">
                <h3 class="activity-card__title">Halloween Cupcake Design</h3>
                <p class="activity-card__time">Monday, October 19 · 1:00–3:00 PM</p>
                <ul class="activity-card__tags">
                  <li>Kids</li>
                  <li>Cupcakes</li>
                  <li>Halloween</li>
                </ul>
                <div class="activity-card__actions">
                  <a class="activity-card__read-more" href="workshop-details.html">
                    Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i>
                  </a>
                  <a
                    class="button button--outline button--compact activity-card__event-button"
                    href="workshop-kids-registration.html"
                  >Register</a>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="section section--mint events" id="events">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Inspire. Create. Belong.</p>
              <h2 class="section-heading__title">Pop-Up Markets</h2>
            </div>
            <a class="text-link" href="<?php echo esc_url( home_url( '/workshops-events/#markets' ) ); ?>">View All Pop-Up Markets <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <?php
          $home_market_args = tastensee_popup_query_args();
          $home_market_args['posts_per_page'] = 3;
          $home_markets = new WP_Query( $home_market_args );
          ?>
          <?php if ( $home_markets->have_posts() ) : ?>
            <div class="events__grid">
              <?php while ( $home_markets->have_posts() ) : $home_markets->the_post(); ?>
                <?php $market = tastensee_popup_details( get_the_ID() ); ?>
                <a class="event-card" href="<?php the_permalink(); ?>">
                  <?php if ( $market['date'] ) : ?>
                    <time class="event-card__date" datetime="<?php echo esc_attr( $market['date']->format( 'Y-m-d' ) ); ?>">
                      <span><?php echo esc_html( wp_date( 'M', $market['date']->getTimestamp() ) ); ?></span>
                      <strong><?php echo esc_html( $market['date']->format( 'd' ) ); ?></strong>
                    </time>
                  <?php endif; ?>
                  <div class="event-card__content">
                    <h3 class="event-card__title"><?php the_title(); ?></h3>
                    <?php if ( $market['location'] ) : ?>
                      <p class="event-card__detail"><i class="ri-map-pin-line" aria-hidden="true"></i> <?php echo esc_html( $market['location'] ); ?></p>
                    <?php endif; ?>
                    <p class="event-card__detail"><i class="ri-time-line" aria-hidden="true"></i>
                      <?php if ( $market['date'] ) : ?><?php echo esc_html( wp_date( 'F j, Y', $market['date']->getTimestamp() ) ); ?><?php endif; ?>
                      <?php if ( $market['time'] ) : ?> · <?php echo esc_html( $market['time'] ); ?><?php endif; ?>
                    </p>
                    <span class="activity-card__read-more">Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i></span>
                  </div>
                </a>
              <?php endwhile; ?>
            </div>
          <?php else : ?>
            <p class="events__empty">No upcoming pop-up markets right now. Check back soon for our next market dates!</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </section>

      <!-- <section class="section journal" id="journal">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Inspire. Create. Belong.</p>
              <h2 class="section-heading__title">Blogs</h2>
            </div>
            <a class="text-link" href="blog.html">View All Blogs <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <div class="journal__grid">
            <a class="blog-card" href="blog-details.html">
              <div class="blog-card__media">
                <img class="blog-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/blog-fall.png' ) ); ?>" alt="Fall-themed fondant cake workshop" />
                <span class="blog-card__tag">Beginner</span>
              </div>
              <div class="blog-card__body">
                <h3 class="blog-card__title">Back-to-School Kids Creative Workshop: Decorating a Fall Themed Fondant Cake</h3>
                <p class="blog-card__excerpt">Foundation skills in reading, writing, and math for young creatives.</p>
                <span class="button button--outline button--compact">Read More</span>
              </div>
            </a>
            <a class="blog-card" href="blog-details.html">
              <div class="blog-card__media">
                <img class="blog-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/blog-holiday.png' ) ); ?>" alt="Holiday celebration cake" />
                <span class="blog-card__tag">Beginner</span>
              </div>
              <div class="blog-card__body">
                <h3 class="blog-card__title">Holiday Celebration &amp; Gathering</h3>
                <p class="blog-card__excerpt">Foundation skills in reading, writing, and math for young creatives.</p>
                <span class="button button--outline button--compact">Read More</span>
              </div>
            </a>
            <a class="blog-card" href="blog-details.html">
              <div class="blog-card__media">
                <img class="blog-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/blog-market.png' ) ); ?>" alt="Pop up market vendor event" />
                <span class="blog-card__tag">Beginner</span>
              </div>
              <div class="blog-card__body">
                <h3 class="blog-card__title">Pop Up Market Vendor Event</h3>
                <p class="blog-card__excerpt">Foundation skills in reading, writing, and math for young creatives.</p>
                <span class="button button--outline button--compact">Read More</span>
              </div>
            </a>
          </div>
        </div>
      </section> -->

      <?php get_template_part( 'template-parts/home-testimonials' ); ?>

      <!-- <section class="section section--mint instagram" id="instagram">
        <div class="page-shell">
          <div class="section-heading section-heading--row section-heading--compact">
            <div>
              <h2 class="instagram__title">Follow Our Sweet Creations</h2>
              <p class="eyebrow">@tastensee82</p>
            </div>
            <a class="text-link" href="#instagram">Follow Us on Instagram <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <div class="instagram__grid">
            <button class="photo-modal-trigger" type="button" data-gallery-title="Chocolate cake creation" data-gallery-category="Sweet Creations" aria-label="View Chocolate cake creation photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-1.png' ) ); ?>" alt="Chocolate cake creation" /></button>
            <button class="photo-modal-trigger" type="button" data-gallery-title="Cupcake creation" data-gallery-category="Sweet Creations" aria-label="View Cupcake creation photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-2.png' ) ); ?>" alt="Cupcake creation" /></button>
            <button class="photo-modal-trigger" type="button" data-gallery-title="Chocolate drip cake" data-gallery-category="Sweet Creations" aria-label="View Chocolate drip cake photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-3.png' ) ); ?>" alt="Chocolate drip cake" /></button>
            <button class="photo-modal-trigger" type="button" data-gallery-title="Decorated celebration cake" data-gallery-category="Sweet Creations" aria-label="View Decorated celebration cake photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-4.png' ) ); ?>" alt="Decorated celebration cake" /></button>
            <button class="photo-modal-trigger" type="button" data-gallery-title="Colorful custom cake" data-gallery-category="Sweet Creations" aria-label="View Colorful custom cake photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-5.png' ) ); ?>" alt="Colorful custom cake" /></button>
            <button class="photo-modal-trigger" type="button" data-gallery-title="Dessert platter" data-gallery-category="Sweet Creations" aria-label="View Dessert platter photo" aria-haspopup="dialog" aria-controls="gallery-modal"><img class="instagram__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/instagram-6.png' ) ); ?>" alt="Dessert platter" /></button>
          </div>
        </div>
      </section> -->

      <!-- Newsletter subscription section hidden.
      <section class="newsletter" aria-labelledby="newsletter-title">
        <div class="newsletter__inner page-shell">
          <div class="newsletter__intro">
            <span class="newsletter__icon" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icon-mail.svg' ) ); ?>" alt="" /></span>
            <div>
              <h2 class="newsletter__title" id="newsletter-title">Let's Stay in Touch!</h2>
              <p class="newsletter__text">Get baking tips, workshop updates, and special offers straight to your inbox.</p>
            </div>
          </div>
          <form class="newsletter__form" novalidate>
            <label class="sr-only" for="newsletter-email">Your email address</label>
            <input class="newsletter__input" id="newsletter-email" name="email" type="email" placeholder="Your email address" required />
            <button class="button button--solid newsletter__submit" type="submit">Subscribe</button>
            <p class="newsletter__message" aria-live="polite"></p>
          </form>
        </div>
      </section>
      -->
    </main>

    <dialog class="gallery-modal" id="gallery-modal" aria-labelledby="gallery-modal-title">
      <div class="gallery-modal__content">
        <div class="gallery-modal__header">
          <div>
            <p class="gallery-modal__category" data-gallery-modal-category></p>
            <h2 class="gallery-modal__title" id="gallery-modal-title"></h2>
          </div>
          <button class="gallery-modal__close" type="button" aria-label="Close photo" autofocus>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <img class="gallery-modal__image" data-gallery-modal-image alt="" />
      </div>
    </dialog>

<?php get_footer(); ?>

<?php
/** Homepage creations section. @package TasteNsee */
?>
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
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Wedding" data-gallery-category="Custom Cakes" aria-label="View Wedding photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/cake-wedding.png' ) ); ?>" alt="Elegant white wedding cake" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Wedding</h3>
                <!-- <p class="product-card__price">Made for your day</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Birthday Buttercream" data-gallery-category="Custom Cakes" aria-label="View Birthday Buttercream photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-chocolate-rose-birthday.png' ) ); ?>" alt="Chocolate buttercream birthday cake with piped roses" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Birthday Buttercream</h3>
                <!-- <p class="product-card__price">Soft, beautiful finishes</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Birthday Fondant" data-gallery-category="Custom Cakes" aria-label="View Birthday Fondant photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-hello-kitty-dream.png' ) ); ?>" alt="Custom fondant birthday cake" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Birthday Fondant</h3>
                <!-- <p class="product-card__price">Bold custom creations</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Mom’s Cake" data-gallery-category="Custom Cakes" aria-label="View Mom’s Cake photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-pink-rose-garden.png' ) ); ?>" alt="Pink rose celebration cake for Mom" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Mom’s Cake</h3>
                <!-- <p class="product-card__price">A sweet thank-you</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Dad’s Cake" data-gallery-category="Custom Cakes" aria-label="View Dad’s Cake photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-gold-white-elegance.png' ) ); ?>" alt="Gold and white celebration cake for Dad" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Dad’s Cake</h3>
                <!-- <p class="product-card__price">Designed just for him</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Gender Reveal / Baby Shower" data-gallery-category="Custom Cakes" aria-label="View Gender Reveal / Baby Shower photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-pink-floral-dream.png' ) ); ?>" alt="Pastel celebration cake for a gender reveal or baby shower" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Gender Reveal / Baby Shower</h3>
                <!-- <p class="product-card__price">Welcome something wonderful</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Retirement / Send Off" data-gallery-category="Custom Cakes" aria-label="View Retirement / Send Off photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-white-four-tier-classic.png' ) ); ?>" alt="Elegant retirement or send-off cake" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Retirement / Send Off</h3>
                <!-- <p class="product-card__price">Celebrate the next chapter</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
            <article class="product-card">
              <button class="photo-modal-trigger" type="button" data-gallery-title="Religious" data-gallery-category="Custom Cakes" aria-label="View Religious photo" aria-haspopup="dialog" aria-controls="gallery-modal">
                <img class="product-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/gallery-three-tier-candle-cake.png' ) ); ?>" alt="Tiered cake for a religious celebration" />
              </button>
              <div class="product-card__body">
                <h3 class="product-card__title">Religious</h3>
                <!-- <p class="product-card__price">Made for meaningful moments</p> -->
                <a class="product-card__link" href="<?php echo esc_url( home_url( '/consultation/' ) ); ?>">Order Inquiry <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>
        </div>
      </section>

<?php
/** Homepage journal section. @package TasteNsee */
?>
      <section class="section journal" id="journal">
        <div class="page-shell">
          <div class="section-heading section-heading--row">
            <div>
              <p class="eyebrow">Inspire. Create. Belong.</p>
              <h2 class="section-heading__title">Blogs</h2>
            </div>
            <a class="text-link" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">View All Blogs <i class="ri-arrow-right-s-line" aria-hidden="true"></i></a>
          </div>
          <div class="journal__grid">
            <a class="blog-card" href="<?php echo esc_url( home_url( '/blog-details/' ) ); ?>">
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
            <a class="blog-card" href="<?php echo esc_url( home_url( '/blog-details/' ) ); ?>">
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
            <a class="blog-card" href="<?php echo esc_url( home_url( '/blog-details/' ) ); ?>">
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
      </section>

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
                  <a class="activity-card__read-more" href="<?php echo esc_url( home_url( '/workshop-details/' ) ); ?>">
                    Read More <i class="ri-arrow-right-s-line" aria-hidden="true"></i>
                  </a>
                  <a
                    class="button button--outline button--compact activity-card__event-button"
                    href="<?php echo esc_url( home_url( '/workshop-kids-registration/' ) ); ?>"
                  >Register</a>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>

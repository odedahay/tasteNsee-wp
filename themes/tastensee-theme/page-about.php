<?php get_header(); ?>
    <main id="main-content">
      <section class="about-hero">
        <img class="about-hero__background" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-hero.png' ) ); ?>" alt="" />
        <div class="about-hero__inner page-shell">
          <div class="about-hero__content">
            <p class="eyebrow">How sweet it can be!</p>
            <h1 class="about-hero__title">
              <span>Baking with Heart,</span>
              <span>Creating Sweet Memories</span>
            </h1>
            <div class="about-hero__statement">
              <span class="about-hero__rule" aria-hidden="true"></span>
              <i class="ri-heart-3-line" aria-hidden="true"></i>
              <span class="about-hero__rule" aria-hidden="true"></span>
            </div>
            <p class="about-hero__subtitle">Every cake tells a story.</p>
            <div class="about-hero__copy">
              <p>
                What began as a passion for baking has grown into a business built on creativity, compassion, and
                celebrating life’s most meaningful moments.
              </p>
              <p>
                Whether I’m designing a custom wedding cake or teaching a child during one of our creative
                workshops, my goal is always the same—to make people smile.
              </p>
            </div>
            <div class="about-hero__actions">
              <a class="button button--solid about-hero__button" href="consultation.html">Order a Cake</a>
              <a class="button button--outline about-hero__button" href="workshops-events.html">Join a Workshop</a>
            </div>
          </div>
          <div class="about-hero__seal" aria-hidden="true">
            <i class="ri-heart-line"></i>
            <span>Made<br />for you</span>
          </div>
        </div>
      </section>

      <section class="journey section" aria-labelledby="journey-title">
        <div class="journey__grid page-shell">
          <div class="journey__collage">
            <img class="journey__image journey__image--main" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-journey-main.png' ) ); ?>" alt="Cake designer adding finishing touches to a floral cake" />
            <div class="journey__stack">
              <img class="journey__image journey__image--top" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-journey-top.png' ) ); ?>" alt="Cake designer working in her kitchen" />
              <img class="journey__image journey__image--bottom" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-journey-bottom.png' ) ); ?>" alt="Children taking part in a creative cake workshop" />
            </div>
          </div>
          <div class="journey__content">
            <p class="eyebrow">My Journey</p>
            <h2 class="section-heading__title" id="journey-title">From Nursing to Cake Design</h2>
            <div class="journey__copy">
              <p>As a registered nurse, I’ve always believed that caring for people goes beyond healthcare.</p>
              <p>Baking became my creative outlet—a way to bring comfort, joy, and celebration into people’s lives.</p>
              <p>
                Over the years, that passion evolved into tasteNsee, where every cake is handcrafted with premium
                ingredients, thoughtful design, and attention to every detail.
              </p>
              <p>
                Today I’m grateful to create cakes for birthdays, weddings, baby showers, and celebrations of every
                kind while also offering inclusive workshops where children of all abilities can learn, create, and
                belong.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="values" aria-labelledby="values-title">
        <div class="values__inner">
          <div class="section-heading section-heading--center values__heading">
            <p class="eyebrow">Our Value</p>
            <h2 class="section-heading__title" id="values-title">What Matters Most</h2>
          </div>
          <div class="values__grid">
            <article class="value-card">
              <span class="value-card__icon value-card__icon--pink"><i class="ri-heart-3-line" aria-hidden="true"></i></span>
              <h3 class="value-card__title">Handmade with Love</h3>
              <p class="value-card__text">Every order is individually designed and never mass-produced.</p>
            </article>
            <article class="value-card">
              <span class="value-card__icon value-card__icon--purple"><i class="ri-star-line" aria-hidden="true"></i></span>
              <h3 class="value-card__title">Quality Ingredients</h3>
              <p class="value-card__text">Fresh ingredients and attention to detail in every bite.</p>
            </article>
            <article class="value-card">
              <span class="value-card__icon value-card__icon--green"><i class="ri-group-2-line" aria-hidden="true"></i></span>
              <h3 class="value-card__title">Inclusive Community</h3>
              <p class="value-card__text">Creating welcoming workshops for children of all abilities.</p>
            </article>
            <article class="value-card">
              <span class="value-card__icon value-card__icon--pink"><i class="ri-cake-3-line" aria-hidden="true"></i></span>
              <h3 class="value-card__title">Celebrate Every Moment</h3>
              <p class="value-card__text">Because every milestone deserves something beautiful.</p>
            </article>
          </div>
        </div>
      </section>

      <section class="credentials" aria-labelledby="credentials-title">
        <div class="credentials__grid page-shell">
          <div class="credentials__content">
            <h2 class="section-heading__title credentials__title" id="credentials-title">A Little More About Me</h2>
            <ul class="credentials__list">
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Certified Cake Designer</li>
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Registered Nurse</li>
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Home-Based Bakery</li>
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Certified Cake Designer</li>
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Registered Nurse</li>
              <li class="credentials__item"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Home-Based Bakery</li>
            </ul>
          </div>
          <div class="credentials__media">
            <img class="credentials__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-profile.png' ) ); ?>" alt="The tasteNsee founder in her bakery" />
          </div>
        </div>
      </section>

      <section class="reasons" aria-labelledby="reasons-title">
        <div class="page-shell">
          <div class="section-heading section-heading--center reasons__heading">
            <p class="eyebrow">Why Choose Us</p>
            <h2 class="section-heading__title" id="reasons-title">More than Dessert</h2>
          </div>
          <div class="reasons__grid">
            <article class="reason-card">
              <img class="reason-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-service-personal.png' ) ); ?>" alt="" />
              <div class="reason-card__content">
                <h3 class="reason-card__title">Personal Service</h3>
                <p class="reason-card__text">Every order starts with a conversation. No cookie-cutter designs.</p>
              </div>
            </article>
            <article class="reason-card">
              <img class="reason-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-service-creative.png' ) ); ?>" alt="" />
              <div class="reason-card__content">
                <h3 class="reason-card__title">Creative Designs</h3>
                <p class="reason-card__text">Every cake is customized to match your celebration perfectly.</p>
              </div>
            </article>
            <article class="reason-card">
              <img class="reason-card__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/about-service-reliable.png' ) ); ?>" alt="" />
              <div class="reason-card__content">
                <h3 class="reason-card__title">Reliable Experience</h3>
                <p class="reason-card__text">Professional communication, organized planning, and dependable delivery.</p>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="about-cta">
        <div class="about-cta__inner">
          <div class="about-cta__content">
            <div class="about-cta__icon" aria-hidden="true"><i class="ri-cake-3-line"></i></div>
            <div>
              <h2 class="about-cta__title">Let’s Create Something Sweet Together</h2>
              <p class="about-cta__text">
                Whether you’re celebrating a birthday, wedding, baby shower, or simply looking for a beautiful
                dessert—I’d love to help bring your vision to life.
              </p>
            </div>
          </div>
          <a class="button button--solid button--small" href="contact.html">Inquire Now</a>
        </div>
      </section>

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

<?php get_footer(); ?>

<?php get_header(); ?>

<main id="main-content">
    <section class="page-hero" aria-labelledby="testimonials-page-title">
        <div class="page-hero__inner page-shell">
            <p class="eyebrow">Kind Words</p>
            <h1 class="page-hero__title" id="testimonials-page-title">What Our Clients Say</h1>
            <p class="page-hero__description">Sweet celebrations, thoughtful service, and creative experiences—shared by the families and clients who made them memorable.</p>
        </div>
    </section>

    <section class="testimonials-catalog" aria-label="Client testimonials">
        <div class="testimonials-catalog__inner page-shell">
            <div class="testimonials-catalog__grid">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                        $categories = get_the_terms(get_the_ID(), 'testimonial_category');
                        $rating = max(1, min(5, (int) (get_post_meta(get_the_ID(), '_tastensee_testimonial_rating', true) ?: 5)));
                    ?>
                        <article class="testimonial-card testimonial-card--full">
                            <?php if (is_array($categories)) : ?>
                                <span class="testimonial-card__category"><?php echo esc_html(implode(', ', wp_list_pluck($categories, 'name'))); ?></span>
                            <?php endif; ?>
                            <div class="testimonial-card__stars" aria-label="<?php echo esc_attr(sprintf(__('%d out of 5 stars', 'tastensee'), $rating)); ?>">
                                <?php for ($star = 1; $star <= 5; $star++) : ?>
                                    <i class="<?php echo $star <= $rating ? 'ri-star-fill' : 'ri-star-line'; ?>" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </div>
                            <blockquote class="testimonial-card__quote">
                                <?php the_content(); ?>
                            </blockquote>
                            <div class="testimonial-card__author">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'testimonial-card__avatar', 'alt' => '')); ?>
                                <?php endif; ?>
                                <cite>— <?php the_title(); ?></cite>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('Client testimonials are coming soon.', 'tastensee'); ?></p>
                <?php endif; ?>
            </div>
            <?php the_posts_pagination(); ?>
            <section class="testimonials-cta" aria-labelledby="testimonials-cta-title">
                <div>
                    <p class="eyebrow">Let’s make something memorable</p>
                    <h2 id="testimonials-cta-title">Ready to create your own sweet story?</h2>
                </div>
                <div class="testimonials-cta__actions"><a class="button button--solid" href="<?php echo esc_url(home_url('/inquire/')); ?>">Order a Cake</a><a class="button button--outline" href="<?php echo esc_url(home_url('/workshops-events/')); ?>">Explore Workshops</a></div>
            </section>
        </div>
    </section>
</main>


<?php get_footer(); ?>

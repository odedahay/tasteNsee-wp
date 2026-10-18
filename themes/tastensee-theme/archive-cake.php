<?php

/** Cake post type archive. @package TasteNsee */
get_header();
$categories = get_terms(array('taxonomy' => 'cake_category', 'hide_empty' => true));
if (is_wp_error($categories)) {
    $categories = array();
}
$category_icons = array('wedding' => 'ri-cake-3-line', 'birthday' => 'ri-gift-line', 'kids' => 'ri-bear-smile-line', 'fondant' => 'ri-palette-line', 'sweets' => 'ri-cup-line');
$category_order = array_flip(array_keys($category_icons));
usort($categories, static function ($a, $b) use ($category_order) {
    return ($category_order[$a->slug] ?? 99) <=> ($category_order[$b->slug] ?? 99);
});
?>

<main id="main-content">
    <section class="page-hero" aria-labelledby="gallery-title">
        <div class="page-hero__inner page-shell">
            <p class="eyebrow">Made with love</p>
            <h1 class="page-hero__title" id="gallery-title">Cake Gallery</h1>
            <p class="page-hero__description">
                Every cake tells a story. Browse our portfolio of custom creations — from intimate birthday cakes to
                towering wedding tiers — and find the style that speaks to your celebration.
            </p>
        </div>
    </section>

    <section class="gallery-catalog" aria-label="Cake gallery collection">
        <div class="gallery-catalog__inner page-shell">
            <div class="gallery-catalog__results">
                <p class="gallery-catalog__count" aria-live="polite">Showing <strong data-gallery-count><?php echo esc_html($wp_query->post_count); ?></strong> cakes</p>
                <div class="gallery-grid">
                    <?php while (have_posts()) : the_post();
                        $cake_terms = get_the_terms(get_the_ID(), 'cake_category');
                        $cake_terms = is_array($cake_terms) ? $cake_terms : array();
                        $slugs = wp_list_pluck($cake_terms, 'slug');
                        $category_label = implode(', ', wp_list_pluck($cake_terms, 'name'));
                        $category_slug = $slugs ? $slugs[0] : 'uncategorized';
                        $image_id = get_post_thumbnail_id();
                        $image_url = wp_get_attachment_image_url($image_id, 'full');
                    ?>
                        <button class="gallery-card" type="button"
                            data-category="<?php echo esc_attr(implode(' ', $slugs)); ?>"
                            data-gallery-title="<?php echo esc_attr(get_the_title()); ?>"
                            data-gallery-category="<?php echo esc_attr($category_label); ?>"
                            data-gallery-image="<?php echo esc_url($image_url ?: ''); ?>"
                            aria-label="<?php echo esc_attr(sprintf(__('View %s', 'tastensee'), get_the_title())); ?>"
                            aria-haspopup="dialog" aria-controls="gallery-modal" <?php disabled(! $image_url); ?>>
                            <?php if ($image_url) : ?>
                                <?php echo wp_get_attachment_image($image_id, 'large', false, array('class' => 'gallery-card__image', 'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title())); ?>
                            <?php else : ?>
                                <span class="gallery-card__placeholder"><?php esc_html_e('Cake image coming soon', 'tastensee'); ?></span>
                            <?php endif; ?>
                            <?php if ($category_label) : ?>
                                <span class="gallery-card__tag gallery-card__tag--<?php echo esc_attr($category_slug); ?>"><?php echo esc_html($category_label); ?></span>
                            <?php endif; ?>
                        </button>
                    <?php endwhile; ?>
                    <?php if (0 === $wp_query->post_count) : ?>
                        <p class="gallery-catalog__empty"><?php esc_html_e('Our cake collection is coming soon. Please check back for our latest creations.', 'tastensee'); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <aside class="gallery-sidebar" aria-label="Gallery categories and actions">
                <div class="gallery-sidebar__heading">
                    <span>Browse by</span>
                    <strong>Category</strong>
                </div>
                <div class="gallery-sidebar__filters" role="group" aria-label="Filter gallery by category">
                    <button class="gallery-filter gallery-filter--active" type="button" data-gallery-filter="all" aria-pressed="true">
                        <span class="gallery-filter__label"><i class="ri-apps-2-line" aria-hidden="true"></i>All</span>
                        <span class="gallery-filter__count"><?php echo esc_html($wp_query->post_count); ?> <i class="ri-arrow-right-s-line" aria-hidden="true"></i></span>
                    </button>
                    <?php foreach ($categories as $category) : ?>
                        <button class="gallery-filter" type="button" data-gallery-filter="<?php echo esc_attr($category->slug); ?>" aria-pressed="false">
                            <span class="gallery-filter__label"><i class="<?php echo esc_attr($category_icons[$category->slug] ?? 'ri-cake-3-line'); ?>" aria-hidden="true"></i><?php echo esc_html($category->name); ?></span>
                            <span class="gallery-filter__count"><?php echo esc_html($category->count); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="gallery-sidebar__actions">
                    <h2>Quick actions</h2>
                    <a class="gallery-sidebar__button gallery-sidebar__button--primary" href="<?php echo esc_url(home_url('/consultation/')); ?>">Order a Custom Cake</a>
                    <a class="gallery-sidebar__button gallery-sidebar__button--outline" href="<?php echo esc_url(home_url('/contact/')); ?>">Inquire Now</a>
                    <a class="gallery-sidebar__question" href="<?php echo esc_url(home_url('/contact/')); ?>">Ask a question <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                </div>
            </aside>
        </div>
    </section>

    <section class="gallery-cta" aria-labelledby="gallery-cta-title">
        <div class="gallery-cta__inner page-shell">
            <div class="gallery-cta__top">
                <div class="gallery-cta__content">
                    <p class="gallery-cta__eyebrow">Your vision, our craft</p>
                    <h2 class="gallery-cta__title" id="gallery-cta-title">
                        Love what you see? Let’s create yours.</h2>
                    <p class="gallery-cta__text">
                        Every cake in this gallery started with a conversation. Tell us about your occasion, your flavours,
                        and your dream design — we’ll bring it to life.
                    </p>
                </div>
                <div class="gallery-cta__actions">
                    <a class="gallery-cta__button gallery-cta__button--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Start Your Custom Order</a>
                    <a class="gallery-cta__button gallery-cta__button--outline" href="<?php echo esc_url(home_url('/workshops-events/#workshops')); ?>">Browse Workshops</a>
                </div>
            </div>
            <ul class="gallery-cta__features">
                <li><i class="ri-cake-3-line" aria-hidden="true"></i>200+ custom cakes made</li>
                <li><i class="ri-star-fill" aria-hidden="true"></i>5-star rated by clients</li>
                <li><i class="ri-map-pin-2-line" aria-hidden="true"></i>Serving Calgary &amp; area</li>
                <li><i class="ri-brush-line" aria-hidden="true"></i>Collaborative design process</li>
                <li><i class="ri-heart-3-line" aria-hidden="true"></i>Inclusive &amp; accommodating</li>
            </ul>
        </div>
    </section>

</main>

<?php get_template_part('template-parts/home-gallery-modal'); ?>
<?php get_footer(); ?>
# TasteNsee WordPress theme

The Cake Gallery lives at `/cakes/` and uses `archive-cake.php`. Manage entries under **Cakes** in WordPress: set the title, cake image (featured image), and Cake Categories. The Order field controls gallery order. Cards open the full image in a modal; category filters and counts update from published cakes.

The post type and taxonomy are registered by `wp-content/mu-plugins/tastensee-cakes.php`, which WordPress loads automatically. Keep that file when deploying the theme. The gallery loop and card markup live in `archive-cake.php`. Upload images through **Cakes → Add New Cake → Set cake image** in WordPress admin; no sample import is required. Cakes without an image display a placeholder until you upload one.

- `header.php` / `footer.php`: shared page shell with WordPress hooks.
- `index.php`: basic WordPress content loop with the title and content.
- `functions.php`: theme support and enqueued CSS/JavaScript.
- `style.css`: WordPress theme metadata.
- `index.html`: untouched source reference.

The original `styles.css` was not supplied. Add it to this directory to restore the design; the theme enqueues it automatically when present.

Internal .html links now target WordPress page slugs. Create the corresponding pages (gallery, workshops-events, about, blog, testimonials, contact, consultation, workshop-details, workshop-kids-registration, blog-details) or update those links to your actual permalinks. The homepage section templates remain available in `template-parts/` for building individual page templates. There is no dedicated front-page template. Forms and social-link placeholders retain the original demo behavior and require service integration for real submissions.

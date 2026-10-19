# TasteNsee WordPress theme

Testimonials are registered by `mu-plugins/tastensee-testimonials.php`. Under **Testimonials → Add New Testimonial**, use the title for the client name, the editor for the quote, Client photo for the avatar, Testimonial Categories for the service label, and Star rating for 1–5 stars. The `/testimonials/` archive displays 12 entries per page, ordered by Order then newest date. `archive-testimonial.php` loads the card loop in `archive-testimonials.php`. The former static cards are replaced; add the reviews through WordPress admin.

The Cake Gallery lives at `/cakes/` and uses `archive-cake.php`. Manage entries under **Cakes** in WordPress: set the title, cake image (featured image), and Cake Categories. The Order field controls gallery order. Cards open the full image in a modal; category filters and counts update from published cakes.

The post type and taxonomy are registered by `wp-content/mu-plugins/tastensee-cakes.php`, which WordPress loads automatically. Keep that file when deploying the theme. The gallery loop and card markup live in `archive-cake.php`. Upload images through **Cakes → Add New Cake → Set cake image** in WordPress admin; no sample import is required. Cakes without an image display a placeholder until you upload one.

To show a cake under **Order a Custom Cake** on the homepage, check **Homepage feature → Featured on homepage** in its editor and save. The homepage displays up to 10 published featured cakes with images, sorted by Order and then title. If more than 10 are selected, the first 10 appear. The homepage uses `template-parts/home-creations.php` for this section.

- `header.php` / `footer.php`: shared page shell with WordPress hooks.
- `index.php`: basic WordPress content loop with the title and content.
- `functions.php`: theme support and enqueued CSS/JavaScript.
- `style.css`: WordPress theme metadata.
- `index.html`: untouched source reference.

The original `styles.css` was not supplied. Add it to this directory to restore the design; the theme enqueues it automatically when present.

Internal .html links now target WordPress page slugs. Create the corresponding pages (gallery, workshops-events, about, blog, testimonials, contact, consultation, workshop-details, workshop-kids-registration, blog-details) or update those links to your actual permalinks. The homepage section templates remain available in `template-parts/` for building individual page templates. There is no dedicated front-page template. Forms and social-link placeholders retain the original demo behavior and require service integration for real submissions.

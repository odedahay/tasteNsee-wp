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


## Pop-Up Markets

`wp-content/mu-plugins/tastensee-popups.php` registers the `popup` post type. The **Market Details** field group is stored in the WordPress database and editable under **ACF → Field Groups → Market Details**. Deploy this MU plugin with the theme, and export/import the group using ACF → Tools when moving sites. No paid ACF features are needed. Keep the existing field names (`popup_date`, `popup_start_time`, `popup_end_time`, `popup_location`), field keys, types, and the Pop-Up Market location rule intact because templates and saved entries depend on them.

Under **Pop-Up Markets → Add New**, enter the title, description, optional excerpt and market image, then the required Event date, Start time, End time, and Location. Publish the event to display it under `#markets` on `/workshops-events/`. The listing sorts by the event date descending (latest date first), excludes drafts and dates before today, and includes today's events until the day ends in the WordPress site timezone. Set Settings → General → Timezone to the business timezone (America/Edmonton for Calgary). Markets without an event date do not appear.

The custom query uses ACF's raw `Ymd` date values, not the post publication date. With no upcoming markets, the section displays an empty-state message. The existing hardcoded sample markets are replaced rather than imported.

`single-popup.php` renders the featured image, editor content, event details, share button, and link back to the listing. Single URLs use `/pop-up-markets/{slug}/`; old events remain directly accessible with a past-event notice. There is no market registration form or separate archive. Rewrite rules refresh once after installation.


## Past Pop-Up Events

`page-past-events.php` displays all published pop-up markets with `popup_date` earlier than today, newest event date first. Its WordPress Page uses the slug `past-events` and is linked from the Pop-Up Markets section. Events enter the past listing automatically the day after their event date in the WordPress site timezone; no post or ACF data is moved or duplicated. Individual URLs continue to use `single-popup.php`. Both lists share `template-parts/popup-card.php`.

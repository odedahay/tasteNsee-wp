# Adult Workshops

Manage **Adult Workshops → Add New**. Enter the title, description and featured image, then the **Adult Workshop Details** ACF fields: date, start/end time, location, CAD price and registration status. The ACF group is stored in the database and editable in ACF → Field Groups. Preserve its field names and keys.

Only published, upcoming workshops with registration **Open** appear in the Adult form. Closed and Fully booked upcoming workshops remain in the listing with registration unavailable. Listings sort soonest first. The four previous static cards are imported as Closed drafts; review dates, price and description before publishing. These are separate from Kids Workshops and Pop-Up Markets.

**Forminator → Forms → Adult Workshop Registration** manages the reusable form. Read entries under **Forminator → Submissions**. The WordPress option `tastensee_adult_form_id` stores its ID. Keep Workshop as `select-1` and Age as `number-1`, because the custom connection uses those IDs. The dropdown is automatic and must not be maintained manually. Adults must be at least 18; declining media permission is accepted. New requests do not reserve or decrement seats; Karen confirms availability and arranges payment manually.

The requested `page-workshop-adult-registration.php` is the main template, assigned to the existing registration page. The previous `page-workshops-adult-registration.php` delegates to it to preserve the existing URL. Both use the existing shared `kids-form.css` styling. Register links preselect a workshop with `?workshop=POST_ID`.

Successful submissions redirect in the same tab to `/workshop-registration-received/`. The shared thank-you wording is neutral for both adults and kids. Karen receives a summary at tastensee82@gmail.com; participants receive an acknowledgement at their submitted Email. Medical and allergy details are excluded from notifications and remain in saved entries. Local tests intercept emails and do not confirm inbox delivery.

Deploy `mu-plugins/tastensee-adult-workshops.php` with the theme and migrate the database: the ACF group, Forminator form, page template assignment and form-ID option are database records. Export/import tools are available in ACF and Forminator; update `tastensee_adult_form_id` if importing changes the form ID. Save Permalinks after a manual migration.

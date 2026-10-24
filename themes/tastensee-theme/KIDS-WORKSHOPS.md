# Kids Workshops

The MU plugin `mu-plugins/tastensee-kids-workshops.php` registers `kids_workshop` and connects the Kids Forminator form. Keep it installed alongside the theme.

## Manage workshops

Use **Kids Workshops → Add New**. Enter the title, description, featured image and **Kids Workshop Details**: date, start and end times, location, CAD price, and registration status. Publish a future workshop and set its status to **Open** to make it selectable. Closed and Fully booked workshops remain visible in upcoming listings but cannot be registered. Past workshops and drafts are excluded. Upcoming workshops are ordered soonest first. Dates follow Settings → General → Timezone (America/Edmonton for Calgary).

The five former static cards were imported as **drafts**, initially Closed, without invented prices or descriptions. Review these before publishing. The date-TBA draft needs a date.

## Registration form

Edit **Forminator → Forms → Kids Workshop Registration** (initial form ID 144). The ID is saved in the `tastensee_kids_form_id` WordPress option. The page template embeds that ID automatically. Read entries under **Forminator → Submissions**.

The Workshop field `select-1` is populated automatically. Do not rename/delete it or manually maintain its options. Keep Age as `number-1` for server validation. Other fields, consent wording and notifications are editable in Forminator. Child ages are 8–14. The media question requires a choice; declining is accepted. Registration requests await Karen’s availability confirmation and manual payment instructions; this does not reserve or decrement seats.

Karen’s notification goes to tastensee82@gmail.com. The guardian acknowledgement goes to the submitted Guardian Email. Notifications omit medical details and authorized pickup contacts. Full entries stay in Forminator. Verify mail delivery on the production host; local tests intercept mail and do not prove inbox delivery.

Register buttons pass `?workshop=POST_ID` to preselect the workshop. Form submissions recheck published status, date and registration status. The dropdown synchronizes during WordPress initialization; a workshop changed in another tab is validated again on submission. No open workshops produces an empty state instead of an unusable form.

The theme files are `page-workshops-events.php`, `template-parts/kids-workshop-card.php`, `single-kids_workshop.php`, `page-workshop-kids-registration.php`, `kids-form.css` and the small demo-selector adjustment in `scripts/script.js`.

## Moving the site

Migrate the database and uploads as well as the theme and MU plugin. The ACF field group and Forminator form are stored in the database. Their export tools can be used for selective migrations, but update `tastensee_kids_form_id` if importing changes the form ID. Keep ACF field names and the `kids_workshop` post type stable. Save Settings → Permalinks after a manual migration.

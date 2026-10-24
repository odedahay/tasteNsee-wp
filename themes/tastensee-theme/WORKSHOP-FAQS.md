# Workshop FAQs

Use **FAQs → Add New** in WordPress.

- Question: post title.
- Answer: content editor (paragraphs, lists and links are supported).
- FAQ Audience: check **Kids Workshops**, **Adult Workshops**, or both to share one answer.
- FAQ Settings → Display order: smaller numbers first. Use 10, 20, 30; ties use the oldest FAQ first.
- Publish to display; save as Draft to hide. An FAQ without an audience is hidden.

The two single-workshop templates load the shared `template-parts/workshop-faqs.php` accordion. The taxonomy applies to FAQ records; workshop templates choose their audience automatically. FAQs have no public standalone URLs or archives. Existing workshop data and registration forms are unaffected.

The MU plugin `mu-plugins/tastensee-workshop-faqs.php` registers `workshop_faq`, the `faq_audience` taxonomy, the order editor and query helper. Audience slugs `kids` and `adult` connect to the templates; preserve them. The current static questions and answers were imported once, retaining their audiences and order. Subsequent edits are made in WordPress, not in PHP.

Migrate the database and MU plugin with the theme. FAQ records, audience terms and order values are stored in the database. No paid plugin or ACF Pro feature is required.

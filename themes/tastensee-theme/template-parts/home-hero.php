<?php
/** Editable homepage hero. @package TasteNsee */
$home_id = get_queried_object_id();
$hero_value = static function ( $name, $default ) use ( $home_id ) {
    return function_exists( 'get_field' ) && metadata_exists( 'post', $home_id, 'home_hero_' . $name )
        ? get_field( 'home_hero_' . $name, $home_id ) : $default;
};
$eyebrow = $hero_value( 'eyebrow', 'How sweet it can be!' );
$heading = $hero_value( 'heading', "Made for you!\nCustom Cakes &\nDesserts" );
$description = $hero_value( 'description', 'Custom cakes, delicious desserts, and creative edible arts workshops for every celebration.' );
$badge = $hero_value( 'badge', "Made\nfor you" );
$buttons = array(
    array( 'style' => 'solid', 'link' => $hero_value( 'primary_cta', array( 'url' => home_url( '/contact' ), 'title' => 'Order a Cake', 'target' => '' ) ) ),
    array( 'style' => 'outline', 'link' => $hero_value( 'secondary_cta', array( 'url' => home_url( '/workshops-events' ), 'title' => 'Join a Workshop', 'target' => '' ) ) ),
);
$image_id = absint( $hero_value( 'image', 0 ) );
$image_alt = (string) $hero_value( 'image_alt', '' );
if ( '' === $image_alt ) {
    $image_alt = $image_id ? (string) get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : 'Floral custom cake displayed outdoors';
}
?>
<section class="hero">
  <div class="hero__inner page-shell">
    <div class="hero__content">
      <?php if ( $eyebrow ) : ?><p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
      <?php if ( $heading ) : ?><h1 class="hero__title"><?php echo nl2br( esc_html( $heading ) ); ?></h1><?php endif; ?>
      <?php if ( $description ) : ?><p class="hero__description"><?php echo nl2br( esc_html( $description ) ); ?></p><?php endif; ?>
      <div class="hero__actions">
        <?php foreach ( $buttons as $button ) : ?>
          <?php $link = $button['link']; ?>
          <?php if ( is_array( $link ) && ! empty( $link['url'] ) && ! empty( $link['title'] ) ) : ?>
            <a class="button button--<?php echo esc_attr( $button['style'] ); ?>" href="<?php echo esc_url( $link['url'] ); ?>"<?php if ( '_blank' === ( $link['target'] ?? '' ) ) : ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html( $link['title'] ); ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="hero__visual">
      <?php if ( $image_id && wp_attachment_is_image( $image_id ) ) : ?>
        <?php echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'hero__image', 'alt' => $image_alt, 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?>
      <?php else : ?>
        <img class="hero__image" src="<?php echo esc_url( get_theme_file_uri( 'assets/hero-cake.png' ) ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" fetchpriority="high" />
      <?php endif; ?>
      <?php if ( $badge ) : ?>
        <div class="hero__seal" aria-hidden="true">
          <i class="hero__seal-heart ri-heart-line"></i>
          <span><?php echo nl2br( esc_html( $badge ) ); ?></span>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

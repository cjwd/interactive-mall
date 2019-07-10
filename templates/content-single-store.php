<?php
/**
 * Store Meta
 */
$phone = get_post_meta($post->ID, 'imm_store_phone', true);
$website = get_post_meta($post->ID, 'imm_store_website', true);
$facebook = get_post_meta($post->ID, 'imm_store_facebook', true);
$twitter = get_post_meta($post->ID, 'imm_store_twitter', true);
$instagram = get_post_meta($post->ID, 'imm_store_instagram', true);
$floor = get_post_meta($post->ID, 'imm_store_floor', true);
$logo = get_post_meta($post->ID, 'imm_store_logo', true);

?>
<?php do_action( 'imm_before_single_store' ); ?>

<div class="store store--single bleed" id="store-<?php the_ID(); ?>">
<section class="store__information">
  <?php the_title( '<h1 class="store__title entry-title">', '</h1>' ); ?>
  <?php
  $terms = get_the_terms($post->ID, 'imm_store_category');
  if( $terms and !is_wp_error( $terms )) :
    foreach( $terms as $term) :
  ?>
    <span class="pill">
      <?= $term->name; ?>
    </span>
    <?php endforeach; ?>
  <?php endif; ?>

  <div class="store__meta flex flex--equal">
    <?php if($phone) : ?>
      <div class="store__meta-item">
        <small><b>Phone</b></small>
        <p><?= $phone; ?></p>
      </div>
    <?php endif; ?>
    <?php if($website) : ?>
      <div class="store__meta-item">
        <small><b>Website</b></small>
        <p><a href="<?= $website; ?>"><?= $website; ?></a></p>
      </div>
    <?php endif; ?>
  </div>

  <div class="store__description">
    <?php the_content(); ?>
    <div class="imm_social_links">
      <?php if($facebook) : ?>
        <span class="imm_social_link">
          <a class="c-icon-link c-icon-link--primary" href="<?= $facebook; ?>"><svg class="o-icon icon-twitter o-icon--24"><use xlink:href="<?= plugin_dir_url(dirname(__FILE__)) . 'public/icons/symbol-defs.svg#icon-facebook'; ?>"></use></svg></a>
        </span>
      <?php endif; ?>
      <?php if($instagram) : ?>
        <span class="imm_social_link"><a class="c-icon-link c-icon-link--primary" href="<?= $instagram; ?>"><svg class="o-icon icon-instagram o-icon--24"><use xlink:href="<?= plugin_dir_url(dirname(__FILE__)) . 'public/icons/symbol-defs.svg#icon-instagram'; ?>"></use></svg></a></span>
      <?php endif; ?>
      <?php if($twitter) : ?>
      <span class="imm_social_link"><a class="c-icon-link c-icon-link--primary" href="<?= $twitter; ?>"><svg class="o-icon icon-twitter o-icon--24"><use xlink:href="<?= plugin_dir_url(dirname(__FILE__)) . 'public/icons/symbol-defs.svg#icon-twitter'; ?>"></use></svg></a></span>
      <?php endif; ?>
    </div>

    <div class="store__meta flex flex--equal">
      <div class="store__meta-item">
        <small><b>Location</b></small>
        <p><img src="<?= $logo; ?>" /></p>
        <p>Level <?= $floor; ?></p>
      </div>
    </div>
  </div>
</section>
<figure class="store__photo">
  <?php the_post_thumbnail(); ?>
</figure class="store__photo">
</div>

<?php do_action( 'imm_after_single_store' ); ?>
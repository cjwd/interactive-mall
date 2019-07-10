<?php

$args = [
  'post_type' => 'imm_store',
  'posts_per_page'  => (int)$atts->num_stores
];

if ($atts->categories) {
  $categories = explode(',', $atts->categories);
  $args['category__in'] = $categories;
}

if ($atts->exclude_categories) {
  $exclude_categories = explode(',', $atts->exclude_categories);
  $args[ 'category__not_in'] = $exclude_categories;
}

$view = $atts->view;
$link_url = $atts->link_url;
$link_text = $atts->link_text;

$query = new WP_Query( $args );

if ( 'list' == $view ) {
  $classes = 'flex-grid';
} else {
  $classes = 'grid grid-3';
}

?>

<div class="imm-stores-wrapper">
  <h3><?= esc_html__($atts->title, 'imm'); ?></h3>
  <?php if ( $query->have_posts() ) : ?>
    <div class="imm-stores <?= $classes; ?>">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php gcm_display_stores_list($atts, $view); ?>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php if ( $link_url ) : ?>
        <a href="<?= $link_url; ?>" class="button button-primary is-primary"><?= $link_text; ?></a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
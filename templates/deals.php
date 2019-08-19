<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
  'post_type' => 'imm_deal',
  'posts_per_page'  => (int)$atts->num_deals,
  'paged' => $paged
];

if ($atts->categories) {
  $categories = explode(',', $atts->categories);
  $args['tax_query'] = [
    [
      'taxonomy'  => 'imm_deal_category',
      'terms' => $categories
    ]
  ];
}

if ($atts->exclude_categories) {
  $exclude_categories = explode(',', $atts->exclude_categories);
  $args['tax_query'] = [
    [
      'taxonomy'  => 'imm_deal_category',
      'terms' => $exclude_categories,
      'operator' => 'NOT IN'
    ]
  ];
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
        <?php gcm_display_deals_list($atts, $view); ?>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php if ( $link_url ) : ?>
      <a href="<?= $link_url; ?>" class="button button-primary is-primary"><?= $link_text; ?></a>
      <?php endif; ?>
    <?php endif; ?>
  <?php
  if( "true" == $atts->show_pagination) {
    posts_pagination($query->max_num_pages);
  }
  ?>
</div>
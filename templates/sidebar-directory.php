<aside class="spaces-list" id="spaces-list">
  <div class="search">
    <input class="search__input" placeholder="Search..." />
    <button class="boxbutton boxbutton--darker close-search" aria-label="Close details"><svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg></button>
  </div>
  <span class="label">
    <input id="sort-by-name" class="label__checkbox" type="checkbox" aria-label="Show alphabetically"/>
    <label for="sort-by-name" class="label__text">A - Z</label>
  </span>
  <ul class="list list--groupByCategory">
  <?php
  $leases_category = get_option('imm_options')['lease_category'];
  $featured_category = get_option('imm_options')['featured_category'];

  $terms = get_terms( [
    "taxonomy"  => "imm_store_category",
    "exclude" =>  [$leases_category,$featured_category],
    "orderby" => "name"
  ]);

  foreach ($terms as $term) :
    $stores = get_posts([
      'post_type' => 'imm_store',
      'numberposts' => -1,
      'tax_query' => [
        [
          'taxonomy'  => 'imm_store_category',
          'field' => 'term_id',
          'terms' => $term->term_id,
        ]
      ]
    ]);
  ?>
    <li class="list__category" data-category="<?= $term->term_id; ?>"><?= $term->name; ?></li>
    <?php foreach($stores as $store) : ?>
    <?php
    $space = trim(get_post_meta($store->ID, 'imm_store_location', true));
    $level = get_post_meta($store->ID, 'imm_store_floor', true);
    $level = str_replace(array("\n", "\r"),'', trim($level));
    ?>
      <li class="list__item" data-level="<?= $level ?>" data-space="<?php addZero($space); ?>" data-category="<?= $term->term_id; ?>" data-term="<?= $term->name; ?>">
        <a href="#" class="list__link"><?= $store->post_title; ?></a>
        <span class="location-label"><?= 'L' . $level; ?></span>
      </li>
    <?php endforeach; ?>
  <?php endforeach; ?>
  </ul>
</aside>
<!-- /spaces-list -->

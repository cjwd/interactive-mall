<?php
/**
 * Get user defined category representing vacant shops
 */
$leases_category = get_option('imm_options')['lease_category'];

/**
 * Get Empty Shops
 */
$vacancies = get_posts([
  'post_type' => 'imm_store',
  'posts_per_page' => -1,
  'tax_query' => [
    [
      'taxonomy'  => 'imm_store_category',
      'terms' => $leases_category
    ]
  ]
]);

/**
 * Get map locations of empty shops
 */
$map_locations = [];
foreach ($vacancies as $vacancy) {
  $space = trim(get_post_meta($vacancy->ID, 'imm_store_location', true));
  $map_locations[] = $space;
}

$args = [
  'post_type' => 'imm_store',
  'posts_per_page'  =>  -1,
  'tax_query' => [
    [
      'taxonomy'  => 'imm_store_category',
      'field' => 'term_id',
      'terms' => $leases_category,
      'operator'  => 'NOT IN'
    ]
  ]
];

$query = new WP_Query( $args );

?>
<?= get_icon_spritesheet(); ?>
<div class="mall-directory mall-directory--mobile bleed">
  <aside class="mobile-list" id="mobile-list">
  <div class="search">
    <input class="search__input" placeholder="Search..." />
  </div>
  <span class="label">
    <input id="sort-by-name-mobile" class="label__checkbox" type="checkbox" aria-label="Show alphabetically"/>
    <label for="sort-by-name" class="label__text">A - Z</label>
  </span>
  <ul class="list list--groupByCategory">
  <?php
  $leases_category = get_option('imm_options')['lease_category'];

  $terms = get_terms( [
    "taxonomy"  => "imm_store_category",
    "exclude" =>  $leases_category,
    "orderby" => "name"
  ]);

  foreach ($terms as $term) :
    $stores = get_posts([
      'post_type' => 'imm_store',
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
        <a href="<?= get_the_permalink( $store->ID ); ?>" class="list__link"><?= $store->post_title; ?></a>
      </li>
    <?php endforeach; ?>
  <?php endforeach; ?>
  </ul>
</aside>
<!-- /spaces-list -->

</div>
<div class="mall-container bleed">
  <div class="mall-main">
    <div class="mall" data-vacancies="<?= implode(',',$map_locations); ?>">
      <div class="surroundings">
        <!-- get_option -->
        <!-- <img class="surroundings__map" src="img/surroundings.svg" alt="Surroundings"> -->
      </div>
      <div class="levels">
        <?php
        $imm_maps = get_option('imm_maps');
        foreach ($imm_maps as $key => $map) : ?>
          <div class="level level--<?= $key; ?>" data-level="<?= $key; ?>">
            <svg class="map map--<?= $key; ?>" viewBox="0 0 2080 600" width="100%" height="100%" preserveAspectRatio="xMidYMid meet">
              <?= $map ?>
            </svg>
          </div>
        <!-- / level -->
        <?php endforeach; ?>
      </div>
      <!-- /levels -->
    </div>
    <!-- /mall -->

    <button class="boxbutton boxbutton--dark open-search" aria-label="Show search"><svg class="icon icon--search"><use xlink:href="#icon-search"></use></svg></button>
    <!-- mobile search -->

    <nav class="mallnav mallnav--hidden">
      <button class="boxbutton mallnav__button--up" aria-label="Go up"><svg class="icon icon--angle-down"><use xlink:href="#icon-angle-up"></use></svg></button>
      <button class="boxbutton boxbutton--dark mallnav__button--all-levels" aria-label="Back to all levels"><svg class="icon icon--stack"><use xlink:href="#icon-stack"></use></svg></button>
      <button class="boxbutton mallnav__button--down" aria-label="Go down"><svg class="icon icon--angle-down"><use xlink:href="#icon-angle-down"></use></svg></button>
    </nav>
    <!-- /mallnav -->

    <?php if ( $query->have_posts() ) : ?>
    <div class="stores">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php
        $category = get_the_terms($post->ID, 'imm_store_category');
        $space = get_post_meta($post->ID, 'imm_store_location', true);
        $phone = get_post_meta($post->ID, 'imm_store_phone', true);
        $website = get_post_meta($post->ID, 'imm_store_website', true);
        ?>
      <div class="store__item store__card" data-space="<?= addZero($space); ?>" data-category="<?= $category[0]->term_id; ?>">
        <?php the_title('<h3 class="store__item-title">', '</h3>'); ?>
        <div class="store__item-details">
          <p class="store__meta">
            <?php if( $phone ) : ?>
              <span class="store__meta-item"><b>Phone:</b> <?= $phone; ?></span>
            <?php endif; ?>
            <?php if( $website ) : ?>
              <span class="store__meta-item"><b>Website:</b> <a href="<?= $website; ?>"><?= $website; ?></a></span>
            <?php endif; ?>
          </p>
          <div class="store__desc"><?php the_excerpt(); ?></div>
          <?php if( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="btn btn--primary">View Store Page</a>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
      <button class="boxbutton boxbutton--dark content__button content__button--hidden" aria-label="Close details"><svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg></button>
    </div>
    <?php endif; ?>
  </div>

  <?php imm_get_template_part('sidebar', 'directory'); ?>
</div>
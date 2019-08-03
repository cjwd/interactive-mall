<?php
$btn_text = $atts->btn_text;
$btn_url = $atts->btn_url;
$map = get_post_meta($post->ID, 'imm_store_logo', true);
$floor = get_post_meta($post->ID, 'imm_store_floor', true);
$size = get_post_meta($post->ID, 'imm_store_size', true);
?>
<div class="imm-store grid-item">
  <h4 class="imm-store__title"><?php the_title(); ?></h4>

  <?php if ( has_post_thumbnail() && ("true" == $atts->image) ) : ?>
    <figure class="imm-store__img">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
      </a>
    </figure>
  <?php endif; ?>

  <?php if ( "true" == $atts->show_categories) : ?>
    <ul class="imm-store__categories">
    <?php
    $categories = get_categories( array(
        'object_ids'  => $post->ID,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    foreach( $categories as $category ) {
        $category_link = sprintf(
            '<a href="%1$s" alt="%2$s">%3$s</a>',
            esc_url( get_category_link( $category->term_id ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
            esc_html( $category->name )
        );

        echo '<li>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</li> ';
    }
    ?>
    </ul>
  <?php endif; ?>

  <?php if ( "true" == $atts->description ) : ?>
    <div class="imm-store__description">
      <?php the_excerpt(); ?>
    </div>
  <?php endif; ?>

  <?php if ( "true" == $atts->size && !empty($size) ) : ?>
    <p class="imm-store__meta imm-store__meta--size">Space: <?= $size; ?> Square Feet</p>
  <?php endif; ?>

  <?php if ( "true" == $atts->floor ) : ?>
    <p class="store__meta imm-store__meta--level">Level: <?= $floor; ?></p>
  <?php endif; ?>

  <?php if ( $btn_url ) : ?>
    <a href="<?= $btn_url . '?space=' . $post->ID; ?>" class="button button-primary is-primary"><?= $btn_text; ?></a>
  <?php else: ?>
    <a href="<?php the_permalink(); ?>" class="button button-primary is-primary"><?= $btn_text; ?></a>
  <?php endif; ?>
</div>
<?php
$btn_text = $atts->btn_text;
$btn_url = $atts->btn_url;
?>
<div class="imm-store grid-item">
  <h4 class="imm-store__title"><?php the_title(); ?></h4>

  <?php if ( has_post_thumbnail() && ("true" == $atts->show_image) ) : ?>
    <figure class="imm-store__img">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
      </a>
    </figure>
  <?php endif; ?>

  <?php if ( "true" == $atts->show_categories) : ?>
    <div class="imm-store__categories">
    <?php
    $categories = get_terms( array(
        'object_ids'  => $post->ID,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    foreach( $categories as $category ) {
        $category_link = sprintf(
            '<a class="pill" href="%1$s" alt="%2$s">%3$s</a>',
            esc_url( get_category_link( $category->term_id ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
            esc_html( $category->name )
        );

        echo $category_link;
    }
    ?>
    </div>
  <?php endif; ?>

  <?php if ( "true" == $atts->show_description ) : ?>
    <div class="imm-store__description">
      <?php the_excerpt(); ?>
    </div>
  <?php endif; ?>

  <?php if ( $btn_url ) : ?>
    <a href="<?= $btn_url . '?deal=' . $post->ID; ?>" class="button button-primary is-primary"><?= $btn_text; ?></a>
  <?php else: ?>
    <a href="<?php the_permalink(); ?>" class="button button-primary is-primary"><?= $btn_text; ?></a>
  <?php endif; ?>
</div>
<h3 class="immstorelist__title widget-header"><?php echo $instance['title']; ?></h3>
<?php if ( ! "" == $instance['image'] ) : ?>
  <div class="immstorelist__image">
    <img class="advancedtextwidget__image" src="<?php echo $instance['image']; ?>" />
  </div>
<?php endif; ?>
<div class="immstorelist__content">
  <?php
  if ( $instance['applyp'] == 'on' ) {
    echo wpautop( $instance['text'] );
  } else {
    echo $instance['text'];
  }
  ?>
</div>


<div class="imm-store-list">
  <h3 class="widget-header"><?php echo $instance['title']; ?></h3>
</div>
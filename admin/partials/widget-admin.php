<div class="immtextwidget">
  <ul class="form-fields">
    <li>
      <label for="title">
        <?php _e( 'Title:', 'imm' ) ?></label>
      <input class="text-input" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"
        value="<?php echo esc_attr( $instance['title'] ); ?>" />
    </li>
    <li>
      <label for="num_stores">
        <?php _e( 'Number of Stores:', 'imm' ) ?></label>
      <input class="text-input" type="number" id="<?php echo $this->get_field_id( 'num_stores' ); ?>" name="<?php echo $this->get_field_name( 'num_stores' ); ?>"
        value="<?php echo esc_attr( $instance['num_stores'] ); ?>" />
      <small class="extra-help">Type -1 to show all</small>
    </li>
    <li><input type="checkbox" id="<?php echo $this->get_field_id( 'show_map' ); ?>" name="<?php echo $this->get_field_name( 'show_map' ); ?>"
        <?php checked($instance['show_map'], 'on' ); ?>>Show Map </li>
    <li><input type="checkbox" id="<?php echo $this->get_field_id( 'show_size' ); ?>" name="<?php echo $this->get_field_name( 'show_size' ); ?>"
    <?php checked($instance['show_size'], 'on' ); ?>>Show Square Footage </li>
    <li><input type="checkbox" id="<?php echo $this->get_field_id( 'show_cta' ); ?>" name="<?php echo $this->get_field_name( 'show_cta' ); ?>"
    <?php checked($instance['show_cta'], 'on' ); ?>>Show Button </li>
    <li>
      <label for="cta_text">
        <?php _e( 'Button Text:', 'imm' ) ?></label>
      <input class="text-input" type="text" id="<?php echo $this->get_field_id( 'cta_text' ); ?>" name="<?php echo $this->get_field_name( 'cta_text' ); ?>"
        value="<?php echo esc_attr( $instance['cta_text'] ); ?>" />
    </li>
    <li>
      <label for="cta_url">
        <?php _e( 'Button Url:', 'imm' ) ?></label>
      <input class="text-input" type="url" id="<?php echo $this->get_field_id( 'cta_url' ); ?>" name="<?php echo $this->get_field_name( 'cta_url' ); ?>"
        value="<?php echo esc_attr( $instance['cta_url'] ); ?>" />
    </li>
  </ul>
</div>
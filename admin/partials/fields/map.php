<?php

$field_data = (array)get_option('imm_maps');
?>

<div id="field-data">
  <?php foreach( $field_data as $field ) : ?>
    <div class="field-group">
      <textarea rows="5" name="imm_maps[]" class="imm_option_map widefat textarea"><?php echo isset( $field ) ? $field : ''; ?></textarea>
      <button type="button" class="button button-secondary field-data-remove">&times;</button>
    </div>
  <?php endforeach; ?>
</div>
<button id="field-data-add" class="button button-primary">Add</button>

<script type="text/html" id="tmpl-repeater">
  <div class="field-group">
    <textarea rows="5" name="imm_maps[]" class="imm_option_map widefat textarea"></textarea>
    <button type="button" class="button field-data-remove">&times;</button>
  </div>
</script>
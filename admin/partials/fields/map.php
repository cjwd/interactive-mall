<?php $map_options = (array)get_option('imm_maps'); $i = 0; ?>

<div id="field-data" data-fields="<?= count($map_options); ?>">
  <?php foreach( $map_options as $option) : ?>
    <div>
      <div class="field-group">
        <label>Map Label</label>
        <input type="text" name=<?= "imm_maps[$i][label]"; ?> value="<?= isset( $option["label"] ) ? $option["label"] : ''; ?>">
      </div>
      <div class="field-group">
        <label>Map SVG</label>
        <textarea rows="5" name=<?= "imm_maps[$i][msvg]"; ?> class="imm_option_map widefat textarea"><?= isset( $option["msvg"] ) ? $option["msvg"] : ''; ?></textarea>
      </div>
      <button type="button" class="button field-data-remove">&times;</button>
    </div>
  <?php $i++; endforeach; ?>
</div>
<button id="field-data-add" class="button button-primary">Add</button>

<script type="text/html" id="tmpl-repeater">
  <div>
    <div class="field-group">
      <label>Map Label</label>
      <input type="text" name="imm_maps[{{data.i}}][label]">
    </div>
    <div class="field-group">
      <label>Map SVG</label>
      <textarea rows="5" name="imm_maps[{{data.i}}][msvg]" class="imm_option_map widefat textarea"></textarea>
    </div>
    <button type="button" class="button field-data-remove">&times;</button>
  </div>
</script>
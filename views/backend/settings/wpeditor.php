<?php if (!defined('ABSPATH')) {exit;} ?>
<div class="form-group">
    <label class="col-md-2 control-label" for="textinput">
        <?php echo $label; ?>
    </label>
    <div class="col-md-10">
        <?php
        $args = array(
            'textarea_name' => $ident,
            'textarea_rows' => 7
        );
        $value = stripslashes($value);
        wp_editor(wpautop($value), $ident, $args); ?>
    </div>
</div>
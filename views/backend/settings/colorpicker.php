<?php if (!defined('ABSPATH')) {exit;} ?>

<div class="form-group">
    <label class="col-md-2 control-label" for="<?php echo $ident; ?>">
        <?php echo $label; ?>
    </label>
    <div class="col-md-4">
        <div class="input-group colorpicker-component color-field">
            <input name="<?php echo $ident; ?>" type="text" value="<?php echo $value; ?>" class="radius-reset form-control" />
            <span class="radius-reset input-group-addon"><i></i></span>
        </div>
    </div>
</div>
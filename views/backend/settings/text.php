<?php if (!defined('ABSPATH')) {exit;} ?>

<div class="form-group">
    <label class="col-md-2 control-label" for="<?php echo $ident; ?>">
        <?php echo $label; ?>
<?php
        if ($tooltip) {
?>
        <span data-toggle="tooltip" title="<?php echo $tooltip; ?>" class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
<?php
        }
?>
    </label>
    <div class="col-md-4">
        <?php $value = str_replace('\"', '&quot;', $value); ?>
        <input  id="textinput" name="<?php echo $ident; ?>" type="text"  value="<?php echo $value; ?>" placeholder="placeholder" class="form-control  radius-reset input-md">
    </div>
</div>
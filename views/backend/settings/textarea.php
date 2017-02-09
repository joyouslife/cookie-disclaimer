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
        <textarea rows="3" class="form-control radius-reset" id="<?php echo $ident; ?>" name="<?php echo $ident; ?>"><?php echo $value; ?></textarea>
    </div>
</div>

<?php if (!defined('ABSPATH')) {exit;} ?>

<div id="notification">
    <div class="head-container">
        <a class="btn-close">&#x2715;</a>
    </div>
    <div class="content-container">
        <?php echo wpautop($options['general_text']); ?>
    </div>
    <div class="button-container">
        <button><?php echo stripslashes($options['general_button_text']); ?></button>
    </div>
</div>
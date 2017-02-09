<?php if (!defined('ABSPATH')) {exit;} ?>

<div id="notification">
    <div class="head-container">
        <a class="btn-close">&#x2715;</a>
    </div>
    <div class="content-container">
        <p class="first-sentence">
            <?php echo $options['general_cookie_statement']; ?>
        </p>
        <p class="second-sentence">
            <?php echo $options['general_site_ownership']; ?>
        </p>

    </div>
    <div class="button-container">
        <?php $text = stripslashes($options['general_accept_button']); ?>

        <button title="<?php echo $text; ?>"><?php echo$text; ?></button>
    </div>
</div>
<?php if (!defined('ABSPATH')) {exit;} ?>
<?php

?>
#notification {
    position: fixed;
    background: #fff;
    right: 20px;
    bottom: 20px;
    width: 100%;
    max-width: 270px;
    z-index: 99;
    border: 2px solid <?php echo $options['general_border_color']; ?>;
    padding: 20px;
}

#notification .head-container {
    text-align: right;
}

#notification .head-container a.btn-close {
    color: <?php echo $options['general_close_button_color']; ?>;
    cursor: pointer;
    font-size: inherit;
}

#notification .button-container > button {
    padding: 10px;
    background: <?php echo $options['general_button_color']; ?>;
    border: none;
    display: block;
    margin: 0 auto;
    max-width: 211px;
    width: 100%;
    cursor: pointer;
    color: <?php echo $options['general_button_text_color']; ?>;
}
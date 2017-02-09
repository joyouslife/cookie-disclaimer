<?php if (!defined('ABSPATH')) {exit;} ?>

#notification {
    position: fixed;
    background: #fff;
    right: 20px;
    bottom: 20px;
    width: 100%;
    max-width: 270px;
    z-index: 5;
    border: 2px solid <?php echo $options['general_base_color']; ?>;
    padding: 20px;
}

#notification .head-container {
    text-align: right;
}

#notification .head-container a.btn-close {
    cursor: pointer;
    font-size: inherit;
}

#notification .button-container > button {
    padding: 10px;
    background: <?php echo $options['general_base_color']; ?>;
    border: none;
    display: block;
    margin: 0 auto;
    max-width: 191px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    cursor: pointer;
}
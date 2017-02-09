<?php if (!defined('ABSPATH')) {exit;} ?>
<?php
$text = __('By using our website, you agree to our %sprivacy policy%s', $this->app->textDomain);
$text = sprintf($text, '<a href="{url: privacy-policy}" target="_blank">', '</a>');
echo $text;
?>
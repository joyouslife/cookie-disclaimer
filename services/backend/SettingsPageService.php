<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class SettingsPageService extends AbstractService
{
    public function start()
    {
        $result = $this->app->service('SaveSettingsPage', 'backend')->save();
        echo $this->app->service('DisplaySettingsPage', 'backend')->render($result);
    } // end onAddPageAction
}
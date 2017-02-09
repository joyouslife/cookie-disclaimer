<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class SettingsPageService extends AbstractService
{
    public function start()
    {
        $this->app->service('SaveSettingsPage', 'backend');
        $this->app->service('AddCountry', 'backend');
        $this->app->service('SetActiveCountry', 'backend');
        echo $this->app->service('DisplaySettingsPage', 'backend')->render();
    } // end onAddPageAction
}
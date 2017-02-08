<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class DisplaySettingsPageService extends AbstractService
{
    public function render($saveResult)
    {
        $vars = array(
            'settings' => $this->app->service('settings')->getSettings(),
            'saveResult' => $saveResult
        );

        return $this->app->render('backend/settings.php', $vars);
    } // end render
}
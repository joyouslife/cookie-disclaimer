<?php
namespace toyga\services\frontend;

use toyga\core\abstracts\AbstractService;

class AddJsService extends AbstractService
{
    protected function onInit()
    {
        $service = $this->app->service('js');

        $this->app->wp->addAction(
            'wp_enqueue_scripts',
            array($service, 'addFrontendScripts')
        );
    } // end onInit
}
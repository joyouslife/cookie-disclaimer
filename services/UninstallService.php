<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class UninstallService extends AbstractService
{
    protected function onInit()
    {
        $this->app->service('options')->removeAllOptions();
    } // end onInit
}
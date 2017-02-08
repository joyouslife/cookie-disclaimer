<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class InstallService extends AbstractService
{
    public function start()
    {
        $options = $this->app->service('options')->get();

        if ($options) {
            return false;
        }

        $this->app->service('options')->initDefault();
    } // end onInit
}
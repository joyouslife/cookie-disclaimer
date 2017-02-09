<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class InstallService extends AbstractService
{
    public function start()
    {
        $activeOption = $this->app->service('CountryOptions')->getActive();
        $options = $this->app->service('options')->getSettings($activeOption);

        if ($options) {
            return false;
        }

        $this->app->service('options')->initDefault();
    } // end onInit
}
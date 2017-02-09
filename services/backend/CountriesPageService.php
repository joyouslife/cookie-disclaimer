<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class CountriesPageService extends AbstractService
{
    public function start()
    {
        echo $this->app->service('DisplayCountriesPage', 'backend')->render();
    } // end onAddPageAction
}
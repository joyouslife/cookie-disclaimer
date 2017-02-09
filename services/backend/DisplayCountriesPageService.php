<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class DisplayCountriesPageService extends AbstractService
{
    public function render()
    {
        $vars = array(
            'countries' => $this->_getActiveCountries()
        );

        return $this->app->render('backend/countries.php', $vars);
    } // end render

    private function _getActiveCountries()
    {
        $countries = $this->app->service('CountryOptions')->getActiveCountries();

        unset($countries['all']);

        return $countries;
    } // end _getActiveCountries
}
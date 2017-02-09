<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class RemoveCountryService extends AbstractService
{
    public function ajax()
    {
        if (!$this->_hasValueInRequest()) {
            return false;
        }

        $country = $_POST['country'];

        $options = $this->app->service('options')->get('countries');

        if (!$options) {
            $this->app->wp->sendJsonError();
        }

        $options = array_flip($options);

        unset($options[$country]);
        $this->app->service('options')->deleteSettings($country);

        $options = array_flip($options);

        $this->app->service('options')->update('countries', $options);

        if ($this->_isActiveCountry($country)) {
            $this->app->service('countryOptions')->activateDefault();
        }

        $this->app->wp->sendJsonSuccess($_POST);
    } // end onInit

    private function _isActiveCountry($country)
    {
        $activeCountry = $this->app->service('countryOptions')->getActive();

        return $country == $activeCountry;
    } // end _isActiveCountry

    private function _hasValueInRequest()
    {
        return array_key_exists('country', $_POST)
               && !empty($_POST['country']);
    } // end _hasValueInRequest
}
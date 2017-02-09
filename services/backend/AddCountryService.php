<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class AddCountryService extends AbstractService
{
    protected function onInit()
    {
        if (!$this->_hasRequest()) {
            return false;
        }

        $country = $_POST['country'];

        $options = $this->app->service('options')->get('countries');

        if (!$options) {
            $options = array();
        }

        $options[] = $country;

        $this->app->service('options')->update('countries', $options);
        $this->app->service('countryOptions')->setActive($country);
        $this->app->service('options')->initDefault();

        $this->app->result = $this->_getSuccessResult();
    } // end onInit

    private function _hasRequest()
    {
        return array_key_exists('__add_country', $_POST);
    } // end _hasRequest

    private function _getSuccessResult()
    {
        $result = array(
            'status' => 'success',
            'message' => __(
                'Country added successfully',
                $this->app->textDomain
            )
        );

        return $result;
    } // end _getSuccessResult
}
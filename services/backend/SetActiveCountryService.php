<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class SetActiveCountryService extends AbstractService
{
    protected function onInit()
    {
        if (!$this->_hasRequest()) {
            return false;
        }

        $country = $_POST['active_countries'];

        $this->app->service('countryOptions')->setActive($country);

        $this->app->result = $this->_getSuccessResult();
    } // end onInit

    private function _hasRequest()
    {
        return array_key_exists('__country_selector', $_POST);
    } // end _hasRequest

    private function _getSuccessResult()
    {
        $message = __(
            'Country changed to %s successfully',
            $this->app->textDomain
        );

        $sercvice = $this->app->service('countries', 'backend');
        $countryName = $sercvice->getNameByIdent($_POST['active_countries']);
        if ($countryName)

        $message = sprintf($message, $countryName);

        $result = array(
            'status' => 'success',
            'message' => __(
                $message,
                $this->app->textDomain
            )
        );

        return $result;
    } // end _getSuccessResult
}
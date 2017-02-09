<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class SaveSettingsPageService extends AbstractService
{
    protected function onInit()
    {
        if (!$this->_hasSettingsInRequest()) {
            return false;
        }
        $activeOption = $this->app->service('CountryOptions')->getActive();
        $this->app->service('options')->updateSettings($activeOption, $_POST);

        $this->app->result = $this->_getSuccessResult();
    } // end onInit

    private function _hasSettingsInRequest()
    {
        return array_key_exists('__action', $_POST);
    } // end _hasSettingsInRequest

    private function _getSuccessResult()
    {
        $result = array(
            'status' => 'success',
            'message' => __(
                'Settings saved successfully',
                $this->app->textDomain
            )
        );

        return $result;
    } // end _getSuccessResult
}
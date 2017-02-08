<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class SaveSettingsPageService extends AbstractService
{
    public function save()
    {
        if (!$this->_hasSettingsInRequest()) {
            return false;
        }

        $this->app->service('options')->update($_POST);

        return $this->_getSuccessResult();
    } // end onAddPageAction

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
<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class RouterService extends AbstractService
{
    public function start()
    {
        $this->_onUninstallInit();
        $this->_onInstallInit();
        $this->_onCommonInit();
        $this->_onBackendInit();
        $this->_onFrontendInit();
    } // end onInit

    private function _onUninstallInit()
    {
        if (!defined('WP_UNINSTALL_PLUGIN')) {
            return false;
        }

        $this->app->service('uninstall');
    } // end _onUninstallInit

    private function _onInstallInit()
    {
        $service = $this->app->service('install');
        $method = array(&$service, 'start');

        $this->app->wp->registerActivationEvent(
            $this->app->mainFile,
            $method
        );
    } // end _onInstallInit

    private function _onCommonInit()
    {
        $this->app->service('Internationalization');
        $this->app->service('Ajax');
    } // end _onCommonInit

    private function _onFrontendInit()
    {
        if ($this->app->wp->isBackend() && !$this->app->wp->isAjax()) {
            return false;
        }

        $this->app->service('AddNotificationBlock', 'frontend');
    } // end _onBackendInit

    private function _onBackendInit()
    {
        if (!$this->app->wp->isBackend() && !$this->app->wp->isAjax()) {
            return false;
        }

        $this->app->service('addSettingsPage', 'backend');
    } // end _onBackendInit
}
<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class JsService extends AbstractService
{
    public function addSettingsPageScripts()
    {
        $this->app->wp->addJs('jquery');

        $this->app->wp->addJs(
            'bootstrap',
            $this->app->wp->getPluginUrl(
                'libs/bootstrap/js/bootstrap.min.js'
            ),
            array('jquery')
        );

        $this->app->wp->addJs(
            'bootstrap-colorpicker',
            $this->app->wp->getPluginUrl(
                'libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'
            ),
            array('jquery')
        );

        $this->app->wp->addJs(
            $this->app->getHandler('settings'),
            $this->app->wp->getJsUrl('backend/settings.js'),
            array('jquery')
        );

        $data = array(
            'ajaxUrl' => $this->app->wp->getAdminUrl('admin-ajax.php')
        );

        $this->app->wp->registerJsDataObject(
            $this->app->getHandler('settings'),
            'CookieDisclaimer',
            $data
        );
    } // end addSettingsPageScripts

    public function addFrontendScripts()
    {
        $this->app->wp->addJs('jquery');

        $this->app->wp->addJs(
            $this->app->getHandler('general'),
            $this->app->wp->getJsUrl('frontend/general.js'),
            array('jquery'),
            $this->app->version(),
            true
        );
    } // end addFrontendScripts
}
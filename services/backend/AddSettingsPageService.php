<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class AddSettingsPageService extends AbstractService
{
    protected function onInit()
    {
        $this->app->wp->addAction(
            'admin_menu',
            array(&$this, 'onAddPageAction')
        );
    } // end onInit

    public function onAddPageAction()
    {
        $service = $this->app->service('SettingsPage', 'backend');

        $page = $this->app->wp->addMenuPage(
            __("Сookie Disclaimer", $this->app->textDomain),
            __("Сookie Disclaimer", $this->app->textDomain),
            'manage_options',
            'cookie-disclaimer',
            array($service, 'start')
        );

        $service = $this->app->service('css');

        $this->app->wp->addAction(
            'admin_print_styles-'.$page,
            array($service, 'addSettingsPageStyles')
        );

        $service = $this->app->service('js');

        $this->app->wp->addAction(
            'admin_print_scripts-'.$page,
            array($service, 'addSettingsPageScripts')
        );
    } // end onAddPageAction

    public function addSettingsPageScripts()
    {

    } // end addSettingsPageScripts
}
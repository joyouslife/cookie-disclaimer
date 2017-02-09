<?php
namespace toyga\services\backend;

use toyga\core\abstracts\AbstractService;

class AddSettingsPageService extends AbstractService
{
    protected function onInit()
    {
        $this->app->wp->addAction(
            'admin_menu',
            array(&$this, 'onAddGeneralPageAction')
        );

        $this->app->wp->addAction(
            'admin_menu',
            array(&$this, 'onAddManageCountriesPageAction')
        );
    } // end onInit

    public function onAddGeneralPageAction()
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
    } // end onAddGeneralPageAction

    public function onAddManageCountriesPageAction()
    {
        $service = $this->app->service('CountriesPage', 'backend');

        $page = $this->app->wp->addSubMenuPage(
            'cookie-disclaimer',
            __("Countries", $this->app->textDomain),
            __("Countries", $this->app->textDomain),
            'manage_options',
            'cookie-disclaimer-countries',
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
    } // end onAddManageCountriesPageAction
}
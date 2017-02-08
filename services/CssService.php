<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class CssService extends AbstractService
{
    public function addSettingsPageStyles()
    {
        $this->app->wp->addCss(
            'bootstrap',
            $this->app->wp->getPluginUrl(
                'libs/bootstrap/css/bootstrap.min.css'
            )
        );

        $this->app->wp->addCss(
            'bootstrap-colorpicker',
            $this->app->wp->getPluginUrl(
                'libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'
            )
        );

        $this->app->wp->addCss(
            $this->app->getHandler('settings'),
            $this->app->wp->getCssUrl('backend/settings.css'),
            array(),
            $this->app->version()
        );
    } // end addSettingsPageStyles

    public function addNotificationDesktopStyles()
    {
        $url = $this->app->wp->getSiteUrl();
        $url = $this->app->wp->addQueryArg(
            array('cookie_disclaimer' => 'default'),
            $url
        );

        $this->app->wp->addCss(
            $this->app->getHandler('default'),
            $url
        );
    } // end addNotificationDesktopStyles

    public function addNotificationMobileStyles()
    {
        $url = $this->app->wp->getSiteUrl();
        $url = $this->app->wp->addQueryArg(
            array('cookie_disclaimer' => 'mobile'),
            $url
        );

        $this->app->wp->addCss(
            $this->app->getHandler('mobile'),
            $url
        );
    } // end addNotificationMobileStyles

    public function addNotificationRtlStyles()
    {
        $url = $this->app->wp->getSiteUrl();
        $url = $this->app->wp->addQueryArg(
            array('cookie_disclaimer' => 'rtl'),
            $url
        );

        $this->app->wp->addCss(
            $this->app->getHandler('rtl'),
            $url
        );
    } // end addNotificationRtlStyles
}
<?php
namespace toyga\services\frontend;

use toyga\core\abstracts\AbstractService;

class AddCssService extends AbstractService
{
    protected function onInit()
    {
        $this->app->wp->addAction('init', array($this, 'onAddCssAction'));
    } // end onInit

    public function onAddCssAction()
    {
        $service = $this->app->service('css');

        $this->app->wp->addAction(
            'wp_print_styles',
            array($service, 'addNotificationDesktopStyles')
        );


        if ($this->app->wp->isMobile()) {
            $this->app->wp->addAction(
                'wp_print_styles',
                array($service, 'addNotificationMobileStyles')
            );
        }

        if ($this->app->wp->isRtl()) {
            $this->app->wp->addAction(
                'wp_print_styles',
                array($service, 'addNotificationRtlStyles')
            );
        }
    } // end onAddCssAction
}
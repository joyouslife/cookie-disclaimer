<?php
namespace toyga\services\frontend;

use toyga\core\abstracts\AbstractService;

class AddNotificationBlockService extends AbstractService
{
    protected function onInit()
    {
        $cookieService = $this->app->service('cookie');

        if ($cookieService->hasValue()) {
            return false;
        }

        $this->app->wp->addAction(
            'wp_footer',
            array(&$this, 'onAddNotificationAction')
        );

        $this->app->service('GenerateCss', 'frontend');
        $this->app->service('AddCss', 'frontend');
        $this->app->service('AddJs', 'frontend');
    } // end onInit

    public function onAddNotificationAction()
    {
        $optionIdent = $this->app->service('CountryOptions')->getIdentForCurrentUser();
        $options = $this->app->service('options')->getSettings($optionIdent);

        echo $this->app->render(
            'frontend/notification.php',
            array('options' => $options)
        );
    } // end onAddNotificationAction
}
<?php
namespace toyga\services\frontend;

use toyga\core\abstracts\AbstractService;

class AddNotificationBlockService extends AbstractService
{
    protected function onInit()
    {
        $coockieService = $this->app->service('coockie');

        if ($coockieService->hasValue()) {
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
        $options = $this->app->service('options')->get();

        echo $this->app->render(
            'frontend/notification.php',
            array('options' => $options)
        );
    } // end onAddNotificationAction
}
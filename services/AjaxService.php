<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class AjaxService extends AbstractService
{
   protected function onInit()
   {
       $service = $this->app->service('RemoveCountry', 'backend');

       $this->app->wp->addAction(
           'wp_ajax_cookie_disclaimer_remove_country',
           array($service, 'ajax')
       );
   } // end onInit
}
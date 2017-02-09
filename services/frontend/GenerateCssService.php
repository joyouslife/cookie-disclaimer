<?php
namespace toyga\services\frontend;

use toyga\core\abstracts\AbstractService;

class GenerateCssService extends AbstractService
{
    protected function onInit()
    {
        $this->app->wp->addAction(
            'plugins_loaded',
            array(&$this, 'onPrintCssAction'),
            1
        );
    } // end onInit

    public function onPrintCssAction()
    {
        if (!$this->_hasCssTypeInRequest()) {
            return false;
        }

        $type = $_GET['cookie_disclaimer'];

        $optionIdent = $this->app->service('CountryOptions')->getIdentForCurrentUser();
        $options = $this->app->service('options')->getSettings($optionIdent);

        $this->_displayCssContent($type, $options);
    } // end onPrintCssAction

    private function _displayCssContent($type, $options)
    {
        $vars = array('options' => $options);

        switch ($type) {
            case 'default':
                $content = $this->app->render(
                    'frontend/css/desktop.php',
                    $vars
                );
            break;

            case 'mobile':
                $content = $this->app->render(
                    'frontend/css/mobile.php',
                    $vars
                );
            break;

            case 'rtl':
                $content = $this->app->render(
                    'frontend/css/rtl.php',
                    $vars
                );
            break;
        };

        if (!$content) {
            return false;
        }

        header('Content-type: text/css');
        echo $content;
        exit();
    } // end _displayCssContent

    private function _hasCssTypeInRequest()
    {
        return array_key_exists('cookie_disclaimer', $_GET)
               && !empty($_GET['cookie_disclaimer']);
    } // end _hasCssTypeInRequest
}
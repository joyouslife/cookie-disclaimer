<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class SettingsService extends AbstractService
{
    public function getSectors()
    {
        return array(
            'general'   => __('General', $this->app->textDomain),
        );
    } // end getSectors

    public function getGeneralFields()
    {
        return array(
            'cookie_statement'   => array(
                'type' =>  'textarea',
                'label' => __('First Sentence', $this->app->textDomain),
                'value' => __(
                    'We use cookies to give you the best online experience',
                    $this->app->textDomain
                ),
                'tooltip' => __(
                    'Displayed always as the first sentence in the banner',
                    $this->app->textDomain
                ),
            ),
            'site_ownership'   => array(
                'type' =>  'textarea',
                'label' => __('Second Sentence', $this->app->textDomain),
                'value' => $this->app->render('defaults/site_ownership.php'),
                'tooltip' => __(
                    'Displayed as the second sentence in the banner',
                    $this->app->textDomain
                ),
            ),
            'accept_button'   => array(
                'type' =>  'text',
                'label' => __('Accept Button', $this->app->textDomain),
                'value' => __(
                    'Accept and Close',
                    $this->app->textDomain
                ),
                'tooltip' => __(
                    'Text on the button always',
                    $this->app->textDomain
                ),
            ),
            'base_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Base Color', $this->app->textDomain),
                'value' => '#f7c413',
                'tooltip' => __(
                    'Used to define base color for border and button',
                    $this->app->textDomain
                ),
            ),
        );
    } // end getGeneralFields

    public function getSettings()
    {
        $settings = $this->getSectors();
        $activeOption = $this->app->service('CountryOptions')->getActive();
        $options = $this->app->service('options')->getSettings($activeOption);

        foreach ($settings as $key => &$sector) {
            $sector = array(
                'name' => $sector,
                'fields' => array(),
            );

            $methodName = 'get'.ucfirst($key).'Fields';
            $method = array($this, $methodName);


            if (!is_callable($method)) {
               continue;
            }

            $fields = call_user_func_array($method, array());

            foreach ($fields as $ident => $item) {
                $realIdent = $key.'_'.$ident;
                $sector['fields'][$realIdent] = $item;

                if (!$options || !array_key_exists($realIdent, $options)) {
                    continue;
                }

                $sector['fields'][$realIdent]['value'] = $options[$realIdent];
            }
        }



        return $settings;
    } // end getSettings
}
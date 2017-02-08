<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class SettingsService extends AbstractService
{
    public function getSectors()
    {
        return array(
            'general'   => __('General', $this->app->textDomain),
            'mobile'    => __('Mobile', $this->app->textDomain),
            'countries' => __('Countries', $this->app->textDomain),
        );
    } // end getSectors

    public function getGeneralFields()
    {
        return array(
            'text'   => array(
                'type' =>  'wpeditor',
                'label' => __('Text', $this->app->textDomain),
                'value' => $this->app->render('defaults/text.php'),
            ),
            'button_text'   => array(
                'type' =>  'text',
                'label' => __('Button Caption', $this->app->textDomain),
                'value' => __(
                    'Accept and Close',
                    $this->app->textDomain
                ),
            ),
            'border_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Border Color', $this->app->textDomain),
                'value' => '#f7c50b',
            ),
            'button_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Button Color', $this->app->textDomain),
                'value' => '#f7c50b',
            ),
            'button_text_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Button Text Color', $this->app->textDomain),
                'value' => '#65635d',
            ),
            'close_button_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Close Button Color', $this->app->textDomain),
                'value' => '#a1a1a1',
            )
        );
    } // end getGeneralFields

    public function getMobileFields()
    {
        return array(
            'border_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Border Color', $this->app->textDomain),
                'value' => '#a12626',
            ),
            'button_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Button Color', $this->app->textDomain),
                'value' => '#b83a3a',
            ),
            'button_text_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Button Text Color', $this->app->textDomain),
                'value' => '#cccccc',
            ),
            'close_button_color'   => array(
                'type' =>  'colorpicker',
                'label' => __('Close Button Color', $this->app->textDomain),
                'value' => '#8a3636',
            )
        );
    } // end getMobileFields

    public function getCountriesFields()
    {
        return array(
            'information'   => array(
                'type' =>  'countries_information',
            )
        );
    } // end getCountriesFields

    public function getSettings()
    {
        $settings = $this->getSectors();
        $options = $this->app->service('options')->get();

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
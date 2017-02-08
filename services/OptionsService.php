<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class OptionsService extends AbstractService
{
    private $_optionName;

    protected function onInit()
    {
        $this->_optionName = $this->app->config('option_prefix').'settings';
    } // end onInit

    public function get()
    {
        $options = $this->app->wp->getOption($this->_optionName);

        if (!$options) {
            return false;
        }

        $options = json_decode($options, 1);

        return $options;
    } // end get

    public function update($value)
    {
        $value = json_encode($value);

        $this->app->wp->updateOption($this->_optionName, $value);
    } // end update

    public function initDefault()
    {
        $settings = $this->app->service('settings')->getSettings();
        $options = $this->_prepareDefaultValues($settings);

        $this->update($options);
    } // end initDefault

    private function _prepareDefaultValues($settings)
    {
        $options = array();

        foreach ($settings as $sector) {

            foreach ($sector['fields'] as $ident => $item) {
                if (!array_key_exists('value', $item)) {
                    continue;
                }

                $options[$ident] = $item['value'];
            }
        }

        return $options;
    } // end _prepareDefaultValues
}
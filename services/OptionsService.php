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

    private function _prepareName($name)
    {
        return $this->app->config('option_prefix').$name;
    } // end _prepareName

    public function get($name)
    {
        $name = $this->_prepareName($name);

        $options = $this->app->wp->getOption($name);

        if (!$options) {
            return false;
        }

        $options = json_decode($options, 1);

        return $options;
    } // end get

    public function getSettings($countryIdent)
    {
        $optionName = $countryIdent.'_settings';

        return $this->get($optionName);
    } // end getSettings

    public function updateSettings($countryIdent, $value)
    {
        $optionName = $countryIdent.'_settings';

        return $this->update($optionName, $value);
    } // end updateSettings

    public function deleteSettings($countryIdent)
    {
        $optionName = $countryIdent.'_settings';
        $optionName = $this->_prepareName($optionName);

        return $this->app->wp->deleteOption($optionName);
    } // end deleteSettings

    public function update($name, $value)
    {
        $name = $this->_prepareName($name);

        $value = json_encode($value);

        $this->app->wp->updateOption($name, $value);
    } // end update

    public function initDefault()
    {
        $settings = $this->app->service('settings')->getSettings();
        $options = $this->_prepareDefaultValues($settings);

        $activeOption = $this->app->service('CountryOptions')->getActive();
        $this->updateSettings($activeOption, $options);
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

    public function removeAllOptions()
    {
        $service = $this->app->service('CountryOptions');
        $activeOptions = $service->getActiveCountries();

        foreach ($activeOptions as $ident => $name) {
            $this->deleteSettings($ident);
        }

        $name = $this->_prepareName('active_option');
        $this->app->wp->deleteOption($name);

        $name = $this->_prepareName('countries');
        $this->app->wp->deleteOption($name);
    } // end removeAllOptions
}
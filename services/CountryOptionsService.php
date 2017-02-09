<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class CountryOptionsService extends AbstractService
{
    private $_default = 'all';

    public function renderForms()
    {
        $activeCountries = $this->getActiveCountries();

        $vars = array(
            'activeCountries' => $activeCountries,
            'activeOption' => $this->getActive(),
            'countries' => $this->getNotActiveCountries($activeCountries)
        );

       return $this->app->render('backend/country_options_forms.php', $vars);
    } // end renderForms

    public function getActiveCountries()
    {
        $list = array(
            'all' => __('All', $this->app->textDomain)
        );

        $options = $this->app->service('options')->get('countries');

        if (!$options) {
            return $list;
        }

        $countriesService = $this->app->service('countries', 'backend');

        foreach ($options as $ident) {
            $list[$ident] = $countriesService->getNameByIdent($ident);
        }

        return $list;
    } // end getActiveCountries

    public function getNotActiveCountries($activeCountries)
    {
        $countries = $this->app->service('countries', 'backend')->get();


        foreach ($countries as $ident => $name) {
            if (array_key_exists($ident, $activeCountries)) {
                unset($countries[$ident]);
            }
        }

        return $countries;
    } // end getNotActiveCountries

    public function getActive()
    {
        $value = $this->app->service('options')->get('active_option');

        return (!$value) ? $this->_default : $value;
    } // end getActive

    public function setActive($country)
    {
        $this->app->service('options')->update('active_option', $country);
    } // end setActive

    public function activateDefault()
    {
        $this->setActive($this->_default);
    } // end activateDefault

    public function getIdentForCurrentUser()
    {
        $country = $this->app->service('user')->getCountryCode();

        if ($country && $this->_hasSettingsForUserCountry($country)) {
            return $country;
        }

        return $this->_default;
    } // end getIdentForCurrentUser

    private function _hasSettingsForUserCountry($country)
    {
        $activeCountries = $this->getActiveCountries();

        return array_key_exists($country, $activeCountries);
    } // end _hasSettingsForUserCountry
}
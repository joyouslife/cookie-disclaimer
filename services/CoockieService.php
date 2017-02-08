<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class CoockieService extends AbstractService
{
    private $_value;
    private $_name = 'cookie_disclaimer';

    protected function onInit()
    {
        if ($this->_hasValueInGlobalArray()) {
           $this->_value = $_COOKIE[$this->_name];
        }
    } // end onInit

    public function hasValue()
    {
        return $this->_value != false;
    } // end hasValue

    private function _hasValueInGlobalArray()
    {
        return array_key_exists($this->_name, $_COOKIE);
    } // end _hasValueInGlobalArray
}
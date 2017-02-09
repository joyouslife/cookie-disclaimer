<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class UserService extends AbstractService
{
    private $_ip;

    protected function onInit()
    {
        $this->_ip = $this->_getIp();
    } // end onInit

    private function _getIp()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = 'UNKNOWN';
        return $ip;
    } // end _getIp


    public function getCountryCode()
    {
        if (!$this->_ip) {
            return false;
        }

        $geoService = $this->app->service('geo');

        $code = $geoService->getCodeByIP($this->_ip);

        return $code;
    } // end get
}
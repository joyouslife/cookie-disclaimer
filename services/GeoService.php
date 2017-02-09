<?php
namespace toyga\services;

use toyga\core\abstracts\AbstractService;

class GeoService extends AbstractService
{
    private $_ip;

    protected function onInit()
    {
        //$this->_ip = $this->_getIp();
    } // end onInit

    public function getDataByIP($ip)
    {
        $url = 'ipinfo.io/'.$ip.'/geo';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);


        if ($output) {
            return json_decode($output, 1);
        }
        return false;
    } // end getDataByIP


    public function getCodeByIP($ip)
    {
        $data = $this->getDataByIP($ip);

        return $data['country'];
    } // end getCodeByIP
}
<?php namespace Services\Ebay\Transport;

/**
 * Services/Ebay/Transport/Curl.php
 *
 * Send a request via Curl
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */

/**
 * Services/Ebay/Transport/Curl.php
 *
 * Send a request via Curl
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */
class Curl
{
   /**
    * send a request
    *
    * @access   public
    * @param    string  uri to send data to
    * @param    string  body of the request
    * @param    array   headers for the request
    * @return   mixed   either
    */
    function sendRequest( $url, $body, $headers )
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->_createHeaders($headers));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        
        $result = curl_exec($curl);
        
        if ($result === false) {
            throw new \Services\Ebay\Transport\Exception(curl_error( $curl ));
        }
        return $result;
    }

   /**
    * create the correct header syntax used by curl
    *
    * @access   private
    * @param    array       headers as supplied by Services_Ebay
    * @return   array       headers as needed by curl
    */
    function _createHeaders( $headers )
    {
        $tmp = array();
        foreach ($headers as $key => $value) {
            array_push($tmp, "$key: $value");
        }
        return $tmp;
    }
}
?>
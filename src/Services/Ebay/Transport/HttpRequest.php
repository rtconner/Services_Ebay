<?php namespace Services\Ebay\Transport;

/**
 * Services/Ebay/Transport/HttpRequest.php
 *
 * Send a request via PEAR::HTTP_Request2
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */

/**
 * Services/Ebay/Transport/HttpRequest.php
 *
 * Send a request via PEAR::HTTP_Request2
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */
class HttpRequest
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
        $params  = array(
                         'method'  => 'POST',
                         'timeout' => 30
                        );
        $request = new \HTTP_Request2($url);
        
        foreach ($headers as $name => $value) {
            $request->addHeader($name, $value);
        }
        $request->addRawPostData($body);

        $result = $request->sendRequest();
        if (PEAR::isError($result)) {
            throw new \Services\Ebay\Transport\Exception('Could not send request.');
        }
        
        $response = $request->getResponseBody();
        return $response;
    }
}
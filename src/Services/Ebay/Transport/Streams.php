<?php namespace Services\Ebay\Transport;

/**
 * Services/Ebay/Transport/Streams.php
 *
 * Send a request via streams and a simple file_get_contents
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */

/**
 * Services/Ebay/Transport/Streams.php
 *
 * Send a request via streams and a simple file_get_contents
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */
class Streams
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
        $headers['Content-Type'] = 'text/xml';
        $headers = implode("\r\n", $this->_createHeaders($headers));

        $opts = array(
                      'http' => array(
                                      'method'  => 'POST',
                                      'header'  => $headers,
                                      'content' => $body,
                                    )
                     );

        $context = stream_context_create($opts);

        $result = file_get_contents($url, false, $context);
        
        return $result;
    }

   /**
    * create the correct header syntax used by streams context
    *
    * @access   private
    * @param    array       headers as supplied by Services_Ebay
    * @return   array       headers as needed by stream_context_create
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
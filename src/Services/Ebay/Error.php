<?php namespace Services\Ebay;

/**
 * Services/Ebay/Error.php
 *
 * Warning object
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */

/**
 * \Services\Ebay\Error
 *
 * Gives you access to an error returned by eBay
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 */
class Error {
	
    private $code = null;
    private $severityCode = null;
    private $shortMessage = null;
    private $longMessage = null;

   /**
    * create a new error object
    *
    * @param array      error data
    */
    public function __construct($data)
    {
    	if (isset($data['ErrorCode'])) {
    		$this->code = (integer)$data['ErrorCode'];
    	}
    	if (isset($data['SeverityCode'])) {
    		$this->severityCode = $data['SeverityCode'];
    	}
    	if (isset($data['ShortMessage'])) {
    		$this->shortMessage = $data['ShortMessage'];
    	}
    	if (isset($data['LongMessage'])) {
    		$this->longMessage = $data['LongMessage'];
    	}
    }
    
   /**
    * return the error code
    *
    * @return int
    */
    public function getCode()
    {
        return $this->code;
    }

   /**
    * return the severity code
    *
    * @return int
    */
    public function getSeverityCode()
    {
        return $this->severityCode;
    }

   /**
    * return the short message
    *
    * @return string
    */
    public function getShortMessage()
    {
        return $this->shortMessage;
    }

   /**
    * return the short message
    *
    * @return string
    */
    public function getLongMessage()
    {
        return $this->longMessage;
    }
    
   /**
    * String overloading
    *
    * @return string
    */
    public function __toString()
    {
        return sprintf("Services_Ebay %s: %s (%d)\n", $this->getSeverityCode(), $this->getLongMessage(), $this->getCode());
    }
}
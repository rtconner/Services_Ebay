<?php namespace Services\Ebay\Call;

/**
 * Get the return URL
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetReturnURL/GetReturnURLLogic.htm
 */
class GetReturnUrl extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetReturnUrl';

   /**
    * authentication type of the call
    *
    * @var  int
    */
    protected $authType = \Services\Ebay::AUTH_TYPE_USER;

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array();
    
   /**
    * make the API call
    *
    * @param    object Services_Ebay_Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = parent::call($session);
        return $return;
    }
}
?>

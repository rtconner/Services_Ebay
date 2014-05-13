<?php namespace Services\Ebay\Call;

/**
 * Get MyeBay information
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetMyebay/GetMyebayLogic.htm
 */
class GetMyebay extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetMyebay';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'BiddingWatching'
                                );
    
   /**
    * make the API call
    *
    * @param    object Services_Ebay_Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = parent::call($session);
        return \Services\Ebay::loadModel('MyeBay', $return['BiddingWatching'], $session);
    }
}
?>
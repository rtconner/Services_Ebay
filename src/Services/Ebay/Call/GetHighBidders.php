<?php namespace Services\Ebay\Call;

/**
 * Get high bidders for a dutch auction.
 * 
 * Make sure to call this only on dutch auctions!
 * Otherwise you will get an error.
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Carsten Lucke <luckec@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetHighBidders/GetHighBiddersLogic.htm
 */
class GetHighbidders extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetHighBidders';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'ItemId'
                                );
   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = parent::call($session);
        $result = \Services\Ebay::loadModel('BidList', $return, $session);
        return $result;
    }
}
?>
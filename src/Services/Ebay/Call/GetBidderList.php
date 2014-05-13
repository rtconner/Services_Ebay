<?php namespace Services\Ebay\Call;

/**
 * Get all items a user has been/is bidding on
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @todo    build item list model
 */
class GetBidderList extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetBidderList';

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'UserID'                => null,
                            'ActiveItemsOnly'       => 'true',
                            'DetailLevel'           => 'ReturnAll'
                        );
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'UserID',
                                 'ActiveItemsOnly',
                                 'DetailLevel',
                                 'EndTimeFrom',
                                 'EndTimeTo'
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
        return \Services\Ebay::loadModel('ItemList', $return['BidItemArray'], $session);
    }
}
?>

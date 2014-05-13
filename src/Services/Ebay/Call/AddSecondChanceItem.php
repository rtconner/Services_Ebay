<?php namespace Services\Ebay\Call;

/**
 * Add a second chance for a user
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/AddSecondChanceItem/AddSecondChanceItemLogic.htm
 */
class AddSecondChanceItem extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'AddSecondChanceItem';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'ItemID',
                                 'RecipientBidderUserID',
                                 'Duration',
                                 'BuyItNowPrice'
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
        if ($return['Ack'] == 'Success') {
            return $return['Fees']['Fee']['Name'];
        }
    }
}
?>

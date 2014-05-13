<?php namespace Services\Ebay\Call;

/**
 * Add a dispute
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/AddDispute/AddDisputeLogic.htm
 */
class AddDispute extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'AddDispute';

   /**
    * compatibility level this method was introduced
    *
    * @var  integer
    */
    protected $since = 445;
    
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'ItemID',
                                 'TransactionID',
                                 'DisputeReason',
                                 'DisputeExplanation'
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
        if ($return['Ack'] === 'Success') {
        	return $return['DisputeID'];
        }
        return false;
    }
}

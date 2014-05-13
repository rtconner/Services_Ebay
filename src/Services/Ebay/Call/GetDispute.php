<?php namespace Services\Ebay\Call;

/**
 * Get a dispute
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetDispute/GetDisputeLogic.htm
 */
class GetDispute extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetDispute';

   /**
    * compatibility level this method was introduced
    *
    * @var  integer
    */
    protected $since = 361;
    
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'DisputeID',
                                );
    
   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session, $parseResult = true)
    {
        $return = parent::call($session);
        return \Services\Ebay::loadModel('Dispute', $return['Dispute'], $session);
    }
}
?>

<?php namespace Services\Ebay\Call;

/**
 * Get a all disputes the where the current user is either seller or buyer
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetUserDisputes/GetUserDisputesLogic.htm
 * @todo    parse the correct filters from the response
 */
class GetUserDisputes extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetUserDisputes';

   /**
    * compatibility level this method was introduced
    *
    * @var  integer
    */
    protected $since = 361;
    
   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'Pagination' => array(
                                                    'PageNumber' => '1'
                                                )
                        );
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'DisputeFilterType',
                                 'DisputeSortType',
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
        return \Services\Ebay::loadModel('DisputeList', $return, $session);
    }
}
?>

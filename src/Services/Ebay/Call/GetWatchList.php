<?php namespace Services\Ebay\Call;

/**
 * Get the watch list of the current user
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetWatchList/GetWatchListLogic.htm
 */
class GetWatchList extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetWatchList';

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'StartingPage' => 1,
                            'ItemsPerPage' => 25 
                        );

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'WatchSort'
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
        return \Services\Ebay::loadModel('ItemList', $return['WatchList']['Items'], $session);
    }
}
?>
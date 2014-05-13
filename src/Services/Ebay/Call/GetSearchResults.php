<?php namespace Services\Ebay\Call;

/**
 * Get search results
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetSearchResults/GetSearchResultsLogic.htm
 */
class GetSearchResults extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetSearchResults';

    protected $since = 425;

    protected $args = array(
                            'Pagination'     => array(
                                                        'EntriesPerPage'=> 100
                                                    )
                        );

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'Query',
                                 'SearchFlags',
                                 'CategoryID'
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
        return \Services\Ebay::loadModel('SearchResult', $return, $session);
    }
}
?>

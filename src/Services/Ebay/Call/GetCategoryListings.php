<?php namespace Services\Ebay\Call;

/**
 * Get category listing
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetCategoryListings/GetCategoryListingsLogic.htm
 */
class GetCategoryListings extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetCategoryListings';

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'Pagination'     => array(
                                                        'PageNumber'    => 1,
                                                        'EntriesPerPage'=> 100
                                                     ),
                            'ItemTypeFilter' => 'AuctionItemsOnly'
                        );
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'CategoryID',
                                 'OrderBy',
                                 'ItemTypeFilter',
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
        return $return['ItemArray'];
    }
}
?>

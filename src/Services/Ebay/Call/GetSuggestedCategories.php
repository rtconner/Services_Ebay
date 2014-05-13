<?php namespace Services\Ebay\Call;

/**
 * Get suggested categories
 *
 * Use this to determine the best category for an
 * item you want to add
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetSuggestedCategories/GetSuggestedCategoriesLogic.htm
 */
class GetSuggestedCategories extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetSuggestedCategories';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'Query',
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
        return $return['SuggestedCategories'];
    }
}
?>
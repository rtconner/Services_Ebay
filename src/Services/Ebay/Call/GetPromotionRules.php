<?php namespace Services\Ebay\Call;

/**
 * Get promotion rules
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetPromotionRules/GetPromotionRulesLogic.htm
 */
class GetPromotionRules extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetPromotionRules';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'PromotionMethod',
                                 'ItemID',
                                 'StoreCategoryID'
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
        if (!empty($return['PromotionRuleArray'])) {
            return $return['PromotionRuleArray'];	
        }
        return array();
    }
}
?>

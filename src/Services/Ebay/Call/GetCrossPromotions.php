<?php namespace Services\Ebay\Call;

/**
 * Get cross promotions for an items
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetCrossPromotions/GetCrossPromotions.htm
 */
class GetCrossPromotions extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetCrossPromotions';

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'PromotionMethod' => 'CrossSell'
                        );
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'ItemID',
                                 'PromotionMethod',
                                 'PromotionViewMode'
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
        return $return['CrossPromotion'];
    }
}
?>

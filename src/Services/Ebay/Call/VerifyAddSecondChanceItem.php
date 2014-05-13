<?php namespace \Services\Ebay\Call;

/**
 * Verify a second chance item before adding it
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/VerifyAddSecondChanceItem/VerifyAddSecondChanceItemLogic.htm
 */
 
/**
 * Verify an item before adding it
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/VerifyAddSecondChanceItem/VerifyAddSecondChanceItemLogic.htm
 */
class VerifyAddSecondChanceItem extends \Services\Ebay\Call\AddSecondChanceItem
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'VerifyAddSecondChanceItem';

   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   array
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = \Services\Ebay\Call::call($session);
        if (isset($return['Item'])) {
            return $return['Item'];
        }
        return false;
    }
}
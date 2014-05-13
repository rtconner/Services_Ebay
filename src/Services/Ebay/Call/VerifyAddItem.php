<?php namespace Services\Ebay\Call;

/**
 * Verify an item before adding it
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/VerifyAddItem/VerifyAddItemLogic.htm
 */
 
/**
 * Verify an item before adding it
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/VerifyAddItem/VerifyAddItemLogic.htm
 */
class VerifyAddItem extends \Services\Ebay\Call\AddItem
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'VerifyAddItem';

   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
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
?>
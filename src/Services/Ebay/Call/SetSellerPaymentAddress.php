<?php namespace Services\Ebay\Call;

/**
 * Set the payment adress for the seller
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/SetSellerPaymentAddress/SetSellerPaymentAddressLogic.htm
 */
class SetSellerPaymentAddress extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'SetSellerPaymentAddress';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'Name',
                                 'Street1',
                                 'Street2',
                                 'City',
                                 'StateOrProvince',
                                 'Country',
                                 'Zip',
                                 'Phone'
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
        if ($return['CallStatus']['Status'] === 'Success') {
        	return true;
        }
        return false;
    }
}
?>
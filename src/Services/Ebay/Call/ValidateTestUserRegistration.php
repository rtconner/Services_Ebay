<?php namespace Services\Ebay\Call;

/**
 * Validate a test-user registration
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/ValidateTestUserRegistration/ValidateTestUserRegistrationLogic.htm
 */
class ValidateTestUserRegistration extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'ValidateTestUserRegistration';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'NewFeedbackScore',
                                 'SubscribeSM',
                                 'SubscribeSMPro',
                                 'SubscribeSA',
                                 'SubscribeSAPro'
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
        if ($return['CallStatus']['Status'] === 'Success') {
            return true;
        }
        return false;
    }
}
?>
<?php namespace Services\Ebay\Call;

/**
 * Fetch a token from eBay.
 *
 * This method is only needed, when using Services_Ebay in a 
 * non-web environment
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/FetchToken/FetchTokenLogic.htm
 */
class FetchToken extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'FetchToken';

   /**
    * authentication type of the call
    *
    * @var  int
    */
    protected $authType = \Services\Ebay::AUTH_TYPE_USER;

    /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'SecretID'
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
        return $return['FetchTokenResponse']['eBayAuthToken'];
    }
}
?>

<?php namespace Services\Ebay\Call;

/**
 * Set eBay preferences
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/SetPreferences/SetPreferencesLogic.htm
 */
class SetPreferences extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'SetPreferences';

   /**
    * options that will be passed to the serializer
    *
    * @var  array
    */
    protected $serializerOptions = array(
                                            'mode' => 'simplexml'
                                        );
   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array();

   /**
    * constructor
    *
    * @param    array
    */
    public function __construct($args)
    {
        $prefs = $args[0];
        
        if (!$prefs instanceof \Services\Ebay\Model\Preferences ) {
            throw new \Services\Ebay\Exception( 'No preferences passed.' );
        }
        $this->args = $prefs->toArray();
    }
    
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
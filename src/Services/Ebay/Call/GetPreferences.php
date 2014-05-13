<?php namespace Services\Ebay\Call;

/**
 * Get user preferences
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetPreferences/GetPreferencesLogic.htm
 * @todo    build a model for preferences
 */
class GetPreferences extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetPreferences';

   /**
    * options that will be passed to the serializer
    *
    * @var  array
    */
    protected $serializerOptions = array(
                                            'defaultTagName' => 'Preference'
                                        );
   /**
    * create a new call
    *
    * @param    array   details you want to retrieve
    */
    public function __construct($args)
    {
        if (!empty($args)) {
            if (is_array($args[0])) {
                $this->args['Preferences'] = $args[0];
            } else {
                $this->args['Preferences'] = array( $args[0] );
            }
        }
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
        return \Services\Ebay::loadModel('Preferences', $return['GetPreferencesResult']['Preferences'], $session);
    }
}
?>
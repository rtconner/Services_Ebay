<?PHP
/**
 * Get the notification preferences
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetNotificationPreferences/GetNotificationPreferencesLogic.htm
 */
class GetNotificationPreferences extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetNotificationPreferences';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'PreferenceLevel'
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
        switch($this->args['PreferenceLevel']) {
            case 'Application':
                return $return['ApplicationDeliveryPreferences'];
                break;
            case 'User':
                return $return['UserDeliveryPreferenceArray'];
                break;
            case 'UserData':
                return $return['UserData'];
                break;
            case 'Event':
                return $return['EventProperty'];
                break;
            default:
                return $return;
        }
    }
}
?>

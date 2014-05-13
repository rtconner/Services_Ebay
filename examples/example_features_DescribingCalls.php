<?PHP
/**
 * example that shows how a call object is 
 * able to show its list of parameters
 *
 * $Id$
 *
 * @package     Services_Ebay
 * @subpackage  Examples
 * @author      Stephan Schmidt
 */
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'config.php';

$session = \Services\Ebay::getSession($devId, $appId, $certId);
$session->setToken($token);

$call = \Services\Ebay::loadAPICall('AddDispute');
echo '<pre>';
$call->describeCall();
echo '</pre>';

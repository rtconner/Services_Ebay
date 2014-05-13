<?PHP
/**
 * example that shows how to load an API call
 * and use it without the wrapper.
 *
 * $Id$
 *
 * @package     Services_Ebay
 * @subpackage  Examples
 * @author      Stephan Schmidt
 */
error_reporting(E_ALL);
require_once '../Ebay.php';
require_once 'config.php';

$session = \Services\Ebay::getSession($devId, $appId, $certId);
$session->setToken($token);

$call = \Services\Ebay::loadAPICall('GetEbayOfficialTime');
$result = $call->call($session);

echo $result;
?>
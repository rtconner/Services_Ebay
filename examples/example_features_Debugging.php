<?PHP
/**
 * Example that shows how the debugging features can be used.
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

$ebay = new \Services\Ebay($session);

// Wire will be stored
$session->setDebug(\Services\Ebay\Session::DEBUG_STORE);

echo "GetLogoURL('Small');<br />";
$logo = $ebay->GetLogoURL('Small');
echo sprintf('<img src="%s" width="%d" height="%d" title="This has been fetched from eBay" />', $logo['URL'], $logo['Width'], $logo['Height'] );
echo "<br /><br />";
echo "getWire()<br />";

echo "<pre>";
echo htmlspecialchars($session->getWire());
echo "</pre>";

// all XML data will be sent to STDOUT
$session->setDebug(\Services\Ebay\Session::DEBUG_PRINT);
echo "GetLogoURL('Small');<br />";
$logo = $ebay->GetLogoURL('Small');
echo sprintf('<img src="%s" width="%d" height="%d" title="This has been fetched from eBay" />', $logo['URL'], $logo['Width'], $logo['Height'] );
echo "<br /><br />";

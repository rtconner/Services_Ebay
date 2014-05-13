<?PHP
/**
 * example that fetches domains
 *
 * This is supposed to produce an exception
 * as your application probably is not allowed to make
 * this call.
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

$domains = $ebay->GetDomains();
echo '<pre>';
print_r($domains);
echo '</pre>';

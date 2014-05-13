<?PHP
/**
 * Example that lists all API calls the are supported by Services_Ebay
 *
 * $Id$
 *
 * @package     Services_Ebay
 * @subpackage  Examples
 * @author      Stephan Schmidt <schst@php.net>
 */
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'config.php';

$session = \Services\Ebay::getSession($devId, $appId, $certId);
$session->setToken($token);

$ebay  = new \Services\Ebay($session);
$calls = $ebay->getAvailableApiCalls();

echo '<pre>';
print_r($calls);
echo '</pre>';

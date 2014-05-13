<?PHP
/**
 * example that fetches categories
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

$cats = $ebay->GetCategories(57882);
echo '<pre>';
print_r($cats);
echo '</pre>';

/**
 * change the overall Detail-Level
 */
$session->setDetailLevel('ReturnAll');

$cats = $ebay->GetCategories(12576);
echo '<pre>';
print_r($cats);
echo '</pre>';


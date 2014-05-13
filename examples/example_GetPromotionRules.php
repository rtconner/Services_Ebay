<?PHP
/**
 * example that fetches an item
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

$rules = $ebay->GetPromotionRules('UpSell', 110002463992);

echo '<pre>';
print_r($rules);
echo '</pre>';
?>

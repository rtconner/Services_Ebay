<?PHP
/**
 * example that fetches shipping rates
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


$prefs = $ebay->GetPreferences(array('CrossPromotion'));

echo '<pre>';
print_r($prefs->toArray());
echo '</pre>';

$prefs = $ebay->GetPreferences('CrossPromotion');

echo '<pre>';
print_r($prefs->toArray());
echo '</pre>';

<?PHP
/**
 * example that searches for items
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

$account = $ebay->GetAccount(\Services\Ebay::ACCOUNT_TYPE_PERIOD, '2006-02-01', '2006-02-02');

echo '<pre>';
print_r($account->toArray());
echo '</pre>';

foreach ($account as $entry) {
	echo '<pre>';
	print_r($entry);
	echo '</pre>';
}

<?PHP
/**
 * example that fetches all transactions for an item
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

$status = $ebay->ReviseCheckoutStatus('4501333179', '0', 1, 1);

if ($status === true) {
	echo 'Checkout was updated';
} else {
	echo 'An error occured';
}
?>
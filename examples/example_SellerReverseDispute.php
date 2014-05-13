<?PHP
/**
 * example that adds a response to a dispute
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

$result = $ebay->SellerReverseDispute('997', \Services\Ebay::DISPUTE_REVERSE_OTHER);

if ($result === true) {
	echo 'Dispute has been reversed.';
} else {
    echo 'An error occured';
}

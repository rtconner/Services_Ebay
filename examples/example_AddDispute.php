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

$disputeId = $dispute = $ebay->AddDispute('110001152130', '0', 'BuyerHasNotPaid', 'BuyerHasNotResponded');

echo 'DistputeId: '.$disputeId;

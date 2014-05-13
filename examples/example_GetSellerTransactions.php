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

$transactions = $ebay->GetSellerTransactions('2004-08-24 00:00:00', '2004-08-30 00:00:00');

if ($transactions) {
    echo 'Transactions overview:<br />';
    echo '<pre>';
    print_r($transactions->toArray());
    echo '</pre>';

    echo '<br />Iterate all transactions:<br />';

    foreach ($transactions as $transaction) {
        echo '<pre>';
        print_r($transaction->toArray());
        echo '</pre>';
    }
}

$session->setDetailLevel(\Services\Ebay::RESPONSE_VERBOSE);

$transactions = $ebay->GetSellerTransactions('2004-08-24 00:00:00', '2004-08-30 00:00:00');
if ($transactions) {
    echo '<b>Use new detail level</b><br />';
    echo 'Transactions overview:<br />';
    echo '<pre>';
    print_r($transactions->toArray());
    echo '</pre>';

    echo '<br />Iterate all transactions:<br />';

    foreach ($transactions as $transaction) {
        echo '<pre>';
        print_r($transaction->toArray());
        echo '</pre>';
    }   
}
?>

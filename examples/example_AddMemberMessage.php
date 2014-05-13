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

$result = $ebay->AddMemberMessage('superman-74', 3, 1, 'Just testing', 'This is only a test');

if ($result === true) {
    echo 'Messsage has been sent.<br />';
} else {
    echo 'An error occured while sending the message.';
}

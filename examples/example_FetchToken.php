<?PHP
/**
 * example that fetches a token
 *
 * $Id$
 *
 * @package     Services_Ebay
 * @subpackage  Examples
 * @author      Stephan Schmidt
 */
error_reporting(E_ALL);
require_once '../Ebay.php';
require_once 'config.php';

$session = \Services\Ebay::getSession($devId, $appId, $certId);

$session->setAuthenticationData($username, $password);

$ebay = new Services_Ebay($session);
$token = $ebay->FetchToken('MySecretId');
echo '<pre>';
print_r($token);
echo '</pre>';
?>

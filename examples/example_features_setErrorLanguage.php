<?PHP
/**
 * example that fetches the URL of the eBay logo
 * in three sizes.
 *
 * This call returns an array with the URL, width and height
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

// get errors in German
$session->setErrorLanguage(\Services\Ebay::SITEID_DE);

try {
    $logo = $ebay->GetLogoURL('Foo');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
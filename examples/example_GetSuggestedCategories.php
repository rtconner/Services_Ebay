<?PHP
/**
 * example that adds information to the item description
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

$result = $ebay->GetSuggestedCategories( 'ebay' );
echo	"<pre>";
print_r($result);
echo	"</pre>";

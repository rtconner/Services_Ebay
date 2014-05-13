<?PHP
/**
 * example that shows how to load an API call
 * and use it without the wrapper.
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

$item = \Services\Ebay::loadModel('Item', '4501296414', $session);

echo	"<pre>";
print_r($item->toArray());
echo	"</pre>";

$item->Get();

echo	"<pre>";
print_r($item->toArray());
echo	"</pre>";

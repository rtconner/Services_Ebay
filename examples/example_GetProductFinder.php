<?PHP
/**
 * example that fetches product finder XSL
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

// load the product finder XSL
$xsl = file_get_contents('product_finder.xsl');

// get product finder
$productFinders = $ebay->GetProductFinder(1909);
foreach ($productFinders as $productFinder) {
    echo $productFinder->render($xsl);
    // only render one...
    break;
}

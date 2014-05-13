<?PHP
/**
 * example that fetches a user object
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

$session->setToken($token);

$ebay = new Services_Ebay($session);

/**
 * get the user information
 */
$list = $ebay->GetSellerList(array('UserID'=>'superman-74', 'DetailLevel' => 'ReturnAll', 'Pagination' => array('EntriesPerPage' => 140, 'PageNumber' => 1), 'StartTimeFrom' => '2003-11-01 00:00:00', 'StartTimeTo' => '2004-12-01 00:00:00'));

$items = array();
foreach ($list as $item) {
	echo '<pre>';
	print_r($item->toArray());
	echo '</pre>';
}
?>

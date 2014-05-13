<?PHP
/**
 * example that shows how to use various models
 *
 * $Id$
 *
 * @package     Services_Ebay
 * @subpackage  Examples
 * @author      Stephan Schmidt
 */

require_once '../vendor/autoload.php';
require_once 'config.php';

$session = \Services\Ebay::getSession($devId, $appId, $certId);

$session->setToken($token);

$ebay = new \Services\Ebay($session);

/**
 * get the user information
 */
$user = $ebay->GetUser('agebook');

/**
 * access single properties
 */
echo $user->UserId."<br>";

/**
 * get all properties
 */
echo '<pre>';
print_r($user->toArray());
echo '</pre>';

/**
 * get feedback summary
 */
$summary = $user->getFeedback( \Services\Ebay::FEEDBACK_BRIEF );
echo "This user's score is ".$summary->Score."<br />";

echo '<pre>';
print_r($summary->toArray());
echo '</pre>';

/**
 * get verbose feedback
 */
$verbose = $user->getFeedback( \Services\Ebay::FEEDBACK_VERBOSE, 1, 10 );
foreach ($verbose as $feedback) {
    echo 'Feedback for '.$feedback->ItemNumber.'<br />';
	echo $feedback;
	echo "<br />";
	

}

/**
 * get items the user is/has been selling
 */
echo 'Retrieving seller list<br />';
$sellerList = $user->GetSellerList();
echo	"<pre>";
print_r($sellerList);
echo	"</pre>";

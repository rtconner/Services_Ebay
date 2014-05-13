<?php namespace Services\Tests;

use Mockery as m;
use \PHPUnit_Framework_TestCase;

class EbayTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {

		include_once(__DIR__.'/../examples/config.php');
		
		list($this->devId, $this->appId, $this->certId) = array($devId, $appId, $certId);
	}
	
	function test_GeteBayOfficialTime() {

		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		
		$session->setToken($token);
		
		$ebay = new \Services\Ebay($session);
		
		echo $ebay->GeteBayOfficialTime();
		
	}
	
}
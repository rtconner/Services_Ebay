<?php namespace Services\Tests;

use Mockery as m;
use \PHPUnit_Framework_TestCase;

class EbayTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {

		include_once(__DIR__.'/../examples/config.php');
		
		list($this->devId, $this->appId, $this->certId, $this->token) = array($devId, $appId, $certId, $token);
	}
	
	function test_GeteBayOfficialTime() {

		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		
		$session->setToken($this->token);
		
		$ebay = new \Services\Ebay($session);
		
		$this->assertInternalType('string', $ebay->GeteBayOfficialTime());
		
	}
	
}
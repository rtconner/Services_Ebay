<?php namespace Services\Tests;

use Mockery as m;
use \PHPUnit_Framework_TestCase;

class PaypalTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
	}
	
	/**
	 * Super simple test as example to write further tests
	 */
	public function testInstance() {
		$session = new \Services\Ebay\Session($devId=1, $appId=2, $certId=3);
		$ebay = new \Services\Ebay($session);
		
		$this->assertInstanceOf('\Services\Ebay\Session', $session);
		$this->assertInstanceOf('\Services\Ebay', $ebay);
	}
	
}
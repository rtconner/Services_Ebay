<?php namespace Services\Tests;

use Mockery as m;
use \PHPUnit_Framework_TestCase;

class EbayTest extends PHPUnit_Framework_TestCase {
	
	private $devId = null;
	private $appId = null;
	private $certId = null;
	private $token = null;
	
	public function setUp() {
		error_reporting(E_ALL);
		include(__DIR__.'/../examples/config.php');

		list($this->devId, $this->appId, $this->certId, $this->token) = array($devId, $appId, $certId, $token);
	}
	
// 	function test_GeteBayOfficialTime() {
// 		$ebay = $this->ebay();
		
// 		$this->assertInternalType('string', $ebay->GeteBayOfficialTime());
// 	}

	function test_AddItem() {
		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		$session->setToken($this->token);
		
		$ebay = new \Services\Ebay($session);
		
		$item = \Services\Ebay::loadModel('Item', null, $session);
		
		
		$item->Category = 57882;
		$item->Title = 'Supergirls\'s cape';
		$item->Description = 'Another test item';
		$item->Location = 'At my home';
		$item->MinimumBid = '532.0';
		$item->ListingDuration = 'Days_3';
		
		$item->VisaMaster = 1;
		
		$item->ShippingType = 1;
		$item->CheckoutDetailsSpecified = 1;
		$item->Currency = 'USD';
		
		$item->Country = 'US';
		
		$item->SetShipToLocations(array('US', 'DE', 'GB'));
		
		$item->addShippingServiceOption(1, 1, 3, 1, array('US'));
		
		$result = $ebay->AddItem($item);
		
		// You could as well call the Add() method on the item directly
		//$result = $item->Add();
		
		
		if ($result === true) {
			echo 'Item has been added with ItemId: '.$item->Id.' and ends on '.$item->EndTime.'<br />';
		} else {
			echo 'An error occured while adding the item.';
		}
		
	}
	
	private function ebay() {
		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		$session->setToken($this->token);
		
		$ebay = new \Services\Ebay($session);
		return $ebay;
	}
	
}
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

	function xtest_AddItem() {
		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		$session->setToken($this->token);
		
		$ebay = new \Services\Ebay($session);
		
		$item = \Services\Ebay::loadModel('Item', null, $session);
		
		$item->Category = 57882;
		$item->PrimaryCategory = array('CategoryID'=>57882);
		$item->ConditionID = 1000;
		
		$item->Title = 'Supergirls\'s cape';
		$item->Description = 'Another test item';
		$item->Location = 'At my home';
		$item->StartPrice = '10';
		$item->PaymentMethods = 'PayPal';
		$item->PayPalEmailAddress = 'magicalbookseller@yahoo.com';
		$item->Quantity = 1;
		$item->MinimumBid = '532.0';
		$item->ListingDuration = 'Days_7';
		$item->DispatchTimeMax = 3;
		
		$item->Currency = 'USD';
		
		$item->Country = 'US';
		$item->Site = 'US';
		
		$item->ReturnPolicy = array(
			'ReturnsAcceptedOption'=>'ReturnsAccepted',
			'RefundOption'=>'MoneyBack',
			'ReturnsWithinOption'=>'Days_30',
			'Description'=>'If you are not satisfied, return the book for refund.',
			'ShippingCostPaidByOption'=>'Buyer',
		);
		
		$item->SetShipToLocations(array('US'));
		$item->SetShipToLocations(array('CA'));
		
		$item->ShippingDetails = array(
			'ShippingType'=>'Flat',
			'ShippingServiceOptions'=>array(
				array(
					'ShippingServicePriority'=>1,
					'ShippingService'=>'UPSGround',
					'FreeShipping'=>'true',
					'ShippingServiceAdditionalCost'=>0.00,
				)
			)
			
		);
		
		$result = $ebay->AddItem($item);
		
		// You could as well call the Add() method on the item directly
		//$result = $item->Add();
		
		$this->assertNotEmpty($result['ItemID']);
		
// 		if ($result) {
// 			echo 'Item has been added with ItemId: '.$result['ItemID'].' and ends on '.$result['EndTime'];
// 		} else {
// 			echo 'An error occured while adding the item.';
// 		}
		
	}
	
	function test_AddFixedPriceItem() {
		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		$session->setToken($this->token);
	
		$ebay = new \Services\Ebay($session);
	
		$item = \Services\Ebay::loadModel('Item', null, $session);
		
		$item->PrimaryCategory = array('CategoryID'=>57882);
		$item->ConditionID = 1000;
		
		$item->Title = 'Supergirls\'s cape';
		$item->Description = 'Another test item';
		$item->Location = 'At my home';
		$item->StartPrice = '10';
		$item->PaymentMethods = 'PayPal';
		$item->PayPalEmailAddress = 'magicalbookseller@yahoo.com';
		$item->Quantity = 1;
		$item->ListingDuration = 'Days_7';
		$item->ListingType = 'FixedPriceItem';
		$item->DispatchTimeMax = 3;
		
		$item->Currency = 'USD';
		$item->Country = 'US';
		$item->Site = 'US';
		
		$item->PictureDetails = array(
			'PictureURL'=>array(
				'http://i12.ebayimg.com/03/i/04/8a/5f/a1_1_sbl.JPG',
				'http://i22.ebayimg.com/01/i/04/8e/53/69_1_sbl.JPG',
				'http://i4.ebayimg.ebay.com/01/i/000/77/3c/d88f_1_sbl.JPG',
			)
		);
		
		$item->ReturnPolicy = array(
			'ReturnsAcceptedOption'=>'ReturnsAccepted',
			'RefundOption'=>'MoneyBack',
			'ReturnsWithinOption'=>'Days_30',
			'Description'=>'If you are not satisfied, return the book for refund.',
			'ShippingCostPaidByOption'=>'Buyer',
		);
		
		$item->ShippingDetails = array(
			'ShippingType'=>'Flat',
			'ShippingServiceOptions'=>array(
				array(
					'ShippingServicePriority'=>1,
					'ShippingService'=>'UPSGround',
					'FreeShipping'=>'true',
					'ShippingServiceAdditionalCost'=>0.00,
				)
			)
				
		);
		
		$result = $ebay->AddFixedPriceItem($item);
		print_r($result);
		$this->assertNotEmpty($result['ItemID']);
		
	}
	
	private function ebay() {
		$session = \Services\Ebay::getSession($this->devId, $this->appId, $this->certId);
		$session->setToken($this->token);
		
		$ebay = new \Services\Ebay($session);
		return $ebay;
	}
	
}
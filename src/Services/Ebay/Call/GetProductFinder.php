<?php namespace Services\Ebay\Call;

/**
 * Get XSL stylesheet to transform product finder
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetProductFinder/GetProductFinderLogic.htm
 */
class GetProductFinder extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetProductFinder';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'ProductFinderID',
                                 'AttributeSystemVersion'
                                );

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'DetailLevel' => 'ReturnAll'
                        );

   /**
    * options that will be passed to the serializer
    *
    * @var  array
    */
    protected $serializerOptions = array(
                                            'mode' => 'simplexml'
                                        );

   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session, $parseResult = true)
    {
        $xml = parent::call($session, false);
        $dom = DOMDocument::loadXML($xml);

        $result = array();
        $productFinders = $dom->getElementsByTagName('ProductFinder');
        foreach ($productFinders as $node) {
        	$result[] = \Services\Ebay::loadModel('ProductFinder', $node, $session);
        }
        
        return $result;
    }
}
?>

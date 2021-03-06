<?php namespace Services\Ebay\Call;

/**
 * AddFixedPriceItem to Ebay
 *
 * @package Services_Ebay
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/AddItem/AddItemLogic.htm
 */
class AddFixedPriceItem extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'AddFixedPriceItem';

   /**
    * compatibility level this method was introduced
    *
    * @var integer
    */
    protected $since = 465;

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array();

   /**
    * options that will be passed to the serializer
    *
    * @var  array
    */
    protected $serializerOptions = array(
                                            'mode' => 'simplexml'
                                        );
   /**
    * default parameters that will be used when
    * adding an item
    *
    * @var  array
    */
    protected $args = array(
                            'Item' => array(
                                            'ShippingDetails'   => array(
                                                                            'InsuranceFee' => 0
                                                                        ),
                                            'Country'           => 'US',
                                            'Currency'          => 'USD',
                                            'StartPrice'        => '1.0',
                                            'Quantity'          => '1'
                                           ),
                           );

   /**
    * item that should be added
    *
    * @var  object \Services\Ebay\Model\Item
    */
    protected $item;

   /**
    * constructor
    *
    * @param    array
    */
    public function __construct($args)
    {
        $item = $args[0];
        
        if (!$item instanceof \Services\Ebay\Model\Item) {
            throw new \Services\Ebay\Exception( 'No item passed.' );
        }
        
        $this->setItem($item);
    }

   /**
    * set the item that should be added
    *
    * @param    \Services\Ebay\Model\Item
    * @return   boolean
    */
    public function setItem(\Services\Ebay\Model\Item $item)
    {
        $this->item = $item;
        $this->args = array_merge( $this->args, $item->toArray() );
        
        return true;
    }
    
   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session, $parseResult = true)
    {
        $return = parent::call($session);
        
        if (isset($return['ItemID'])) {
            return $return;
        }
        return false;
    }
}

<?php namespace Services\Ebay\Model;

/**
 * Model for a item list
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 */
class ItemList extends \Services\Ebay\Model implements IteratorAggregate
{
   /**
    * items of the list
    *
    * @var  array
    */
    private $items = array();

   /**
    * create a new item list
    *
    * @param    array   properties
    * @param    object \Services\Ebay\Session
    */
    public function __construct($props, $session = null)
    {
        if (isset($props['ItemArray'])) {
            if ( is_array($props['ItemArray'])) {
                if (!isset($props['ItemArray']['Item'][0])) {
                    $props['ItemArray']['Item'] = array($props['ItemArray']['Item']);
                }
                foreach ($props['ItemArray']['Item'] as $item) {
                    array_push( $this->items, \Services\Ebay::loadModel('Item', $item, $session) );
                }
            }
            unset($props['ItemArray']);
        }
    
        parent::__construct($props, $session);
    }

   /**
    * get the iterator for the items in the list
    *
    * @return   object
    */
    public function getIterator()
    {
        $iterator = new ArrayObject($this->items);
        return $iterator;
    }
}
?>

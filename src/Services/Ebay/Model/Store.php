<?php namespace Services\Ebay\Model;

/**
 * Model for an eBay store
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 */
class Store extends \Services\Ebay\Model implements IteratorAggregate
{
   /**
    * available item lists
    *
    * @var  array
    */
    private $categories = array();

   /**
    * create a new item list
    *
    * @param    array   properties
    * @param    object \Services\Ebay\Session
    */
    public function __construct($props, $session = null)
    {
        if (isset($props['CustomCategories']) && isset($props['CustomCategories']['Category'])) {
        	if (isset($props['CustomCategories']['Category'][0])) {
        	    $this->categories = $props['CustomCategories']['Category'];
        	} else {
        	    $this->categories = array($props['CustomCategories']['Category']);
        	}
        	unset($props['CustomCategories']);
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
        $iterator = new ArrayObject($this->categories);
        return $iterator;
    }
}
?>
<?php namespace Services\Ebay\Model;

/**
 * Model for a list of eBay disputes
 *
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 */
class DisputeList extends \Services\Ebay\Model implements IteratorAggregate
{
   /**
    * container for disputes
    *
    * @var  array
    */
    private $disputes = array();
    
   /**
    * create a new list of disputes
    *
    * @param    array   return value from GetUserDisputes
    * @param    \Services\Ebay\Session
    */
    public function __construct($props, \Services\Ebay\Session $session = null)
    {
        if (isset($props['DisputeArray'])) {
            $disputes = $props['DisputeArray'];
            unset($props['DisputeArray']);
            if (isset($disputes['Dispute'][0])) {
                $this->disputes = $disputes['Dispute'];
            } else {
                $this->disputes = array($disputes['Dispute']);
            }
        }
        parent::__construct($props, $session);
    }
    
   /**
    * iterate through the disputes
    *
    * @return   object
    */
    public function getIterator()
    {
        $it = new ArrayObject($this->disputes);
        return $it;
    }
}
?>

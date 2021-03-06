<?php namespace Services\Ebay\Model;

/**
 * Model for a eBay feedback
 *
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 */
class Feedback extends \Services\Ebay\Model implements IteratorAggregate
{
   /**
    * property that stores the unique identifier (=pk) of the model
    *
    * @var string
    */
    protected $primaryKey = 'FeedbackId';

   /**
    * feedback items
    *
    * @var  array
    */
    private $items = array();
    
   /**
    * create new feedback model
    *
    * @param    array   feedback
    */
    public function __construct($feedback, $session = null)
    {
        if (isset($feedback['FeedbackDetailArray'])) {
            foreach ($feedback['FeedbackDetailArray'] as $tmp) {
                array_push($this->items, \Services\Ebay::loadModel('FeedbackEntry', $tmp, $session));
            }
        	unset($feedback['FeedbackDetailArray']);
        }
        parent::__construct($feedback);
    }
    
   /**
    * get one entry of the feedback list
    *
    * @param    int
    * @return   object \Services\Ebay\Model\FeedbackEntry
    */
    public function getEntry($pos)
    {
        if (isset($this->items[$pos])) {
            return $this->items[$pos];	
        }
        return false;
    }

   /**
    * iterate through the feedback items
    *
    * @return array
    */
    public function getIterator()
    {
        return new ArrayObject($this->items);
    }
}
?>

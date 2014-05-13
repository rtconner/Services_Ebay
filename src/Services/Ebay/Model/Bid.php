<?php namespace Services\Ebay\Model;

/**
 * Model for a single bid
 *
 * @package Services_Ebay
 * @author  Carsten Lucke <luckec@php.net>
 */
class Bid extends \Services\Ebay\Model
{
    /**
     * The bidder.
     * 
     * @var \Services\Ebay\Model\User the bidding user
     */
    private $user;
    
    /**
     * Constructor
     *
     * @param array     $props  properties
     * @param \Services\Ebay\Session $session    session
     * @param integer   $DetailLevel    detail-level
     */
    public function __construct($props, $session = null, $DetailLevel = 0) {
        parent::__construct($props, $session, $DetailLevel);
        
        $this->user = \Services\Ebay::loadModel('User', $props['User'], $session);
        unset($this->properties['User']);
    }
    
    /**
     * Returns the user model with abbreviated user-information.
     * 
     * To fetch all information use the model's Get() method.
     * 
     * <code>
     *  $user = $bid->getBidder();
     *  
     *  // fetch the user's details from eBay
     *  $user->Get($itemId);
     * </code>
     * 
     * @return  \Services\Ebay\Model\User    the user
     */
    public function getBidder() {
        return $this->user;
    }
}
?>
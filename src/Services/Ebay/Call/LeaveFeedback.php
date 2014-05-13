<?php namespace Services\Ebay\Call;

/**
 * Leave feedback for a user
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/LeaveFeedback/LeaveFeedbackLogic.htm
 */
class LeaveFeedback extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'LeaveFeedback';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'TargetUser',
                                 'ItemId',
                                 'CommentType',
                                 'Comment',
                                 'TransactionId'
                                );
    
   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string  feedback ID
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = parent::call($session);
        if ($return['LeaveFeedback']['Status'] === 'Success') {
            return $return['LeaveFeedback']['FeedbackId'];
        }
        return false;
    }
}
?>
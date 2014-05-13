<?php namespace Services\Ebay\Call;

/**
 * Get feedback for a user
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetFeedback/GetFeedbackLogic.htm
 */
class GetFeedback extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetFeedback';

   /**
    * arguments of the call
    *
    * @var  array
    */
    protected $args = array(
                            'DetailLevel'   => \Services\Ebay::FEEDBACK_VERBOSE,
                            'Pagination'    => array(
                                                        'PageNumber' => 1,
                                                        'EntriesPerPage' => 25
                                                    ) 
                        );

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'UserID',
                                 'DetailLevel'
                                );
    
    
   /**
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session, $parseResult = true)
    {
        $return = parent::call($session);
        $feedback = \Services\Ebay::loadModel('Feedback', $return, $session);
        return $feedback;
    }
}
?>

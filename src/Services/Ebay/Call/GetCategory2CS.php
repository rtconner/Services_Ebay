<?php namespace Services\Ebay\Call;

/**
 * Get category 2 cs
 *
 * $Id$
 *
 * @package Services_Ebay
 * @author  Stephan Schmidt <schst@php.net>
 * @link    http://developer.ebay.com/DevZone/docs/API_Doc/Functions/GetCategory2CS/GetCategory2CSLogic.htm
 *
 * @todo    finish this API call
 * @todo    build a model for this
 */
class GetCategory2CS extends \Services\Ebay\Call 
{
   /**
    * verb of the API call
    *
    * @var  string
    */
    protected $verb = 'GetCategory2CS';

   /**
    * parameter map that is used, when scalar parameters are passed
    *
    * @var  array
    */
    protected $paramMap = array(
                                 'CategoryID',
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
    * make the API call
    *
    * @param    object \Services\Ebay\Session
    * @return   string
    */
    public function call(\Services\Ebay\Session $session)
    {
        $return = parent::call($session);
        return $return['MappedCategoryArray'];
    }
}
?>

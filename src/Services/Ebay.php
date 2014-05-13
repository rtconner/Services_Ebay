<?php namespace Services;

/**
 * Services/Ebay.php
 *
 * package to access the eBay API
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 * @author   Robert Conner <rtconner@gmail.com>
 */

define('SERVICES_EBAY_BASEDIR', dirname(__FILE__));

/**
 * Services/Ebay.php
 *
 * package to access the eBay API
 *
 * @package  Services_Ebay
 * @author   Stephan Schmidt <schst@php.net>
 * @link     http://developer.ebay.com/DevProgram/developer/api.asp
 */
class Ebay {
	
   /**
    * no authentication, this is only needed when using FetchToken
    */
    const AUTH_TYPE_NONE = 0;

    /**
    * token based authentication
    */
    const AUTH_TYPE_TOKEN = 1;
    
   /**
    * authentication based on user id and password
    */
    const AUTH_TYPE_USER  = 2;

   /**
    * GetUserDisputes():
    * All disputes that involve me as buyer or seller.
    */
    const USER_DISPUTES_ALL = 'AllInvolvedDisputes';

   /**
    * GetUserDisputes():
    * All disputes that involve me as buyer or seller and are awaiting my response.
    */
    const USER_DISPUTES_MY_RESPONSE = 'DisputesAwaitingMyResponse';

   /**
    * GetUserDisputes():
    * All disputes that involve me as buyer or seller and are awaiting the other party's response.
    */
    const USER_DISPUTES_OTHER_RESPONSE = 'DisputesAwaitingOtherPartyResponse';

   /**
    * GetUserDisputes():
    * All disputes that involve me as buyer or seller and are closed.
    */
    const USER_DISPUTES_CLOSED = 'AllInvolvedClosedDisputes';

   /**
    * GetUserDisputes():
    * All disputes that involve me as buyer or seller and are eligible for a Final Value Fee credit, whether or not the credit has been granted.
    */
    const USER_DISPUTES_CREDIT_ELIGIBLE = 'EligibleForCredit';

   /**
    * GetUserDisputes():
    * All Unpaid item disputes.
    */
    const USER_DISPUTES_UNPAIDS = 'UnpaidItemDisputes';

   /**
    * GetUserDisputes():
    * All Item Not Received disputes.
    */
    const USER_DISPUTES_NODISPUTES = 'ItemNotReceivedDisputes';

   /**
    * GetUserDisputes():
    * Sort by the time the dispute was created, in ascending order.
    */
    const USER_DISPUTES_SORT_TIME_ASC = 'DisputeCreatedTimeAscending';

   /**
    * GetUserDisputes():
    * Sort by the time the dispute was created, in descending order.
    */
    const USER_DISPITES_SORT_TIME_DSC = 'DisputeCreatedTimeDescending';

   /**
    * GetUserDisputes():
    * Sort by the dispute status, in ascending order.
    */
    const USER_DISPUTES_SORT_STATUS_ASC = 'DisputeStatusAscending';

   /**
    * GetUserDisputes():
    * Sort by the dispute status, in descending order.
    */
    const USER_DISPUTES_SORT_STATUS_DSC = 'DisputeStatusDescending';

   /**
    * GetUserDisputes():
    * Sort by whether the dispute is eligible for Final Value Fee credit, in ascending order. Ineligible disputes are listed before eligible disputes.
    */
    const USER_DISPUTES_SORT_ELIGIBILITY_ASC = 'DisputeCreditEligibilityAscending';

   /**
    * GetUserDisputes():
    * Sort by whether the dispute is eleigible for Final Value Fee credit, in descending order. Eligible disputes are listed before i(ineligible disputes.
    */
    const USER_DISPUTES_SORT_ELIGIBILITY_DSC = 'DisputeCreditEligibilityDescending';

   /**
    * return only feedback summary
    */
    const RESPONSE_BRIEF   = 'ReturnSummary';

   /**
    * return verbose feedback
    */
    const RESPONSE_VERBOSE = 'ReturnAll';

   /**
    * Returns Description, plus the ListingDesigner node and some additional information if applicable
    */
    const RESPONSE_DESCRIPTION = 'ItemReturnDescription';

   /**
    * Returns Item Specifics and Pre-filled Item Information, if applicable
    */
    const RESPONSE_ATTRIBUTES = 'ItemReturnCategories';

   /**
    * Returns message headers
    */
    const RESPONSE_HEADERS = 'ReturnHeaders';

   /**
    * Returns full message information
    */
    const REPONSE_MESSAGES = 'ReturnMessages';

   /**
    * GetAccount():
    */
    const ACCOUNT_TYPE_PERIOD = 'LastInvoice';

   /**
    * GetAccount():
    */
    const ACCOUNT_TYPE_INVOICE = 'SpecifiedInvoice';

   /*
    * GetAccount():
    */
    const ACCOUNT_TYPE_SPECIFIED_DATES = 'BetweenSpecifiedDates';

   /**
    * SiteId USA
    */
    const SITEID_US = 0;

   /**
    * SiteId Canada
    */
    const SITEID_CA = 2;

   /**
    * SiteId United Kingdom
    */
    const SITEID_UK = 3;

   /**
    * SiteId Australia
    */
    const SITEID_AU = 15;

   /**
    * SiteId Austria
    */
    const SITEID_AT = 16;

   /**
    * SiteId Belgium (french)
    */
    const SITEID_BEFR = 23;

   /**
    * SiteId France
    */
    const SITEID_FR = 71;

   /**
    * SiteId Germany
    */
    const SITEID_DE = 77;

   /**
    * SiteId eBay Motors
    */
    const SITEID_MOTORS = 100;

   /**
    * SiteId Italy
    */
    const SITEID_IT = 101;

   /**
    * SiteId Belgium (netherlands)
    */
    const SITEID_BENL = 123;

   /**
    * SiteId Netherlands
    */
    const SITEID_NL = 146;

   /**
    * SiteId Spain
    */
    const SITEID_ES = 186;

   /**
    * SiteId Swiss
    */
    const SITEID_CH = 193;

   /**
    * SiteId Taiwan
    */
    const SITEID_TW = 196;

   /**
    * SiteId China
    */
    const SITEID_CN = 223;
    
   /**
    * session used for the calls
    *
    * @var  object \Services\Ebay\Session
    */
    private $session = null;

   /**
    * class maps for the model classes
    *
    * @var  array
    */
    static private $modelClasses = array();

   /**
    * create Services Ebay helper class
    *
    * @param    object \Services\Ebay\Session
    */
    public function __construct(\Services\Ebay\Session $session)
    {
        $this->session = $session;
    }
    
   /**
    * Factory method to create a new session
    *
    * @param    string      developer id
    * @param    string      application id
    * @param    string      certificate id
    * @param    string      encoding that you want to use (UTF-8 or ISO-8859-1)
    *                       If you choose to use ISO-8859-1, Services_Ebay will automatically
    *                       encode and decode your data to and from UTF-8, as eBay only
    *                       allows UTF-8 encoded data
    * @return   object \Services\Ebay\Session
    */
    public static function getSession($devId, $appId, $certId, $encoding = 'ISO-8859-1')
    {
        $session = new \Services\Ebay\Session($devId, $appId, $certId, $encoding);

        return $session;
    }

   /**
    * change the class that is used for a certain model
    *
    * @param    string      model name
    * @param    string      class name
    */
    public static function useModelClass($model, $class)
    {
        self::$modelClasses[$model] = $class;
    }

   /**
    * make an API call
    *
    * @param    string  method to call
    * @param    array   arguments of the call
    */
    public function __call($method, $args)
    {
        try {
            $call = self::loadAPICall($method, $args);
        } catch (Exception $e) {
            throw $e;
        }

        return $call->call($this->session);
    }

   /**
    * set the detail level for all subsequent calls
    *
    * @param    integer
    */
    public function setDetailLevel($level)
    {
        return $this->session->setDetailLevel($level);
    }

   /**
    * load a method call
    *
    * @param    string  name of the method
    * @param    array   arguments
    */
    public static function loadAPICall($method, $args = null)
    {
        $method = ucfirst($method);

        $classname = '\Services\Ebay\Call\\'.$method;
        $call = new $classname($args);

        return $call;
    }

   /**
    * load a model
    *
    * @param    string  type of the model
    * @param    array   properties
    */
    public static function loadModel($type, $properties = null, $session = null)
    {
        if (isset(self::$modelClasses[$type])) {
        	$classname = self::$modelClasses[$type];
        } else {
            // use the default model class
            $classname = '\Services\Ebay\Model\\'.$type;
        }

        $model = new $classname($properties, $session);
        
        return $model;
    }

   /**
    * load a model
    *
    * @param    string  type of the model
    * @param    array   properties
    */
    public static function loadCache($type, $options)
    {
        $classname = '\Services\Ebay\Cache\\'.$type;
        $cache = new $classname($options);
        
        return $cache;
    }

   /**
    * get list of all available API calls
    *
    * This can be used to check, whether an API call already has
    * been implemented
    *
    * @return   array   list of all available calls
    */
    public function getAvailableApiCalls()
    {
        $calls = array();

        $it = new DirectoryIterator(SERVICES_EBAY_BASEDIR . '/Ebay/Call');
        foreach ($it as $file) {
        	if (!$file->isFile()) {
        		continue;
        	}
        	array_push($calls, substr($file->getFilename(), 0, -4));
        }
        return $calls;
    }
}

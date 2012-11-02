<?php
/**
 * @see Beausy_Service_Paypal_Abstract
 */
require_once 'Beausy/Service/Paypal/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Nvp extends Beausy_Service_Paypal_Abstract
{
  const CERTIFICATE_SANDBOX_URI = 'https://api.sandbox.paypal.com/nvp';
  const CERTIFICATE_LIVE_URI    = 'https://api.paypal.com/nvp';
  const SIGNATURE_SANDBOX_URI   = 'https://api-3t.sandbox.paypal.com/nvp';
  const SIGNATURE_LIVE_URI      = 'https://api-3t.paypal.com/nvp';

  /**
   * Last API operation performed
   *
   * @var string
   */
  protected $_lastRequest;

  /**
   * Sets the client object to use for retrieving data.
   *
   * @param   Zend_Http_Client  $client
   * @return  Beausy_Service_Paypal_Nvp
   */
  final public static function setClient($client)
  {
    if ($client instanceof Zend_Http_Client)
      self::$_client = $client;
    return $this;
  }

  /**
   * Gets the HTTP client object.
   *
   * @return Zend_Http_Client
   */
  final public static function getClient()
  {
    if (!self::$_client instanceof Zend_Http_Client)
      self::$_client = new Zend_Http_Client();
    return self::$_client;
  }

  /**
   * Constructor
   *
   * @param array|Zend_Config $config
   * @return void
   */
  public function __construct($config)
  {
    parent::__construct($config);
    $this->_prepareClient();
  }

  /**
   * Prepares client for interaction with Paypal
   *
   * @return void
   */
  protected function _prepareClient()
  {
    $client = $this->getClient();
    $client->setMethod(Zend_Http_Client::POST);

    $postParams = array(
      'USER'  => $this->_config['username'],
      'PWD'   => $this->_config['password']);

    // Set Paypal API version if specified
    $postParams['VERSION'] = isset($this->_config['version']) ? $this->_config['version'] : '64.0';

    /*
     * Setup HTTP client and adapter for each type of Paypal credentials
     */
    if (isset($this->_config['certificate']))
    {
      $uri = $this->_config['environment'] == 'live'
        ? self::CERTIFICATE_LIVE_URI
        : self::CERTIFICATE_SANDBOX_URI;

      // Set adapter SSL certificate to path of the Paypal API certificate
      $client->setConfig(array('sslcert' => $this->_config['certificate']));
    }
    elseif (isset($this->_config['signature']))
    {
      $uri = $this->_config['environment'] == 'live'
        ? self::SIGNATURE_LIVE_URI
        : self::SIGNATURE_SANDBOX_URI;

      $postParams['SIGNATURE'] = $this->_config['signature'];
    }

    /*
     * Optional email address of a Paypal account that has permissions
     * to make API calls on a different user's behalf
     */
    if (isset($this->_config['subject']))
      $postParams['SUBJECT'] = $this->_config['subject'];

    $client->setUri($uri);
    $client->resetParameters();
    $client->setParameterPost($postParams);
  }

  /**
   * Converts an array of Paypal fields to an array
   *
   * @param   array   $params   An array of Beausy_Service_Paypal_Data_Abstract objects
   * @return  array
   */
  protected function _fieldsetToArray($params)
  {
    $post_params = array();
    foreach ($params as $param)
    {
      if (is_array($param))
        $post_params = array_merge($post_params, $this->_fieldsetToArray($param));
      else
        $post_params = array_merge($post_params, $param->toArray());
    }
    return $post_params;
  }

  /**
   * Set the Paypal response object
   *
   * @param   Beausy_Service_Paypal_Response_Nvp $response
   * @return  Beausy_Service_Paypal_Abstract
   */
  public function setResponse($response)
  {
    $this->_response = $response;
    return $this;
  }

  /**
   * Confirms whether a postal address and postal code match those of the specified PayPal account holder
   *
   * @param   Beausy_Service_Paypal_Data_AddressVerify  $addressVerify
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function addressVerify(Beausy_Service_Paypal_Data_AddressVerify $addressVerify)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'AddressVerify';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'AddressVerify');

    // Build the NVP request
    $post = array_merge($post, $addressVerify->toArray());

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  /**
   * Bill the buyer for the outstanding balance associated with a recurring payments profile
   *
   * @param   Beausy_Service_Paypal_Data_BillOutstandingAmount   $billOutstandingAmount
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function billOutstandingAmount(Beausy_Service_Paypal_Data_BillOutstandingAmount $billOutstandingAmount)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'BillOutstandingAmount';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'BillOutstandingAmount');

    // Build the NVP request
    $post = array_merge($post, $billOutstandingAmount->toArray());

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  /**
   * Create a recurring payments profile
   *
   * @param   array   $fieldSets
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function createRecurringPaymentsProfile(array $fieldSets)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'CreateRecurringPaymentsProfile';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'CreateRecurringPaymentsProfile');

    // Build the NVP request
    $post = array_merge($post, $this->_fieldsetToArray($fieldSets));

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  /**
   * Void an order or an authorization
   *
   * @param   Beausy_Service_Paypal_Data_DoAuthorization   $do_auth
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function doAuthorization(Beausy_Service_Paypal_Data_DoAuthorization $do_auth)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'DoAuthorization';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'DoAuthorization');

    // Build the NVP request
    $post = array_merge($post, $do_auth->toArray());

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  public function doCapture()
  {
    die('Not implemented');
  }

  /**
   * Process a credit card payment
   *
   * @param   array   $fieldSets
   * @param   string  $ipAddress
   * @param   string  $paymentAction
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function doDirectPayment(array $fieldSets, $ipAddress, $paymentAction='Sale')
  {
    $this->_prepareClient();
    $this->_lastRequest = 'DoDirectPayment';

    // Required HTTP client POST parameters
    // TODO: Implement RETURNFMFDETAILS field
    $post = array(
      'METHOD'        => 'DoDirectPayment',
      'IPADDRESS'     => $ipAddress,
      'PAYMENTACTION' => $paymentAction,
    );

    // Build the NVP request
    $post = array_merge($post, $this->_fieldsetToArray($fieldSets));

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $client->setEncType();
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  /**
   * Completes an Express Checkout transaction
   *
   * TODO: Handle parallel payments
   *
   * @param   array   $fieldSets              An array of request fields
   * @param   string  $token                  Timestamped token value that was returned by SetExpressCheckout response
   * @param   string  $payerId                Unique PayPal customer account identification number as returned by GetExpressCheckoutDetails response
   * @param   string  $giftMessage            (optional) The gift message entered by the buyer on the PayPal Review page
   * @param   boolean $giftReceiptEnable      (optional) Pass true if a gift receipt was selected by the buyer on the PayPal Review page. Otherwise pass false
   * @param   string  $giftWrapName           (optional) The gift wrap name only if the gift option on the PayPal Review page was selected by the buyer
   * @param   string  $giftWrapAmount         (optional) The amount only if the gift option on the PayPal Review page was selected by the buyer
   * @param   string  $buyerMarketingEmail    (optional) The buyer email address opted in by the buyer on the PayPal Review page
   * @param   string  $surveyQuestion         (optional) The survey question on the PayPal Review page
   * @param   string  $surveryChoiceSelected  (optional) The survey response selected by the buyer on the PayPal Review page
   * @param   string  $buttonSource           (optional) An identification code for use by third-party applications to identify transactions
   *
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function doExpressCheckoutPayment(
    array $fieldSets,          $token,                  $payerId,
    $giftMessage=null,         $giftReceiptEnable=null, $giftWrapName=null,          $giftWrapAmount=null,
    $buyerMarketingEmail=null, $surveyQuestion=null,    $surveryChoiceSelected=null, $buttonSource=null
  )
  {
    $this->_prepareClient();
    $this->_lastRequest = 'DoExpressCheckoutPayment';

    // Required HTTP client POST parameters
    // TODO: Implement RETURNFMFDETAILS field
    $post = array(
      'METHOD'    => 'DoExpressCheckoutPayment',
      'TOKEN'     => $token,
      'PAYERID'   => $payerId,
      'IPADDRESS' => $_SERVER['SERVER_NAME'],
    );

    // Optional parameters
    if (null !== $giftMessage)           $post['GIFTMESSAGE']          = $giftMessage;
    if (null !== $giftReceiptEnable)     $post['GIFTRECEIPTENABLE']    = $giftReceiptEnable;
    if (null !== $giftWrapName)          $post['GIFTWRAPNAME']         = $giftWrapName;
    if (null !== $giftWrapAmount)        $post['GIFTWRAPAMOUNT']       = $giftWrapAmount;
    if (null !== $buyerMarketingEmail)   $post['BUYERMARKETINGEMAIL']  = $buyerMarketingEmail;
    if (null !== $surveyQuestion)        $post['SURVEYQUESTION']       = $surveyQuestion;
    if (null !== $surveryChoiceSelected) $post['SURVEYCHOICESELECTED'] = $surveryChoiceSelected;
    if (null !== $buttonSource)          $post['BUTTONSOURCE']         = $buttonSource;

    // Build the NVP request
    $post = array_merge($post, $this->_fieldsetToArray($fieldSets));

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  public function doNonReferencedCredit()
  {
    die('Not implemented');
  }

  public function doReauthorization()
  {
    die('Not implemented');
  }

  public function doReferenceTransaction()
  {
    die('Not implemented');
  }

  /**
   * Void an order or an authorization
   *
   * @param   Beausy_Service_Paypal_Data_DoVoid   $do_void
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function doVoid(Beausy_Service_Paypal_Data_DoVoid $do_void)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'DoVoid';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'DoVoid');

    // Build the NVP request
    $post = array_merge($post, $do_void->toArray());

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  public function getBalance()
  {
    die('Not implemented');
  }

  public function getBillingAgreementCustomerDetails()
  {
    die('Not implemented');
  }

  /**
   * Obtain information about an Express Checkout transaction
   *
   * @param   string  $token  A timestamped token, the value of which was returned by SetExpressCheckout response
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function getExpressCheckoutDetails($token)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'GetExpressCheckoutDetails';

    // Required HTTP client POST parameters
    $post = array(
      'METHOD' => 'GetExpressCheckoutDetails',
      'TOKEN'  => $token,
    );

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  /**
   * Obtain information about a recurring payments profile
   *
   * @param   string  $profileId
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function getRecurringPaymentsProfileDetails($profileId)
  {
    $alnum = new Zend_Validate_Alnum();
    if ($alnum->isValid($profileId))
    {
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception('Profile ID must be an alphanumeric string');
    }

    // Prepare client to reset POST parameters and setup credentials
    $this->_prepareClient();
    $this->_lastRequest = 'GetRecurringPaymentsProfileDetails';

    // Build the NVP request
    $post = array(
      'METHOD'    => 'GetRecurringPaymentsProfileDetails',
      'PROFILEID' => $profileId
    );

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  public function getTransactionDetails()
  {
    die('Not implemented');
  }

  /**
   * Cancel, suspend, or reactivate a recurring payments profile
   *
   * @param   Beausy_Service_Paypal_Data_DoAuthorization   $do_auth
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function manageRecurringPaymentsProfileStatus(
    Beausy_Service_Paypal_Data_ManageRecurringPaymentsProfileStatus $status)
  {
    $this->_prepareClient();
    $this->_lastRequest = 'ManageRecurringPaymentsProfileStatus';

    // Required HTTP client POST parameters
    $post = array('METHOD' => 'ManageRecurringPaymentsProfileStatus');

    // Build the NVP request
    $post = array_merge($post, $status->toArray());

    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest,
                                                            $client->request());

    return $response;
  }

  public function managePendingTransactionStatus()
  {
    die('Not implemented');
  }

  public function massPayment()
  {
    die('Not implemented');
  }

  public function refundTransaction()
  {
    die('Not implemented');
  }

  public function setCustomerBillingAgreement()
  {
    die('Not implemented');
  }

  /**
   * Initiates an Express Checkout transaction
   *
   * @param   array   $fieldSets            An array of request fields
   * @param   string  $paymentAmount        The total cost of the transaction to the customer; If
   *                                        shipping cost and tax charges are known, include them in
   *                                        this value; if not, this value should be the current
   *                                        sub-total of the order
   * @param   string  $returnUrl            URL to which the customer’s browser is returned after choosing to pay with PayPal
   * @param   string  $cancelUrl            URL to which the customer is returned if he does not approve the use of PayPal to pay you
   * @param   int     $reqConfirmShipping   The value 1 indicates that you require that the customer’s
   *                                        shipping address on file with PayPal be a confirmed address.
   *                                        For digital goods, this field is required. You must set the value to 0.
   * @param   int     $noShipping           0 - PayPal displays the shipping address on the PayPal pages
   *                                        1 - PayPal does not display shipping address fields whatsoever
   *                                        2 - If you do not pass the shipping address, PayPal obtains it from the buyer’s account profile
   * @param   array   $optional             A key/value array of options and values
   *                                        @see https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_r_SetExpressCheckout#id09BHC0QF07Q
   * @return  Beausy_Service_Paypal_Response_Nvp_Abstract
   */
  public function setExpressCheckout(array $fieldSets, $paymentAmount, $returnUrl, $cancelUrl, $reqConfirmShipping=0, $noShipping=1,
    $optional=null
    /*
    $token=null, $maxAmount=null, $callback=null, $callbackTimeout=null, $allowNote=null,
    $addrOverride=null, $localeCode=null, $pageStyle=null, $hdrImg=null, $hdrBorderColor=null, $hdrBackColor=null,
    $payflowColor=null, $email=null, $solutionType=null, $landingPage=null, $channelType=null, $giropaySuccessUrl=null, $giropayCancelUrl=null,
    $bankTxnPendingUrl=null, $brandName=null, $customerServiceNumber=null, $giftMessageEnable=null, $giftReceiptEnable=null,
    $giftWrapEnable=null, $giftWrapName=null, $giftWrapAmount=null, $buyerEmailOptInEnable=null, $surveyQuestion=null,
    $callbackVersion=null, $surveyEnable=null, $surveryChoices=null*/
  )
  {
    $this->_prepareClient();
    $this->_lastRequest = 'SetExpressCheckout';

    // Required HTTP client POST parameters
    $post = array(
      'METHOD'               => 'SetExpressCheckout',
      'PAYMENTREQUEST_0_AMT' => $paymentAmount,
      'RETURNURL'            => $returnUrl,
      'CANCELURL'            => $cancelUrl,
      'REQCONFIRMSHIPPING'   => $reqConfirmShipping,
      'NOSHIPPING'           => $noShipping
    );

    /*
    if (null !== $token)                 $post['TOKEN']                 = $token;
    if (null !== $maxAmount)             $post['MAXAMT']                = $maxAmount;
    if (null !== $callback)              $post['CALLBACK']              = $callback;
    if (null !== $callbackTimeout)       $post['CALLBACKTIMEOUT']       = $callbackTimeout;
    if (null !== $allowNote)             $post['ALLOWNOTE']             = $allowNote;
    if (null !== $addrOverride)          $post['ADDROVERRIDE']          = $addrOverride;
    if (null !== $localeCode)            $post['LOCALECODE']            = $localeCode;
    if (null !== $pageStyle)             $post['PAGESTYLE']             = $pageStyle;
    if (null !== $hdrImg)                $post['HDRIMG']                = $hdrImg;
    if (null !== $hdrBorderColor)        $post['HDRBORDERCOLOR']        = $hdrBorderColor;
    if (null !== $hdrBackColor)          $post['HDRBACKCOLOR']          = $hdrBackColor;
    if (null !== $payflowColor)          $post['PAYFLOWCOLOR']          = $payflowColor;
    if (null !== $email)                 $post['EMAIL']                 = $email;
    if (null !== $solutionType)          $post['SOLUTIONTYPE']          = $solutionType;
    if (null !== $landingPage)           $post['LANDINGPAGE']           = $landingPage;
    if (null !== $channelType)           $post['CHANNELTYPE']           = $channelType;
    if (null !== $giropaySuccessUrl)     $post['GIROPAYSUCCESSURL']     = $giropaySuccessUrl;
    if (null !== $giropayCancelUrl)      $post['GIROPAYCANCELURL']      = $giropayCancelUrl;
    if (null !== $bankTxnPendingUrl)     $post['BANKTXNPENDINGURL']     = $bankTxnPendingUrl;
    if (null !== $brandName)             $post['BRANDNAME']             = $brandName;
    if (null !== $customerServiceNumber) $post['CUSTOMERSERVICENUMBER'] = $customerServiceNumber;
    if (null !== $giftMessageEnable)     $post['GIFTMESSAGEENABLE']     = $giftMessageEnable;
    if (null !== $giftReceiptEnable)     $post['GIFTRECEIPTENABLE']     = $giftReceiptEnable;
    if (null !== $giftWrapEnable)        $post['GIFTWRAPENABLE']        = $giftWrapEnable;
    if (null !== $giftWrapName)          $post['GIFTWRAPNAME']          = $giftWrapName;
    if (null !== $giftWrapAmount)        $post['GIFTWRAPAMOUNT']        = $giftWrapAmount;
    if (null !== $buyerEmailOptInEnable) $post['BUYEREMAILOPTINENABLE'] = $buyerEmailOptInEnable;
    if (null !== $surveyQuestion)        $post['SURVEYQUESTION']        = $surveyQuestion;
    if (null !== $callbackVersion)       $post['CALLBACKVERSION']       = $callbackVersion;
    if (null !== $surveyEnable)          $post['SURVEYENABLE']          = $surveyEnable;
    if (null !== $surveryChoices) {
      $num_choices = count($surveyChoices);
      for ($i = 0; $i < $num_choices; $i++)
        $post["L_SURVEYCHOICE$i"] = $surveyChoices[$i];
    }
    */
    /*
    $optionalOptions = array(
      'TOKEN', 'MAXAMT', 'CALLBACK', 'CALLBACKTIMEOUT', 'ALLOWNOTE', 'ADDROVERRIDE',
      'LOCALECODE', 'PAGESTYLE', 'HDRIMG', 'HDRBORDERCOLOR', 'HDRBACKCOLOR', 'PAYFLOWCOLOR', 'PAYMENTACTION',
      'EMAIL', 'SOLUTIONTYPE', 'LANDINGPAGE', 'CHANNELTYPE', 'GIROPAYSUCCESSURL', 'GIROPAYCANCELURL', 'BANKTXNPENDINGURL',
      'BRANDNAME', 'CUSTOMERSERVICENUMBER', 'GIFTMESSAGEENABLE', 'GIFTRECEIPTENABLE', 'GIFTWRAPENABLE', 'GIFTWRAPNAME', 'GIFTWRAPAMOUNT',
      'BUYEREMAILOPTINENABLE', 'SURVEYQUESTION', 'CALLBACKVERSION', 'SURVEYENABLE', 'L_SURVEYCHOICEn',
    );
    */

    // Build the NVP request
    if (is_array($optional))
      $post = array_merge($post, $optional);
    $post = array_merge($post, $this->_fieldsetToArray($fieldSets));
    //var_dump($post); exit;
    // Setup client and send the request
    $client   = $this->getClient()->setParameterPost($post);
    $response = Beausy_Service_Paypal_Response_Nvp::factory($this->_lastRequest, $client->request());

    return $response;
  }

  public function transactionSearch()
  {
    die('Not implemented');
  }

  public function updateRecurringPaymentsProfile()
  {
    die('Not implemented');
  }
}
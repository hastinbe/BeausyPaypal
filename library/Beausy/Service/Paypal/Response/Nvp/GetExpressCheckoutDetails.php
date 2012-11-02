<?php
/**
 * @see Beausy_Service_Paypal_Response_Nvp_Abstract
 */
require_once 'Beausy/Service/Paypal/Response/Nvp/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
/**
 * TODO Beausy_Service_Paypal_Data_Response_PaymentRequestShipToAddress
 * TODO Beausy_Service_Paypal_Data_Response_PaymentRequestShipToAddress
 * TODO Beausy_Service_Paypal_Data_Response_PaymentDetailsItemType
 * TODO parse()
 */
class Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * The timestamped token value that was returned by SetExpressCheckout response and passed on GetExpressCheckoutDetails request
   * @var string
   */
  protected $_token;

  /**
   * A free-form field for your own use, as set by you in the Custom element of SetExpressCheckout request
   * @var string
   */
  protected $_custom;

  /**
   * Your own invoice or tracking number, as set by you in the element of the same name in SetExpressCheckout request
   * @var string
   */
  protected $_invoiceNumber;

  /**
   * Payer’s contact telephone number
   * @var string
   */
  protected $_phoneNumber;

  /**
   * A discount or gift certificate offered by PayPal to the buyer
   * @var string
   */
  protected $_paypalAdjustment;

  /**
   * DEPRECATED. The text entered by the buyer on the PayPal website if the ALLOWNOTE field was set to 1 in SetExpressCheckout
   * @var string
   */
  protected $_note;

  /**
   * Flag to indicate whether you need to redirect the customer to back to PayPal after completing the transaction
   * @var string
   */
  protected $_redirectRequired;

  /**
   * Returns the status of the checkout session
   * @var string
   */
  protected $_checkoutStatus;

  /**
   * The gift message entered by the buyer on the PayPal Review page
   * @var string
   */
  protected $_giftMessage;

  /**
   * Returns true if the buyer requested a gift receipt on the PayPal Review page and false if the buyer did not
   * @var string
   */
  protected $_giftReceiptEnable;

  /**
   * Return the gift wrap name only if the gift option on the PayPal Review page is selected by the buyer
   * @var string
   */
  protected $_giftWrapName;

  /**
   * Return the amount only if the gift option on the PayPal Review page is selected by the buyer
   * @var string
   */
  protected $_giftWrapAmount;

  /**
   * The buyer email address opted in by the buyer on the PayPal Review page
   * @var string
   */
  protected $_buyerMarketingEmail;

  /**
   * The survey question on the PayPal Review page
   * @var string
   */
  protected $_surveyQuestion;

  /**
   * The survey response selected by the buyer on the PayPal Review page
   * @var string
   */
  protected $_surveyChoiceSelected;

  /**
   * Payer Information Fields
   * @var Beausy_Service_Paypal_Data_PayerInformation
   */
  protected $_payerInformation;

  /**
   * Payer Name Fields
   * @var Beausy_Service_Paypal_Data_Response_PayerName
   */
  protected $_payerName;

  /**
   * Address Type Fields
   * @var Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  protected $_addressType;

  /**
   * Payment Details Type Fields
   * @var TODO Beausy_Service_Paypal_Data_Response_PaymentDetailsType
   */
  protected $_paymentDetails;

  /**
   * Payment Details Item Type Fields
   * @var TODO Beausy_Service_Paypal_Data_Response_PaymentDetailsItemType
   */
  protected $_paymentDetailsItemType;

  /**
   * EbayItemPaymentDetailsItemType Fields
   * @var array of Beausy_Service_Paypal_Data_Response_EbayItemPaymentDetailsItemType
   */
  protected $_ebayItemPaymentDetailsItemType;

  /**
   * User Selected Options Type Fields
   * @var Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  protected $_userSelectedOptions;

  /**
   * Seller Details Type Fields
   * @var array of Beausy_Service_Paypal_Data_Response_SellerDetailsType
   */
  protected $_sellerDetailsType;

  /**
   * Payment Request Info Type Fields
   * @var array of Beausy_Service_Paypal_Data_Response_PaymentRequestInfoType
   */
  protected $_paymentRequestInfoType;

  /**
   * Payment Error Type Fields
   * @var array of Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  protected $_paymentErrorType;

  /**
   * Tax Id Details Type Fields
   * NOTE: USED BY BRAZIL ONLY
   *
   * @var Beausy_Service_Paypal_Data_Response_TaxIdDetailsType
   */
  protected $_taxIdDetailsType;

  /**
   * Prefix of payment details parameters
   * @var string
   */
  protected $_paymentDetailsPrefix = 'PAYMENTREQUEST';

  /**
   * Map of payment details parameters to Beausy_Service_Paypal_Data_Response_PaymentDetailsType options
   * @var array
   */
  protected $_paymentDetailsSuffixes = array(
    'CURRENCYCODE'           => 'currencyCode',
    'AMT'                    => 'amount',
    'ITEMAMT'                => 'itemAmount',
    'SHIPPINGAMT'            => 'shippingAmount',
    'INSURANCEAMT'           => 'insuranceAmount',
    'SHIPDISCAMT'            => 'shippingDiscountAmount',
    'INSURANCEOPTIONOFFERED' => 'insuranceOptionOffered',
    'HANDLINGAMT'            => 'handlingAmount',
    'TAXAMT'                 => 'taxAmount',
    'DESC'                   => 'description',
    'CUSTOM'                 => 'custom',
    'INVNUM'                 => 'invoiceNumber',
    'NOTIFYURL'              => 'notifyUrl',
    'NOTETEXT'               => 'noteText',
    'TRANSACTIONID'          => 'transactionId',
    'ALLOWEDPAYMENTMETHOD'   => 'allowedPaymentMethod',
    'PAYMENTREQUESTID'       => 'paymentRequestId',
    'SOFTDESCRIPTOR'         => 'softDescription'
  );

  /**
   * Prefix of payment item details parameters
   * @var string
   */
  protected $_paymentDetailsItemPrefix = 'L_PAYMENTREQUEST';

  /**
   * Map of payment item details parameters to Beausy_Service_Paypal_Data_Response_PaymentDetailsItemType options
   * @var array
   */
  protected $_paymentDetailsItemSuffixes = array(
    'NAME'            => 'name',
    'DESC'            => 'description',
    'AMT'             => 'amount',
    'NUMBER'          => 'number',
    'QTY'             => 'quantity',
    'TAXAMT'          => 'taxAmount',
    'ITEMWEIGHTVALUE' => 'itemWeightValue',
    'ITEMWEIGHTUNIT'  => 'itemWeightUnit',
    'ITEMLENGTHVALUE' => 'itemLengthValue',
    'ITEMLENGTHUNIT'  => 'itemLengthUnit',
    'ITEMWIDTHVALUE'  => 'itemWidthValue',
    'ITEMWIDTHUNIT'   => 'itemWidthUnit',
    'ITEMHEIGHTVALUE' => 'itemHeightValue',
    'ITEMHEIGHTUNIT'  => 'itemHeightUnit',
    'ITEMCATEGORY'    => 'itemCategory'
  );

  /**
   * Parses the fields of the Paypal API response
   *
   * @param array $response
   * @return void
   */
  public function parse($response)
  {
    /*
     * Parse fields that come with every Paypal response
     */
    parent::parse($response);

    /*
     * If Paypal returned an error there are no additional fields to parse
     */
    if ($this->isError())
      return;

    $this->_token          = $response['TOKEN'];
    $this->_custom         = $response['CUSTOM'];
    $this->_checkoutStatus = $response['CHECKOUTSTATUS'];
    if (isset($response['INVNUM']))               $this->_invoiceNumber        = $response['INVNUM'];
    if (isset($response['PAYPALADJUSTMENT']))     $this->_paypalAdjustment     = $response['PAYPALADJUSTMENT'];
    if (isset($response['REDIRECTREQUIRED']))     $this->_redirectRequired     = $response['REDIRECTREQUIRED'];
    if (isset($response['GIFTMESSAGE']))          $this->_giftMessage          = $response['GIFTMESSAGE'];
    if (isset($response['GIFTRECEIPTENABLE']))    $this->_giftReceiptEnable    = $response['GIFTRECEIPTENABLE'];
    if (isset($response['GIFTWRAPNAME']))         $this->_giftWrapName         = $response['GIFTWRAPNAME'];
    if (isset($response['GIFTWRAPAMOUNT']))       $this->_giftWrapAmount       = $response['GIFTWRAPAMOUNT'];
    if (isset($response['BUYERMARKETINGEMAIL']))  $this->_buyerMarketingEmail  = $response['BUYERMARKETINGEMAIL'];
    if (isset($response['SURVEYQUESTION']))       $this->_surveyQuestion       = $response['SURVEYQUESTION'];
    if (isset($response['SURVEYCHOICESELECTED'])) $this->_surveyChoiceSelected = $response['SURVEYCHOICESELECTED'];
    if (isset($response['PHONENUM']))             $this->_phoneNumber          = $response['PHONENUM'];
    if (isset($response['NOTE']))                 $this->_note                 = $response['NOTE'];

    // Payer information
    $this->_payerInformation = new Beausy_Service_Paypal_Data_PayerInformation(array(
      'email'       => $response['EMAIL'],
      'payerId'     => $response['PAYERID'],
      'payerStatus' => $response['PAYERSTATUS'],
      'countryCode' => $response['COUNTRYCODE'],
    ));
    if (isset($response['BUSINESS'])) $this->_payerInformation->setBusiness($response['BUSINESS']);

    // Payer name
    $this->_payerName = new Beausy_Service_Paypal_Data_Response_PayerName(array(
      'firstName'  => $response['FIRSTNAME'],
      'lastName'   => $response['LASTNAME'],
    ));
    if (isset($response['SALUTATION'])) $this->payerName->setSalutation($response['SALUTATION']);
    if (isset($response['MIDDLENAME'])) $this->payerName->setMiddleName($response['MIDDLENAME']);
    if (isset($response['SUFFIX']))     $this->payerName->setSuffix($response['SUFFIX']);

    // Address type
    if (isset($response['ADDRESSSTATUS']))
    {
      $this->_addressType = new Beausy_Service_Paypal_Data_Response_ShipToAddress(array(
        'name'          => $response['SHIPTONAME'],
        'street'        => $response['SHIPTOSTREET'],
        'city'          => $response['SHIPTOCITY'],
        'state'         => $response['SHIPTOSTATE'],
        'zip'           => $response['SHIPTOZIP'],
        'countryCode'   => $response['SHIPTOCOUNTRYCODE'],
        'addressStatus' => $response['ADDRESSSTATUS'],
      ));
      if (isset($response['SHIPTOSTREET2']))
        $this->_addressType->setStreet2($response['SHIPTOSTREET2']);

      if (isset($response['SHIPTOCOUNTRYNAME']))
        $this->_addressType->setCountryName($response['SHIPTOCOUNTRYNAME']);
    }

    // Build payment details
    $this->_paymentDetails = array();
    for ($i = 0; isset($response[$this->_paymentDetailsPrefix.'_'.$i.'_CURRENCYCODE']); $i++) // AFAIK, CURRENCYCODE should exist with each payment detail
    {
      $options = array();
      foreach ($this->_paymentDetailsSuffixes as $suffix => $option)
      {
        if (isset($response[$this->_paymentDetailsPrefix.'_'.$i.'_'.$suffix]))
          $options[$option] = $response[$this->_paymentDetailsPrefix.'_'.$i.'_'.$suffix];
      }
      if (!empty($options))
      {
        $options['paymentIndex'] = $i;
        $this->_paymentDetails[] = new Beausy_Service_Paypal_Data_Response_PaymentDetailsType($options);
      }
      // End payment details

      // Build payment item details
      $options = array();
      for ($j = 0; isset($response[$this->_paymentDetailsItemPrefix.'_'.$i.'_NAME'.$j]); $j++) // AFAIK, NAME should exist with each payment item detail
      {
        foreach ($this->_paymentDetailsItemSuffixes as $suffix => $option)
        {
          if (isset($response[$this->_paymentDetailsItemPrefix.'_'.$i.'_'.$suffix.$j]))
            $options[$option] = $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_'.$suffix.$j];
        }
      }
      if (!empty($options))
      {
        $options['paymentIndex'] = $i;
        $this->_paymentDetailsItemType[] = new Beausy_Service_Paypal_Data_Response_PaymentDetailsItemType($options);
      }
      // End payment item details

      // Ebay item payment details
      $this->_ebayItemPaymentDetailsItemType = array();
      for ($i = 0, $j = 0; isset($response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMNUMBER'.$j]); $i++, $j=0)
      {
        for (; isset($response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMNUMBER'.$j]); $j++)
        {
          $this->_ebayItemPaymentDetailsItemType[$i] = new Beausy_Service_Paypal_Data_Response_EbayItemPaymentDetailsItemType(array(
            'paymentIndex'                 => $i,
            'itemIndex'                    => $j,
            'ebayItemNumber'               => $response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMNUMBER'.$j],
            'ebayItemAuctionTransactionId' => $response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMAUCTIONTXNID'.$j],
            'ebayItemOrderId'              => $response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMORDERID'.$j],
            'ebayCartId'                   => $response['L_PAYMENTREQUEST_'.$i.'_EBAYITEMCARTID'.$j],
          ));
        }
      }
      // End Ebay item payment details

      // User Selected Options Type Fields
      if (isset($response['SHIPPINGCALCULATIONMODE']))
      {
        $this->_userSelectedOptions = new Beausy_Service_Paypal_Data_Response_UserSelectedOptions(array(
          'shippingCalculationMode' => $response['SHIPPINGCALCULATIONMODE'],
          'insuranceOptionSelected' => $response['INSURANCEOPTIONSELECTED'],
          'shippingOptionIsDefault' => $response['SHIPPINGOPTIONISDEFAULT'],
          'shippingOptionAmount'    => $response['SHIPPINGOPTIONAMOUNT'],
          'shippingOptionName'      => $response['SHIPPINGOPTIONNAME'],
        ));
      }
      // End User Selected Options Type Fields

      // Seller Details Type Fields
      $this->_sellerDetailsType = array();
      for ($i = 0; isset($response[$this->_paymentDetailsItemPrefix.'_'.$i.'_SELLERPAYPALACCOUNTID']); $i++)
      {
        $this->_sellerDetailsType[$i] = new Beausy_Service_Paypal_Data_Response_SellerDetailsType(array(
          'sellerPaypalAccountId' => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_SELLERPAYPALACCOUNTID']
        ));
      }
      // End Seller Details Type Fields

      // Payment Request Info Type Fields
      $this->_paymentRequestInfoType = array();
      for ($i = 0; isset($response[$this->_paymentDetailsItemPrefix.'_'.$i.'_TRANSACTIONID']); $i++)
      {
        $this->_paymentRequestInfoType[$i] = new Beausy_Service_Paypal_Data_Response_PaymentRequestInfoType(array(
          'transactionId'    => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_TRANSACTIONID'],
          'paymentRequestId' => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_PAYMENTREQUESTID'],
        ));
      }
      // End Payment Request Info Type Fields

      // Payment Error Type Fields
      $this->_paymentErrorType = array();
      for ($i = 0; isset($response[$this->_paymentDetailsItemPrefix.'_'.$i.'_ERRORCODE']); $i++)
      {
        $this->_paymentErrorType[$i] = new Beausy_Service_Paypal_Data_Response_PaymentErrorType(array(
          'shortMessage' => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_SHORTMESSAGE'],
          'longMessage'  => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_LONGMESSAGE'],
          'errorCode'    => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_ERRORCODE'],
          'severityCode' => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_SEVERITYCODE'],
          'ack'          => $response[$this->_paymentDetailsItemPrefix.'_'.$i.'_ACK'],
        ));
      }
      // End Payment Error Type Fields

      // Tax Id Details Type Fields
      if (isset($response['TAXIDTYPE']))
      {
        $this->_taxIdDetailsType = new Beausy_Service_Paypal_Data_TaxIdDetailsType(array(
          'taxIdType'    => $response['TAXIDTYPE'],
          'taxIdDetails' => $response['TAXIDDETAILS'],
        ));
      }
      // End Tax Id Details Type Fields
    }
  }

  /**
   * Set token
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setToken($value)
  {
    $this->_token = $value;
    return $this;
  }

  /**
   * Retrieve token
   *
   * @return string
   */
  public function getToken()
  {
    return $this->_token;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setCustom($value)
  {
    $this->_custom = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getCustom()
  {
    return $this->_custom;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setInvoiceNumber($value)
  {
    $this->_invoiceNumber = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getInvoiceNumber()
  {
    return $this->_invoiceNumber;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPhoneNumber($value)
  {
    $this->_phoneNumber = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->_phoneNumber;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPaypalAdjustment($value)
  {
    $this->_paypalAdjustment = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPaypalAdjustment()
  {
    return $this->_paypalAdjustment;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setNote($value)
  {
    $this->_note = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getNote()
  {
    return $this->_note;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setRedirectRequired($value)
  {
    $this->_redirectRequired = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getRedirectRequired()
  {
    return $this->_redirectRequired;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setCheckoutStatus($value)
  {
    $this->_checkoutStatus = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getCheckoutStatus()
  {
    return $this->_checkoutStatus;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setGiftMessage($value)
  {
    $this->_giftMessage = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getGiftMessage()
  {
    return $this->_giftMessage;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setGiftReceiptEnable($value)
  {
    $this->_giftReceiptEnable = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getGiftReceiptEnable()
  {
    return $this->_giftReceiptEnable;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setGiftWrapName($value)
  {
    $this->_giftWrapName = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getGiftWrapName()
  {
    return $this->_giftWrapName;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setGiftWrapAmount($value)
  {
    $this->_giftWrapAmount = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getGiftWrapAmount()
  {
    return $this->_giftWrapAmount;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setBuyerMarketingEmail($value)
  {
    $this->_buyerMarketingEmail = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getBuyerMarketingEmail()
  {
    return $this->_buyerMarketingEmail;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setSurveyQuestion($value)
  {
    $this->_surveyQuestion = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getSurveyQuestion()
  {
    return $this->_surveyQuestion;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setSurveyChoiceSelected($value)
  {
    $this->_surveyChoiceSelected = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getSurveyChoiceSelected()
  {
    return $this->_surveyChoiceSelected;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPayerInformation($value)
  {
    $this->_payerInformation = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPayerInformation()
  {
    return $this->_payerInformation;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPayerName($value)
  {
    $this->_payerName = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPayerName()
  {
    return $this->_payerName;
  }

  /**
   * Set
   *
   * @param   Beausy_Service_Paypal_Data_Response_ShipToAddress  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setAddressType($value)
  {
    $this->_addressType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function getAddressType()
  {
    return $this->_addressType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPaymentDetailsType($value)
  {
    $this->_paymentDetails = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPaymentDetailsType()
  {
    return $this->_paymentDetails;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPaymentDetailsItemType($value)
  {
    $this->_paymentDetailsItemType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPaymentDetailsItemType()
  {
    return $this->_paymentDetailsItemType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setEbayItemPaymentDetailsItemType($value)
  {
    $this->_ebayItemPaymentDetailsItemType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getEbayItemPaymentDetailsItemType()
  {
    return $this->_ebayItemPaymentDetailsItemType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setUserSelectedOptions($value)
  {
    $this->_userSelectedOptions = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getUserSelectedOptions()
  {
    return $this->_userSelectedOptions;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setSellerDetailsType($value)
  {
    $this->_sellerDetailsType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getSellerDetailsType()
  {
    return $this->_sellerDetailsType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPaymentRequestInfoType($value)
  {
    $this->_paymentRequestInfoType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPaymentRequestInfoType()
  {
    return $this->_paymentRequestInfoType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setPaymentErrorType($value)
  {
    $this->_paymentErrorType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getPaymentErrorType()
  {
    return $this->_paymentErrorType;
  }

  /**
   * Set
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_Nvp_GetExpressCheckoutDetails
   */
  public function setTaxIdDetailsType($value)
  {
    $this->_taxIdDetailsType = $value;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function getTaxIdDetailsType()
  {
    return $this->_taxIdDetailsType;
  }
}
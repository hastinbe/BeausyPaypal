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
class Beausy_Service_Paypal_Response_Nvp_DoExpressCheckoutPayment extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * The timestamped token value that was returned by SetExpressCheckout response and passed on GetExpressCheckoutDetails request
   * @var string
   */
  private $_token;

  /**
   * Information about the payment
   * @var string
   */
  private $_paymentType;

  /**
   * The text entered by the buyer on the PayPal website if the ALLOWNOTE field was set to 1 in SetExpressCheckout
   * @var string
   */
  private $_note;

  /**
   * Flag to indicate whether you need to redirect the customer to back to PayPal for guest checkout after successfully completing the transaction
   * Note: Use this field only if you are using giropay or bank transfer payment methods in Germany
   *
   * @var string
   */
  private $_redirectRequired;

  /**
   * Flag to indicate whether you need to redirect the customer to back to PayPal after completing the transaction
   * @var string
   */
  private $_successPageRedirectRequested;

  /**
   * Filter ID, including the filter type
   * @var array
   */
  protected $_fmffilterId;

  /**
   * Filter name, including the filter type
   * @var array
   */
  protected $_fmffilterName;

  /**
   * Payment information fields for each payment
   * @var array of Beausy_Service_Paypal_Data_Response_PaymentInformation
   */
  protected $_paymentInformation;

  /**
   * Payment error type fields
   * @var array of Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  protected $_paymentRequestErrors;

   /**
   * User selected options
   * @var Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  protected $_userSelectedOptions;
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

    $this->_token = $response['TOKEN'];

    if (isset($response['PAYMENTTYPE']))
      $this->_paymentType = $response['PAYMENTTYPE'];

    if (isset($response['NOTE']))
      $this->_note = $response['NOTE'];

    if (isset($response['REDIRECTREQUIRED']))
      $this->_redirectRequired = $response['REDIRECTREQUIRED'];

    $this->_successPageRedirectRequested = $response['SUCCESSPAGEREDIRECTREQUESTED'];

    // Loop and find all filter IDs (deprecated)
    for ($i = 0; isset($response["L_FMFfilterID$i"]); $i++)
      $this->_fmffilterId[] = $response["L_FMFfilterID$i"];

    // Loop and find all filter names (deprecated)
    for ($i = 0; isset($response["L_FMFfilterNAME$i"]); $i++)
      $this->_fmffilterName[] = $response["L_FMFfilterNAME$i"];


    // Payment Information Fields
    for ($i = 0; isset($response['PAYMENTINFO_'.$i.'_TRANSACTIONID']); $i++)
    {
      $paymentInformation = new Beausy_Service_Paypal_Data_Response_PaymentInformation(array(
        'transactionId'         => $response['PAYMENTINFO_'.$i.'_TRANSACTIONID'],
        'transactionType'       => $response['PAYMENTINFO_'.$i.'_TRANSACTIONTYPE'],
        'paymentType'           => $response['PAYMENTINFO_'.$i.'_PAYMENTTYPE'],
        'orderTime'             => $response['PAYMENTINFO_'.$i.'_ORDERTIME'],
        'amount'                => $response['PAYMENTINFO_'.$i.'_AMT'],
        'currencyCode'          => $response['PAYMENTINFO_'.$i.'_CURRENCYCODE'],
        'feeAmount'             => $response['PAYMENTINFO_'.$i.'_FEEAMT'],
        'taxAmount'             => $response['PAYMENTINFO_'.$i.'_TAXAMT'],
        'paymentStatus'         => $response['PAYMENTINFO_'.$i.'_PAYMENTSTATUS'],
        'protectionEligibility' => $response['PAYMENTINFO_'.$i.'_PROTECTIONELIGIBILITY'],
      ));

      if (isset($response['PAYMENTINFO_'.$i.'_SETTLEAMT']))
        $paymentInformation->setSettleAmount($response['PAYMENTINFO_'.$i.'_SETTLEAMT']);

      if (isset($response['PAYMENTINFO_'.$i.'_EXCHANGERATE']))
        $paymentInformation->setExchangeRate($response['PAYMENTINFO_'.$i.'_EXCHANGERATE']);

      if (isset($response['PAYMENTINFO_'.$i.'_PROTECTIONELIGIBILITYTYPE']))
        $paymentInformation->setProtectionEligibilityType($response['PAYMENTINFO_'.$i.'_PROTECTIONELIGIBILITYTYPE']);

      if (isset($response['PAYMENTINFO_'.$i.'_EBAYITEMAUCTIONTXNID']))
        $paymentInformation->setEbayItemAuctionTransactionId($response['PAYMENTINFO_'.$i.'_EBAYITEMAUCTIONTXNID']);

      if (isset($response['PAYMENTINFO_'.$i.'_PAYMENTREQUESTID']))
        $paymentInformation->setPaymentRequestId($response['PAYMENTINFO_'.$i.'_PAYMENTREQUESTID']);

      // PendingReason is returned in the response only if PaymentStatus is Pending
      if ($response['PAYMENTINFO_'.$i.'_PAYMENTSTATUS'] == 'Pending')
        $paymentInformation->setPendingReason($response['PAYMENTINFO_'.$i.'_PENDINGREASON']);

      if (isset($response['PAYMENTINFO_'.$i.'_REASONCODE']))
        $paymentInformation->setReasonCode($response['PAYMENTINFO_'.$i.'_REASONCODE']);

      // Returned only if PaymentStatus is Completed-Funds-Held
      if ($response['PAYMENTINFO_'.$i.'_PAYMENTSTATUS'] == 'Completed-Funds-Held')
        $paymentInformation->setHoldDecision($response['PAYMENTINFO_'.$i.'_HOLDDECISION']);

      // Begin FMF data
      $fmfFilterIds   = array();
      $fmfFilterNames = array();

      for ($j = 0; isset($response['L_PAYMENTINFO_'.$i.'_FMFfilterID$j']); $j++)
      {
        $fmfFilterIds[]   = $response['L_PAYMENTINFO_'.$i."_FMFfilterID$j"];
        $fmfFilterNames[] = $response['L_PAYMENTINFO_'.$i."_FMFfilterNAME$j"];
      }

      $paymentInformation->setFmfFilterIds($fmfFilterIds);
      $paymentInformation->setFmfFilterNames($fmfFilterNames);
      // End FMF data

      $this->_paymentInformation[] = $paymentInformation;
    }

    // Payment Error Type Fields
    for ($i = 0; isset($response['PAYMENTREQUEST_'.$i.'_ACK']); $i++)
    {
      $paymentError = new Beausy_Service_Paypal_Data_Response_PaymentErrorType(array(
        'shortMessage' => $response['PAYMENTREQUEST_'.$i.'_SHORTMESSAGE'],
        'longMessage'  => $response['PAYMENTREQUEST_'.$i.'_LONGMESSAGE'],
        'errorCode'    => $response['PAYMENTREQUEST_'.$i.'_ERRORCODE'],
        'severityCode' => $response['PAYMENTREQUEST_'.$i.'_SEVERITYCODE'],
        'ack'          => $response['PAYMENTREQUEST_'.$i.'_ACK'],
      ));
      $this->_paymentRequestErrors[] = $paymentError;
    }

    // UserSelectedOptions Fields
    if (isset($response['INSURANCEOPTIONSELECTED']))
    {
      if ($response['INSURANCEOPTIONSELECTED'] == 'true')
      {
        $this->_userSelectedOptions = new Beausy_Service_Paypal_Data_Response_UserSelectedOptions(array(
          'shippingCalculationMode' => $response['SHIPPINGCALCULATIONMODE'],
          'insuranceOptionSelected' => $response['INSURANCEOPTIONSELECTED'],
          'shippingOptionIsDefault' => $response['SHIPPINGOPTIONISDEFAULT'],
          'shippingOptionAmount'    => $response['SHIPPINGOPTIONAMOUNT'],
          'shippingOptionName'      => $response['SHIPPINGOPTIONNAME'],
        ));
      }
      else {
        $this->_userSelectedOptions = new Beausy_Service_Paypal_Data_Response_UserSelectedOptions(array(
          'insuranceOptionSelected' => $response['INSURANCEOPTIONSELECTED'],
        ));
      }
    }

    // Seller Details Type Fields
    for ($i = 0; isset($response['PAYMENTREQUEST_'.$i.'_SELLERPAYPALACCOUNTID']); $i++)
    {
      $sellerDetails = new Beausy_Service_Paypal_Data_Response_SellerDetailsType(array(
        'sellerPaypalAccountId'   => $response['PAYMENTREQUEST_'.$i.'_SELLERPAYPALACCOUNTID'],
        'secureMerchantAccountId' => $response['PAYMENTREQUEST_'.$i.'_SECUREMERCHANTACCOUNTID'],
      ));
      $this->_sellerDetailsType[] = $sellerDetails;
    }
  }

  /**
   * Set token
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
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
   * Set information about payment
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setPaymentType($value)
  {
    $this->_paymentType = $value;
    return $this;
  }

  /**
   * Retrieve information about payment
   *
   * @return string
   */
  public function getPaymentType()
  {
    return $this->_paymentType;
  }

  /**
   * Set note
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setNote($value)
  {
    $this->_note = $value;
    return $this;
  }

  /**
   * Retrieve note
   *
   * @return string
   */
  public function getNote()
  {
    return $this->_note;
  }

  /**
   * Set flag to indicate whether you need to redirect the customer to back to PayPal for guest checkout after successfully completing the transaction
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setRedirectRequired($value)
  {
    $this->_redirectRequired = $value;
    return $this;
  }

  /**
   * Retrieve flag to indicate whether you need to redirect the customer to back to PayPal for guest checkout after successfully completing the transaction
   *
   * @return string
   */
  public function getRedirectRequired()
  {
    return $this->_redirectRequired;
  }

  /**
   * Set flag to indicate whether you need to redirect the customer to back to PayPal after completing the transaction
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setSuccessPageRedirectRequested($value)
  {
    $this->_successPageRedirectRequested = $value;
    return $this;
  }

  /**
   * Retrieve flag to indicate whether you need to redirect the customer to back to PayPal after completing the transaction
   *
   * @return string
   */
  public function getSuccessPageRedirectRequested()
  {
    return $this->_successPageRedirectRequested;
  }

  /**
   * Set the filter IDs, including the filter types
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setFmfFilterId($value)
  {
    $this->_fmffilterId = $value;
    return $this;
  }

  /**
   * Retrieve the filter IDs, including the filter types
   *
   * @return array
   */
  public function getFmfFilterId()
  {
    return $this->_fmffilterId;
  }

  /**
   * Set the filter names, including the filter types
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setFmfFilterName($value)
  {
    $this->_fmffilterName = $value;
    return $this;
  }

  /**
   * Retrieve the filter names, including the filter types
   *
   * @return array
   */
  public function getFmfFilterName()
  {
    return $this->_fmffilterName;
  }

  /**
   * Set payment information
   *
   * @param   array  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setPaymentInformation($value)
  {
    $this->_paymentInformation = $value;
    return $this;
  }

  /**
   * Retrieve payment information
   *
   * @return array
   */
  public function getPaymentInformation()
  {
    return $this->_paymentInformation;
  }

  /**
   * Set Payment error type fields
   *
   * @param   array  $value
   * @return  Beausy_Service_Paypal_Response_DoExpressCheckoutPayment
   */
  public function setPaymentRequestErrors($value)
  {
    $this->_paymentRequestErrors = $value;
    return $this;
  }

  /**
   * Retrieve Payment error type fields
   *
   * @return array
   */
  public function getPaymentRequestErrors()
  {
    return $this->_paymentRequestErrors;
  }
}
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
class Beausy_Service_Paypal_Response_Nvp_GetRecurringPaymentsProfileDetails extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  protected $_getRecurringPaymentsProfileDetails;
  protected $_recurringPaymentsProfileDetails;
  protected $_shipToAddress;
  protected $_billingPeriodDetails;
  protected $_recurringPaymentsSummaryDetails;
  protected $_creditCardDetails;
  protected $_payerInfo;
  protected $_address;

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

    // Populate recurring payments profile details
    $this->_getRecurringPaymentsProfileDetails =
      new Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails(array(
        'profileId'                 => $response['PROFILEID'],
        'status'                    => $response['STATUS'],
        'description'               => $response['DESC'],
        'autoBillOutstandingAmount' => $response['AUTOBILLOUTAMT'],
        'maxFailedPayments'         => $response['MAXFAILEDPAYMENTS'],
        'aggregateAmount'           => isset($response['AGGREGATEAMOUNT']) ? $response['AGGREGATEAMOUNT'] : null,
        'aggregateOptionalAmount'   => isset($response['AGGREGATEOPTIONALAMOUNT']) ? $response['AGGREGATEOPTIONALAMOUNT'] : null,
        'finalPaymentDueDate'       => $response['FINALPAYMENTDUEDATE']));

    $this->_recurringPaymentsProfileDetails =
      new Beausy_Service_Paypal_Data_RPProfileDetails(array(
        'subscriberName'    => $response['SUBSCRIBERNAME'],
        'profileStartDate'  => $response['PROFILESTARTDATE'],
        'profileReference'  => isset($response['PROFILEREFERENCE']) ? $response['PROFILEREFERENCE'] : null));

    // Popular shipping address information
    $this->_shipToAddress = new Beausy_Service_Paypal_Data_Response_ShipToAddress();
    $this->_shipToAddress->setAddressStatus($response['ADDRESSSTATUS']);

    if (isset($response['SHIPTONAME']))
      $this->_shipToAddress->setName($response['SHIPTONAME']);

    if (isset($response['SHIPTOSTREET']))
      $this->_shipToAddress->setStreet($response['SHIPTOSTREET']);

    if (isset($response['SHIPTOSTREET2']))
      $this->_shipToAddress->setStreet2($response['SHIPTOSTREET2']);

    if (isset($response['SHIPTOCITY']))
      $this->_shipToAddress->setCity($response['SHIPTOCITY']);

    if (isset($response['SHIPTOSTATE']))
      $this->_shipToAddress->setState($response['SHIPTOSTATE']);

    if (isset($response['SHIPTOZIP']))
      $this->_shipToAddress->setZip($response['SHIPTOZIP']);

    if (isset($response['SHIPTOCOUNTRYCODE']))
      $this->_shipToAddress->setCountryCode($response['SHIPTOCOUNTRYCODE']);

    // Populate billing period details
    $this->_billingPeriodDetails =
      new Beausy_Service_Paypal_Data_Response_BillingPeriodDetails(array(
        'billingPeriod'             => $response['BILLINGPERIOD'],
        'regularBillingPeriod'      => $response['REGULARBILLINGPERIOD'],
        'billingFrequency'          => $response['BILLINGFREQUENCY'],
        'regularBillingFrequency'   => $response['REGULARBILLINGFREQUENCY'],
        'totalBillingCycles'        => $response['TOTALBILLINGCYCLES'],
        'regularTotalBillingCycles' => $response['REGULARTOTALBILLINGCYCLES'],
        'amount'                    => $response['AMT'],
        'regularAmount'             => $response['REGULARAMT'],
        'shippingAmount'            => $response['SHIPPINGAMT'],
        'regularShippingAmount'     => $response['REGULARSHIPPINGAMT'],
        'taxAmount'                 => $response['TAXAMT'],
        'regularTaxAmount'          => $response['REGULARTAXAMT'],
        'currencyCode'              => $response['CURRENCYCODE'],
        'regularCurrencyCode'       => $response['REGULARCURRENCYCODE']));

    // Populate recurring payments summary details
    $this->_recurringPaymentsSummaryDetails =
      new Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails(array(
        'nextBillingDate'     => $response['NEXTBILLINGDATE'],
        'cyclesCompleted'     => $response['NUMCYCLESCOMPLETED'],
        'cyclesRemaining'     => $response['NUMCYCLESREMAINING'],
        'outstandingBalance'  => $response['OUTSTANDINGBALANCE'],
        'failedPaymentCount'  => $response['FAILEDPAYMENTCOUNT'],
        'lastPaymentDate'     => $response['LASTPAYMENTDATE'],
        'lastPaymentAmount'   => $response['LASTPAYMENTAMT']));

    // Populate credit card details
    $this->_creditCardDetails = new Beausy_Service_Paypal_Data_Response_CreditCardDetails(array(
      'type'            => $response['CREDITCARDTYPE'],
      'number'          => $response['ACCT'],
      'expirationDate'  => $response['EXPDATE']));

    if (isset($response['STARTDATE']))
      $this->_creditCardDetails->setStartDate($response['STARTDATE']);

    if (isset($response['ISSUENUMBER']))
      $this->_creditCardDetails->setIssueNumber($response['ISSUENUMBER']);

    // Populate payer information
    $this->_payerInformation = new Beausy_Service_Paypal_Data_Response_PayerInformation(array(
      'email' => $response['EMAIL']));

    if (isset($response['FIRSTNAME']))
      $this->_payerInformation->setFirstName($response['FIRSTNAME']);

    if (isset($response['LASTNAME']))
      $this->_payerInformation->setLastName($response['LASTNAME']);
  }

  public function getRecurringPaymentsProfileDetails()
  {
    return $this->_recurringPaymentsProfileDetails;
  }

  public function getShipToAddress()
  {
    return $this->_shipToAddress;
  }

  public function getBillingPeriodDetails()
  {
    return $this->_billingPeriodDetails;
  }

  public function getRecurringPaymentsSummaryDetails()
  {
    return $this->_recurringPaymentsSummaryDetails;
  }

  public function getCreditCardDetails()
  {
    return $this->_creditCardDetails;
  }

  public function getPayerInformation()
  {
    return $this->_payerInformation;
  }
}
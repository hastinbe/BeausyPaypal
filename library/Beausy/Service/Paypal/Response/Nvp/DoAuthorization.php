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
class Beausy_Service_Paypal_Response_Nvp_DoAuthorization extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  // Payment statuses
  const PAYMENT_STATUS_NONE               = 'None';
  const PAYMENT_STATUS_CANCELLED_REVERSAL = 'Canceled-Reversal';
  const PAYMENT_STATUS_COMPLETED          = 'Completed';
  const PAYMENT_STATUS_DENIED             = 'Denied';
  const PAYMENT_STATUS_EXPIRED            = 'Expired';
  const PAYMENT_STATUS_FAILED             = 'Failed';
  const PAYMENT_STATUS_IN_PROGRESS        = 'In-Progress';
  const PAYMENT_STATUS_PARTIALLY_REFUNDED = 'Partially-Refunded';
  const PAYMENT_STATUS_PENDING            = 'Pending';
  const PAYMENT_STATUS_REFUNDED           = 'Refunded';
  const PAYMENT_STATUS_REVERSED           = 'Reversed';
  const PAYMENT_STATUS_PROCESSED          = 'Processed';
  const PAYMENT_STATUS_VOIDED             = 'Voided';

  // Pending reasons
  const PENDING_REASON_NONE          = 'none';
  const PENDING_REASON_ADDRESS       = 'address';
  const PENDING_REASON_AUTHORIZATION = 'authorization';
  const PENDING_REASON_ECHECK        = 'echeck';
  const PENDING_REASON_INTL          = 'intl';
  const PENDING_REASON_MULTICURRENCY = 'multi-currency';
  const PENDING_REASON_ORDER         = 'order';
  const PENDING_REASON_PAYMENTREVIEW = 'paymentreview';
  const PENDING_REASON_UNILATERAL    = 'unilateral';
  const PENDING_REASON_VERIFY        = 'verify';
  const PENDING_REASON_OTHER         = 'other';

  // Protection eligibility
  const PROTECTION_ELIGIBILITY_ELIGIBLE          = 'Eligible';
  const PROTECTION_ELIGIBILITY_PARTIALLYELIGIBLE = 'PartiallyEligible';
  const PROTECTION_ELIGIBILITY_INELIGIBLE        = 'Ineligible';

  // Protection eligibility types
  const PROTECTION_ELIGIBILITY_TYPE_ELIGIBLE                    = 'Eligible';
  const PROTECTION_ELIGIBILITY_TYPE_ITEMNOTRECEIVEDELIGIBLE     = 'ItemNotReceivedEligible';
  const PROTECTION_ELIGIBILITY_TYPE_UNAUTHORIZEDPAYMENTELIGIBLE = 'UnauthorizedPaymentEligible';
  const PROTECTION_ELIGIBILITY_TYPE_INELIGIBLE                  = 'Ineligible';

  /**
   * An authorization identification number
   * @var string
   */
  protected $_transactionId;

  /**
   * The amount you specified in the request
   * @var string
   */
  protected $_amount;

  /**
   * Status of the payment
   * @var string
   */
  protected $_paymentStatus;

  /**
   * The reason the payment is pending
   * @var string
   */
  protected $_pendingReason;

  /**
   * Protection elibility
   * @var string
   */
  protected $_protectionEligibility;

  /**
   * Protection elibility type
   * @var string
   */
  protected $_protectionEligibilityType;

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

    $this->_transactionId         = $response['TRANSACTIONID'];
    $this->_amount                = $response['AMT'];
    $this->_paymentStatus         = $response['PAYMENTSTATUS'];
    $this->_pendingReason         = $response['PENDINGREASON'];
    $this->_protectionEligibility = $response['PROTECTIONELIGIBILITY'];

    if (isset($response['PROTECTIONELIGIBILITYTYPE']))
      $this->_protectionEligibilityType = $response['PROTECTIONELIGIBILITYTYPE'];
  }

  /**
   * Retrieve the authorization identification number
   *
   * @return string
   */
  public function getTransactionId()
  {
    return $this->_transactionId;
  }

  /**
   * Retrieve the amount you specified in the request
   *
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Retrieve the status of the payment
   *
   * @return string
   */
  public function getPaymentStatus()
  {
    return $this->_paymentStatus;
  }

  /**
   * Retrieve the reason the payment is pending
   *
   * @return string
   */
  public function getPendingReason()
  {
    return $this->_pendingReason;
  }

  /**
   * Retrieve the protection elibility
   *
   * @return string
   */
  public function getProtectionEligibility()
  {
    return $this->_protectionEligibility;
  }

  /**
   * Retrieve the protection elibility type
   *
   * @return string
   */
  public function getProtectionEligibilityType()
  {
    return $this->_protectionEligibilityType;
  }
}
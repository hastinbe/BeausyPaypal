<?php
/**
 * @see Beausy_Service_Paypal_Data_Response_Abstract
 */
require_once 'Beausy/Service/Paypal/Data/Response/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Recurring payments profile ID returned in the
   * CreateRecurringPaymentsProfile response
   * @var string
   */
  private $_profileId;

  /**
   * Status of the recurring payment profile
   * @var string
   */
  private $_status;

  /**
   * Description of the recurring payment
   * @var string
   */
  private $_description;

  /**
   * Automatically bill the outstanding balance amount
   * in the next billing cycle
   * @var string
   */
  private $_autoBillOutstandingAmount;

  /**
   * Number of scheduled payments that can fail before
   * the profile is automatically suspended
   * @var string
   */
  private $_maxFailedPayments;

  /**
   * Total amount collected thus far for scheduled payments
   * @var string
   */
  private $_aggregateAmount;

  /**
   * Total amount collected thus far for optional payments
   * @var string
   */
  private $_aggregateOptionalAmount;

  /**
   * Final scheduled payment due date before the profile expires
   * @var string
   */
  private $_finalPaymentDueDate;

  /**
   * Set recurring payments profile ID
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setProfileId($value)
  {
    $this->_profileId = $value;
    return $this;
  }

  /**
   * Retrieve recurring payments profile ID
   *
   * @return string
   */
  public function getProfileId()
  {
    return $this->_profileId;
  }

  /**
   * Set status of the recurring payment profile
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setStatus($value)
  {
    $this->_status = $value;
    return $this;
  }

  /**
   * Retrieve status of the recurring payment profile
   *
   * @return string
   */
  public function getStatus()
  {
    return $this->_status;
  }

  /**
   * Set description of the recurring payment
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setDescription($value)
  {
    $this->_description = $value;
    return $this;
  }

  /**
   * Retrieve description of the recurring payment
   *
   * @return string
   */
  public function getDescription()
  {
    return $this->_description;
  }

  /**
   * Set whether you would like PayPal to automatically bill
   * the outstanding balance amount in the next billing cycle
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setAutoBillOutstandingAmount($value)
  {
    $this->_autoBillOutstandingAmount = $value;
    return $this;
  }

  /**
   * Retrieve whether you would like PayPal to automatically bill
   * the outstanding balance amount in the next billing cycle
   *
   * @return string
   */
  public function getAutoBillOutstandingAmount()
  {
    return $this->_autoBillOutstandingAmount;
  }

  /**
   * Set number of scheduled payments that can fail
   * before the profile is automatically suspended
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setMaxFailedPayments($value)
  {
    $this->_maxFailedPayments = $value;
    return $this;
  }

  /**
   * Retrieve number of scheduled payments that can fail
   * before the profile is automatically suspended
   *
   * @return string
   */
  public function getMaxFailedPayments()
  {
    return $this->_maxFailedPayments;
  }

  /**
   * Set total amount collected thus far for scheduled payments
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setAggregateAmount($value)
  {
    $this->_aggregateAmount = $value;
    return $this;
  }

   /**
   * Retrieve total amount collected thus far for scheduled payments
   *
   * @return string
   */
  public function getAggregateAmount()
  {
    return $this->_aggregateAmount;
  }

  /**
   * Set total amount collected thus far for optional payments
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setAggregateOptionalAmount($value)
  {
    $this->_aggregateOptionalAmount = $value;
    return $this;
  }

  /**
   * Retrieve total amount collected thus far for optional payments
   *
   * @return string
   */
  public function getAggregateOptionalAmount()
  {
    return $this->_aggregateOptionalAmount;
  }

  /**
   * Set final scheduled payment due date before the profile expires
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_GetRecurringPaymentsProfileDetails
   */
  public function setFinalPaymentDueDate($value)
  {
    $this->_finalPaymentDueDate = $value;
    return $this;
  }

  /**
   * Retrieve final scheduled payment due date before the profile expires
   *
   * @return string
   */
  public function getFinalPaymentDueDate()
  {
    return $this->_finalPaymentDueDate;
  }
}
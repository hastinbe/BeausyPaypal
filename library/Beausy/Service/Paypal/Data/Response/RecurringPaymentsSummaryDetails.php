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
class Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * The next scheduled billing date, in YYYY-MM-DD format
   * @var string
   */
  private $_nextBillingDate;

  /**
   * Number of billing cycles completed in the current active
   * subscription period
   * @var integer
   */
  private $_cyclesCompleted;

  /**
   * Number of billing cycles remaining in the current active
   * subscription period
   * @var integer
   */
  private $_cyclesRemaining;

  /**
   * Current past due or outstanding balance for this profile
   * @var string
   */
  private $_outstandingBalance;

  /**
   * Total number of failed billing cycles for this profile
   * @var integer
   */
  private $_failedPaymentCount;

  /**
   * Date of the last successful payment received for this profile,
   * in YYYY-MM-DD format
   * @var string
   */
  private $_lastPaymentDate;

  /**
   * Amount of the last successful payment received for this profile
   * @var string
   */
  private $_lastPaymentAmount;

  /**
   * Set next scheduled billing date, in YYYY-MM-DD format
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setNextBillingDate($value)
  {
    $this->_nextBillingDate = $value;
    return $this;
  }

  /**
   * Retrieve next scheduled billing date, in YYYY-MM-DD format
   *
   * @return string
   */
  public function getNextBillingDate()
  {
    return $this->_nextBillingDate;
  }

  /**
   * Set number of billing cycles completed in the current
   * active subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setCyclesCompleted($value)
  {
    $this->_cyclesCompleted = $value;
    return $this;
  }

  /**
   * Retrieve number of billing cycles completed in the current
   * active subscription period
   *
   * @return string
   */
  public function getCyclesCompleted()
  {
    return $this->_cyclesCompleted;
  }

  /**
   * Set number of billing cycles remaining in the current
   * active subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setCyclesRemaining($value)
  {
    $this->_cyclesRemaining = $value;
    return $this;
  }

  /**
   * Retrieve number of billing cycles remaining in the current
   * active subscription period
   *
   * @return string
   */
  public function getCyclesRemaining()
  {
    return $this->_cyclesRemaining;
  }

  /**
   * Set current past due or outstanding balance for this profile
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setOutstandingBalance($value)
  {
    $this->_outstandingBalance = $value;
    return $this;
  }

  /**
   * Retrieve current past due or outstanding balance for this profile
   *
   * @return string
   */
  public function getOutstandingBalance()
  {
    return $this->_outstandingBalance;
  }

  /**
   * Set total number of failed billing cycles for this profile
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setFailedPaymentCount($value)
  {
    $this->_failedPaymentCount = $value;
    return $this;
  }

  /**
   * Retrieve total number of failed billing cycles for this profile
   *
   * @return string
   */
  public function getFailedPaymentCount()
  {
    return $this->_failedPaymentCount;
  }

  /**
   * Set date of the last successful payment received for this
   * profile, in YYYY-MM-DD format
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setLastPaymentDate($value)
  {
    $this->_lastPaymentDate = $value;
    return $this;
  }

  /**
   * Retrieve date of the last successful payment received for this
   * profile, in YYYY-MM-DD format
   *
   * @return string
   */
  public function getLastPaymentDate()
  {
    return $this->_lastPaymentDate;
  }

  /**
   * Set amount of the last successful payment received for this profile
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_RecurringPaymentsSummaryDetails
   */
  public function setLastPaymentAmount($value)
  {
    $this->_lastPaymentAmount = $value;
    return $this;
  }

  /**
   * Retrieve amount of the last successful payment received for this profile
   * @return string
   */
  public function getLastPaymentAmount()
  {
    return $this->_lastPaymentAmount;
  }
}
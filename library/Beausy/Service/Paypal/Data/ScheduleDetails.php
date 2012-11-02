<?php
/**
 * @see Beausy_Service_Paypal_Data_Abstract
 */
require_once 'Beausy/Service/Paypal/Data/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Data_ScheduleDetails extends Beausy_Service_Paypal_Data_Abstract
{
  const DESC_MAX_LEN = 127;
  const AUTO_BILL_NOAUTOBILL ='NoAutoBill';
  const AUTO_BILL_ADDTONEXTBILL = 'AddToNextBill';

  /**
   * Description of the recurring payment
   *
   * @var string
   */
  private $_description;

  /**
   * Number of scheduled payments that can fail before the
   * profile is automatically suspended.
   *
   * @var string
   */
  private $_maxFailedPayments;

  /**
   * Indicates whether you would like PayPal to automatically bill
   * the outstanding balance amount in the next billing cycle.
   *
   * @var string
   */
  private $_autoBillAmount;

  /**
   * Set description of the recurring payment
   *
   * @param string $description
   * @return Beausy_Service_Paypal_Data_ScheduleDetails
   */
  public function setDescription($description)
  {
    /* Truncate description if it exceeds the maximum */
    if (strlen($description > self::DESC_MAX_LEN))
      $description = substr($description, 0, self::DESC_MAX_LEN);

    $this->_description = $description;
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
   * Set the number of scheduled payments that can fail before the profile
   * is automatically suspended
   *
   * @param string|integer $value
   * @return Beausy_Service_Paypal_Data_ScheduleDetails
   */
  public function setMaxFailedPayments($value)
  {
    $this->_maxFailedPayments = $value;
    return $this;
  }

  /**
   * Retrieve the number of scheduled payments that can fail before the
   * profile is automatically suspended
   *
   * @return string|integer
   */
  public function getMaxFailedPayments()
  {
    return $this->_maxFailedPayments;
  }

  /**
   * Set whether you would like PayPal to automatically bill the outstanding
   * balance amount in the next billing cycle
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_ScheduleDetails
   */
  public function setAutoBillAmount($value)
  {
    if ($value != self::AUTO_BILL_NOAUTOBILL &&
        $value != self::AUTO_BILL_ADDTONEXTBILL)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Auto bill must be '" . self::AUTO_BILL_NOAUTOBILL . "' or '" . self::AUTO_BILL_ADDTONEXTBILL . "'");
    }

    $this->_autoBillAmount = $value;
    return $this;
  }

  /**
   * Retrieve if Paypal is to automatically bill the outstanding balance
   * amount in the next billing cycle
   *
   * @return string
   */
  public function getAutoBillAmount()
  {
    return $this->_autoBillAmount;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // Required
    $array['DESC'] = $this->_description;

    // Optional
    if (isset($this->_maxFailedPayments))
      $array['MAXFAILEDPAYMENTS'] = $this->_maxFailedPayments;

    // Optional
    if (!empty($this->_autoBillAmount))
      $array['AUTOBILLAMT'] = $this->_autoBillAmount;

    return $array;
  }
}
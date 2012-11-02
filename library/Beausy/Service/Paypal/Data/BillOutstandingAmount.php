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
class Beausy_Service_Paypal_Data_BillOutstandingAmount extends Beausy_Service_Paypal_Data_Abstract
{
  /**
   * Recurring payments profile ID
   *
   * @var string
   */
  private $_profileId;

  /**
   * The amount to bill
   *
   * @var string
   */
  private $_amount;

  /**
   * The reason for the non-scheduled payment
   *
   * @var string
   */
  private $_note;

  /**
   * Set recurring payments profile ID
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_BillOutstandingAmount
   */
  public function setProfileId($value)
  {
    $this->_profileId = $value;
    return $this;
  }

  /**
   * Retrieve the recurring payments profile ID
   *
   * @return string
   */
  public function getProfileId()
  {
    return $this->_profileId;
  }

  /**
   * Set the amount to bill
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_BillOutstandingAmount
   */
  public function setAmount($value)
  {
    $this->_amount = $value;
    return $this;
  }

  /**
   * Retrieve the amount to bill
   *
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Set the reason for the non-scheduled payment
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_BillOutstandingAmount
   */
  public function setNote($value)
  {
    $this->_note = $value;
    return $this;
  }

  /**
   * Retrieve the reason for the non-scheduled payment
   *
   * @return string
   */
  public function getNote()
  {
    return $this->_note;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array(
      'PROFILEID' => $this->_profileId,
    );

    // Optional
    if (!empty($this->_amount))
      $array['AMT'] = $this->_amount;

    if (isset($this->_note))
      $array['NOTE'] = $this->_note;

    return $array;
  }
}
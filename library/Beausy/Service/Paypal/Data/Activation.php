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
class Beausy_Service_Paypal_Data_Activation extends Beausy_Service_Paypal_Data_Abstract
{
  const CANCELONFAILURE = 'CancelOnFailure';
  const CONTINUEONFAILURE = 'ContinueOnFailure';

  /**
   * Initial non-recurring payment amount due immediately upon
   * profile creation
   * @var string
   */
  private $_initAmount;

  /**
   * Action to take when the intial payment amount fails
   * for the pending profile
   * @var string
   */
  private $_failedInitAmountAction = self::CANCELONFAILURE;

  /**
   * Set initial non-recurring payment amount due immediately
   * upon profile creation
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Activation
   */
  public function setInitAmount($value)
  {
    $this->_initAmount = $value;
    return $this;
  }

  /**
   * Retrieve initial non-recurring payment amount due immediately
   * upon profile creation
   *
   * @return string
   */
  public function getInitAmount()
  {
    return $this->_initAmount;
  }

  /**
   * Set action to take when the intial payment amount fails
   * for the pending profile
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Activation
   */
  public function setFailedInitAmountAction($value)
  {
    switch ($value)
    {
    case self::CANCELONFAILURE: // fall-through
    case self::CONTINUEONFAILURE:
      $this->_failedInitAmountAction = $value;
      break;
    default:
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Initial payment amount failure action must be one of '" . self::CANCELONFAILURE . "' or '" . self::CONTINUEONFAILURE . "'");
    }

    return $this;
  }

  /**
   * Retrieve action to take when the intial payment amount fails
   * for the pending profile
   *
   * @return string
   */
  public function getFailedInitAmountAction($value)
  {
    return $this->_failedInitAmountAction;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // Optional
    if (isset($this->_initAmount))
      $array['INITAMT'] = $this->_initAmount;

    // Optional
    if (!empty($this->_failedInitAmountAction))
      $array['FAILEDINITAMTACTION'] = $this->_failedInitAmountAction;

    return $array;
  }
}
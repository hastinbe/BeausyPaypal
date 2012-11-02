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
class Beausy_Service_Paypal_Data_ManageRecurringPaymentsProfileStatus extends Beausy_Service_Paypal_Data_Abstract
{
  const ACTION_CANCEL     = 'Cancel';
  const ACTION_SUSPEND    = 'Suspend';
  const ACTION_REACTIVATE = 'Reactivate';

  /**
   * Recurring payments profile ID
   * @var string
   */
  private $_profileId;

  /**
   * The action to be performed to the recurring payments profile
   * @var string
   */
  private $_action;

  /**
   * (Optional) The reason for the change in status
   * @var string
   */
  private $_note;

  /**
   * Set the recurring payments profile ID
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_ManageRecurringPaymentsProfileStatus
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
   * Set the action to be performed to the recurring payments profile
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_ManageRecurringPaymentsProfileStatus
   */
  public function setAction($value)
  {
    if ($value != self::ACTION_CANCEL &&
        $value != self::ACTION_SUSPEND &&
        $value != self::ACTION_REACTIVATE)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception(
        "Action must be '" . self::ACTION_CANCEL . "', '" . self::ACTION_SUSPEND . "' or '" . self::ACTION_REACTIVATE . "'");
    }

    $this->_action = $value;
    return $this;
  }

  /**
   * Retrieve the action to be performed to the recurring payments profile
   *
   * @return string
   */
  public function getAction()
  {
    return $this->_action;
  }

  /**
   * Set the reason for the change in status
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_ManageRecurringPaymentsProfileStatus
   */
  public function setNote($value)
  {
    $this->_note = $value;
    return $this;
  }

  /**
   * Get the reason for the change in status
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
      'ACTION'    => $this->_action
    );

    // Optional
    if (!empty($this->_note))
      $array['NOTE'] = $this->_note;

    return $array;
  }
}
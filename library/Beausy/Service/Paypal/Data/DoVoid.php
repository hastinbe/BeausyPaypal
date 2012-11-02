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
class Beausy_Service_Paypal_Data_DoVoid extends Beausy_Service_Paypal_Data_Abstract
{
  /**
   * The original authorization ID specifying the authorization to void or, to void an order,
   * the order ID.
   *
   * IMPORTANT: If you are voiding a transaction that has been reauthorized, use the ID from the
   *            original authorization, and not the  reauthorization.
   *
   * @var string
   */
  private $_authorizationId;

  /**
   * (Optional) An informational note about this void that is displayed to the payer in email
   * and in his transaction history
   *
   * @var string
   */
  private $_note;

  /**
   * Set the original authorization ID specifying the authorization to void or, to void an order
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoVoid
   */
  public function setAuthorizationId($value)
  {
    $this->_authorizationId = $value;
    return $this;
  }

  /**
   * Get the original authorization ID specifying the authorization to void or, to void an order
   *
   * @return string
   */
  public function getAuthorizationId()
  {
    return $this->_authorizationId;
  }

  /**
   * Set the informational note about this void that is displayed to the payer in email
   * and in the transaction history
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoVoid
   */
  public function setNote($value)
  {
    $this->_note = $value;
    return $this;
  }

  /**
   * Get the informational note about this void that is displayed to the payer in email
   * and in the transaction history
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
    $array = array();

    $array['AUTHORIZATIONID'] = $this->_authorizationId;

    // Optional
    if (!empty($this->_note))
      $array['NOTE'] = $this->_note;

    return $array;
  }
}
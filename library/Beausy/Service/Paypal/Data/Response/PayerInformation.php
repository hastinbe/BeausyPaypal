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
class Beausy_Service_Paypal_Data_Response_PayerInformation extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Email address of payer
   * @var string
   */
  private $_email;

  /**
   * Payer's first name
   * @var string
   */
  private $_firstName;

  /**
   * Payer's last name
   * @var string
   */
  private $_lastName;

  /**
   * Set email address of payer
   *
   * @param string $email
   * @return Beausy_Service_Paypal_Data_Response_PayerInformation
   */
  public function setEmail($email)
  {
    $this->_email = $email;
    return $this;
  }

  /**
   * Retrieve email address of payer
   *
   * @return string
   */
  public function getEmail()
  {
    return $this->_email;
  }

  /**
   * Set payer's first name
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_PayerInformation
   */
  public function setFirstName($value)
  {
    $this->_firstName = $value;
    return $this;
  }

  /**
   * Retrieve payer's first name
   *
   * @return string
   */
  public function getFirstName()
  {
    return $this->_firstName;
  }

  /**
   * Set payer's last name
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_PayerInformation
   */
  public function setLastName($value)
  {
    $this->_lastName = $value;
    return $this;
  }

  /**
   * Retrieve payer's last name
   *
   * @return string
   */
  public function getLastName()
  {
    return $this->_lastName;
  }
}
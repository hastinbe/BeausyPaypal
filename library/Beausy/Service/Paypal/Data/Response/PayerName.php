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
class Beausy_Service_Paypal_Data_Response_PayerName extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Payer's salutation
   * @var string
   */
  private $_salutation;

  /**
   * Payer's first name
   * @var string
   */
  private $_firstName;

  /**
   * Payer's middle name
   * @var string
   */
  private $_middleName;

  /**
   * Payer's last name
   * @var string
   */
  private $_lastName;

  /**
   * Payer's suffix
   * @var string
   */
  private $_suffix;

  /**
   * Set payer's salutation
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PayerName
   */
  public function setSalutation($value)
  {
    $this->_salutation = $value;
    return $this;
  }

  /**
   * Retrieve payer's salutation
   *
   * @return string
   */
  public function getSalutation()
  {
    return $this->_salutation;
  }

  /**
   * Set payer's first name
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PayerName
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
   * Set payer's middle name
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PayerName
   */
  public function setMiddleName($value)
  {
    $this->_middleName = $value;
    return $this;
  }

  /**
   * Retrieve payer's middle name
   *
   * @return string
   */
  public function getMiddleName()
  {
    return $this->_middleName;
  }

  /**
   * Set payer's last name
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PayerName
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

  /**
   * Set payer's suffix
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PayerName
   */
  public function setSuffix($value)
  {
    $this->_suffix = $value;
    return $this;
  }

  /**
   * Retrieve payer's suffix
   *
   * @return string
   */
  public function getSuffix()
  {
    return $this->_suffix;
  }
}
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
class Beausy_Service_Paypal_Data_AddressVerify extends Beausy_Service_Paypal_Data_Abstract
{
  const EMAIL_MAX_LEN  = 255;
  const STREET_MAX_LEN = 35;
  const ZIP_MAX_LEN    = 16;

  /**
   * Email address of a PayPal member to verify.
   *
   * @var string
   */
  private $_email;

  /**
   * First line of the billing or shipping postal address to verify.
   *
   * @var string
   */
  private $_street;

  /**
   * Postal code to verify.
   *
   * @var string
   */
  private $_zip;

  /**
   * Set email address of a PayPal member to verify
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_AddressVerify
   */
  public function setEmail($value)
  {
    if (strlen($value) > self::EMAIL_MAX_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Email address cannot be more than ' . self::EMAIL_MAX_LEN . ' characters maximum');
    }

    $this->_email = $value;
    return $this;
  }

  /**
   * Retrieve the email address of a PayPal member to verify
   *
   * @return string
   */
  public function getEmail()
  {
    return $this->_email;
  }

  /**
   * Set first line of the billing or shipping postal address to verify
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_AddressVerify
   */
  public function setStreet($value)
  {
    if (strlen($value) > self::STREET_MAX_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Street cannot be more than ' . self::STREET_MAX_LEN . ' characters maximum');
    }

    $this->_street = $value;
    return $this;
  }

  /**
   * Retrieve the first line of the billing or shipping postal address to verify
   *
   * @return string
   */
  public function getStreet()
  {
    return $this->_street;
  }

  /**
   * Set the postal code to verify
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_AddressVerify
   */
  public function setZip($value)
  {
    if (strlen($value) > self::ZIP_MAX_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Postal code cannot be more than ' . self::ZIP_MAX_LEN . ' characters maximum');
    }

    $this->_zip = $value;
    return $this;
  }

  /**
   * Retrieve the postal code to verify
   *
   * @return string
   */
  public function getZip()
  {
    return $this->_zip;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    return array(
      'EMAIL'  => $this->_email,
      'STREET' => $this->_street,
      'ZIP'    => $this->_zip,
    );
  }
}
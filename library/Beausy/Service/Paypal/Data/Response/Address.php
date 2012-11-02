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
class Beausy_Service_Paypal_Data_Response_Address extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Company that maintains this address
   * @var string
   */
  private $_addressOwner;

  /**
   * Status of street address on file with PayPal
   * @var string
   */
  private $_addressStatus;

  /**
   * Person’s name associated with this address
   * @var string
   */
  private $_name;

  /**
   * First street address
   * @var string
   */
  private $_street;

  /**
   * Second street address
   * @var string
   */
  private $_street2;

  /**
   * Name of city
   * @var string
   */
  private $_city;

  /**
   * State or province
   * @var string
   */
  private $_state;

  /**
   * U.S. ZIP code or other country-specific postal code
   * @var string
   */
  private $_zip;

  /**
   * Country code
   * @var string
   */
  private $_countryCode;

  /**
   * Phone number
   * @var string
   */
  private $_phone;

  /**
   * Set company that maintains this address
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setAddressOwner($value)
  {
    $this->_addressOwner = $value;
    return $this;
  }

  /**
   * Retrieve company that maintains this address
   *
   * @return string
   */
  public function getAddressOwner()
  {
    return $this->_addressOwner;
  }

  /**
   * Set status of street address on file with PayPal
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setAddressStatus($value)
  {
    $this->_addressStatus = $value;
    return $this;
  }

  /**
   * Retrieve status of street address on file with PayPal
   *
   * @return string
   */
  public function getAddressStatus()
  {
    return $this->_addressStatus;
  }

  /**
   * Set person’s name associated with this address
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setName($value)
  {
    $this->_name = $value;
    return $this;
  }

  /**
   * Retrieve person’s name associated with this address
   *
   * @return string
   */
  public function getName()
  {
    return $this->_name;
  }

  /**
   * Set first street address
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setStreet($value)
  {
    $this->_street = $value;
    return $this;
  }

  /**
   * Retrieve first street address
   *
   * @return string
   */
  public function getStreet()
  {
    return $this->_street;
  }

  /**
   * Set second street address
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setStreet2($value)
  {
    $this->_street2 = $value;
    return $this;
  }

  /**
   * Retrieve second street address
   *
   * @return string
   */
  public function getStreet2()
  {
    return $this->_street2;
  }

  /**
   * Set name of city
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setCity($value)
  {
    $this->_city = $value;
    return $this;
  }

  /**
   * Retrieve name of city
   *
   * @return string
   */
  public function getCity()
  {
    return $this->_city;
  }

  /**
   * Set state or province
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setState($value)
  {
    $this->_state = $value;
    return $this;
  }

  /**
   * Retrieve state or province
   *
   * @return string
   */
  public function getState()
  {
    return $this->_state;
  }

  /**
   * Set U.S. ZIP code or other country-specific postal code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setZip($value)
  {
    $this->_zip = $value;
    return $this;
  }

  /**
   * Retrieve U.S. ZIP code or other country-specific postal code
   *
   * @return string
   */
  public function getZip()
  {
    return $this->_zip;
  }

  /**
   * Set country code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setCountryCode($value)
  {
    $this->_countryCode = $value;
    return $this;
  }

  /**
   * Retrieve country code
   *
   * @return string
   */
  public function getCountryCode()
  {
    return $this->_countryCode;
  }

  /**
   * Set phone number
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_Address
   */
  public function setPhone($value)
  {
    $this->_phone = $value;
    return $this;
  }

  /**
   * Retrieve phone number
   *
   * @return string
   */
  public function getPhone()
  {
    return $this->_phone;
  }
}
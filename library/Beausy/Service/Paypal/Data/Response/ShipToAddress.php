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
class Beausy_Service_Paypal_Data_Response_ShipToAddress extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Status of street address on file with Paypal
   * Note: only present in a Paypal response
   * @var string
   */
  private $_addressStatus;

  /**
   * Person's name assiciated with shopping address
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
   * Country name
   * @var string
   */
  private $_countryName;

  /**
   * Phone
   * @var string
   */
  private $_phone;

  /**
   * Set status of street address on file with Paypal
   *
   * @param string $status
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setAddressStatus($status)
  {
    $this->_addressStatus = $status;
    return $this;
  }

  /**
   * Retrieve status of street address on file with Paypal
   *
   * @return string
   */
  public function getAddressStatus()
  {
    return $this->_addressStatus;
  }

  /**
   * Set person's name
   *
   * @param string $name
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setName($name)
  {
    $this->_name = $name;
    return $this;
  }

  /**
   * Retrieve person's name
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
   * @param string $street
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setStreet($street)
  {
    $this->_street = $street;
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
   * @param string $street
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setStreet2($street)
  {
    $this->_street2 = $street;
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
   * @param string $city
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setCity($city)
  {
    $this->_city = $city;
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
   * @param string $state
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setState($state)
  {
    $this->_state = $state;
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
   * Set U.S. Zip code or other country-specific postal code
   *
   * @param string $zip
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setZip($zip)
  {
    $this->_zip = $zip;
    return $this;
  }

  /**
   * Retrieve U.S. Zip code or other country-specific postal code
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
   * @param string $countryCode
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setCountryCode($countryCode)
  {
    $this->_countryCode = $countryCode;
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
   * Set country name
   *
   * @param string $countryName
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setCountryName($countryName)
  {
    $this->_countryName = $countryName;
    return $this;
  }

  /**
   * Retrieve country name
   *
   * @return string
   */
  public function getCountryName()
  {
    return $this->_countryName;
  }

  /**
   * Set phone number
   *
   * @param string $phone
   * @return Beausy_Service_Paypal_Data_Response_ShipToAddress
   */
  public function setPhone($phone)
  {
    $this->_phone = $phone;
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
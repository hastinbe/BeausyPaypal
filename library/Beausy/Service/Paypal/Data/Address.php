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
class Beausy_Service_Paypal_Data_Address extends Beausy_Service_Paypal_Data_Abstract
{
  const STREET_MAX_LEN      = 100;
  const CITY_MAX_LEN        = 40;
  const STATE_MAX_LEN       = 40;
  const COUNTRYCODE_MAX_LEN = 2;
  const ZIP_MAX_LEN         = 20;
  const PHONE_MAX_LEN       = 20;

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
  private $_country = 'US';

  /**
   * Phone number
   * @var string
   */
  private $_phone;

  /**
   * Set first street address
   *
   * @param string $street
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setStreet($street)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($street) > self::STREET_MAX_LEN)
      $street = substr($street, 0, self::STREET_MAX_LEN);

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
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setStreet2($street)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($street) > self::STREET_MAX_LEN)
      $street = substr($street, 0, self::STREET_MAX_LEN);

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
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setCity($city)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($city) > self::CITY_MAX_LEN)
      $city = substr($city, 0, self::CITY_MAX_LEN);

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
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setState($state)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($state) > self::STATE_MAX_LEN)
      $state = substr($state, 0, self::STATE_MAX_LEN);

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
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setZip($zip)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($zip) > self::ZIP_MAX_LEN)
      $zip = substr($zip, 0, self::ZIP_MAX_LEN);

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
   * @param string $code
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setCountryCode($code)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($code) > self::COUNTRYCODE_MAX_LEN)
      $country = substr($code, 0, self::COUNTRYCODE_MAX_LEN);

    $this->_country = $code;
    return $this;
  }

  /**
   * Retrieve country code
   *
   * @return string
   */
  public function getCountryCode()
  {
    return $this->_country;
  }

  /**
   * Set phone number
   *
   * @param string $phone
   * @return Beausy_Service_Paypal_Data_Address
   */
  public function setPhone($phone)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($phone) > self::PHONE_MAX_LEN)
      $phone = substr($phone, 0, self::PHONE_MAX_LEN);

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

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // Required
    $array['STREET']      = $this->_street;
    $array['CITY']        = $this->_city;
    $array['STATE']       = $this->_state;
    $array['COUNTRYCODE'] = $this->_country;
    $array['ZIP']         = $this->_zip;

    // Optional
    if (!empty($this->_street2))
      $array['STREET2']   = $this->_street2;

    // Optional
    if (!empty($this->_phone))
      $array['PHONENUM']  = $this->_phone;

    return $array;
  }
}
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
class Beausy_Service_Paypal_Data_PayerInformation extends Beausy_Service_Paypal_Data_Abstract
{
  const EMAIL_MAX_LEN = 127;
  const PAYERID_MAX_LEN = 13;
  const PAYERSTATUS_VERIFIED = 'verified';
  const PAYERSTATUS_UNVERIFIED = 'unverified';
  const COUNTRYCODE_MAX_LEN = 2;
  const BUSINESS_MAX_LEN = 127;

  /**
   * Email address of payer
   * @var string
   */
  private $_email;

  /**
   * Unique Paypal customer account identification number
   * @var string
   */
  private $_payerId;

  /**
   * Status of payer
   * @var string
   */
  private $_payerStatus;

  /**
   * Payer's country of residence in the form of ISO standard 3166
   * two-character country codes
   * @var string
   */
  private $_countryCode;

  /**
   * Payer's business name
   * @var string
   */
  private $_business;

  /**
   * Set email address of payer
   *
   * @param string $email
   * @return Beausy_Service_Paypal_Data_PayerInformation
   */
  public function setEmail($email)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($email) > self::EMAIL_MAX_LEN)
      $email = substr($email, 0, self::EMAIL_MAX_LEN);
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
   * Set unique Paypal customer account identification number
   *
   * @param string $id
   * @return Beausy_Service_Paypal_Data_PayerInformation
   */
  public function setPayerId($id)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($id) > self::PAYERID_MAX_LEN)
      $id = substr($id, 0, self::PAYERID_MAX_LEN);
    $this->_payerId = $id;
    return $this;
  }

  /**
   * Retrieve unique Paypal customer account identification number
   *
   * @return string
   */
  public function getPayerId()
  {
    return $this->_payerId;
  }

  /**
   * Set status of payer
   *
   * @param string $status
   * @return Beausy_Service_Paypal_Data_PayerInformation
   */
  public function setPayerStatus($status)
  {
    switch ($status)
    {
    case self::PAYERSTATUS_VERIFIED: // fall-through
    case self::PAYERSTATUS_UNVERIFIED:
      $this->_payerStatus = $status;
      break;
    default:
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Payer status must be one of '" . self::PAYERSTATUS_VERIFIED . "' or '" . self::PAYERSTATUS_UNVERIFIED . "'");
    }

    return $this;
  }

  /**
   * Retrieve status of payer
   *
   * @return string
   */
  public function getPayerStatus()
  {
    return $this->_payerStatus;
  }

  /**
   * Set payer's country of residence in the form
   * of ISO standard 3166 two-character country codes
   *
   * @param string $code
   * @return Beausy_Service_Paypal_Data_PayerInformation
   */
  public function setCountryCode($code)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($code) > self::COUNTRYCODE_MAX_LEN)
      $code = substr($code, 0, self::COUNTRYCODE_MAX_LEN);
    $this->_countryCode = $code;
    return $this;
  }

  /**
   * Retrieve payer's country of residence in the form
   * of ISO standard 3166 two-character country codes
   *
   * @return string
   */
  public function getCountryCode()
  {
    return $this->_countryCode;
  }

  /**
   * Set payer's business name
   *
   * @param string $business
   * @return Beausy_Service_Paypal_Data_PayerInformation
   */
  public function setBusiness($business)
  {
    /* Truncate if business name exceeds the maximum */
    if (strlen($business) > self::BUSINESS_MAX_LEN)
      $business = substr($business, 0, self::BUSINESS_MAX_LEN);

    $this->_business = $business;
    return $this;
  }

  /**
   * Retrieve payer's business name
   *
   * @return string
   */
  public function getBusiness()
  {
    return $this->_business;
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
    $array['EMAIL'] = $this->_email;

    // Optional
    if (isset($this->_payerId))
      $array['PAYERID'] = $this->_payerId;

    // Optional
    if (!empty($this->_payerStatus))
      $array['PAYERSTATUS'] = $this->_payerStatus;

    // Optional
    if (!empty($this->_countryCode))
      $array['COUNTRYCODE'] = $this->_countryCode;

    // Optional
    if (!empty($this->_business))
      $array['BUSINESS'] = $this->_business;

    return $array;
  }
}
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
class Beausy_Service_Paypal_Data_RPProfileDetails extends Beausy_Service_Paypal_Data_Abstract
{
  const SUBSCRIBER_NAME_MAX_LEN   = 32;
  const PROFILE_REFERENCE_MAX_LEN = 127;

  /**
   * (Optional) Full name of person receiving the product or service paid for by the recurring
   * payment. If not present, the name in the buyer's PayPal account is used.
   *
   * @var string
   */
  private $_subscriberName;

  /**
   * (Required) The date when billing for this profile begins. Must be a valid date, in UTC/GMT format.
   *
   * @var string
   */
  private $_profileStartDate;

  /**
   * (Optional) The merchant's own unique reference or invoice number.
   *
   * @var string
   */
  private $_profileReference;

  /**
   * Set subscriber name
   *
   * @param string $name Full name of person
   * @return Beausy_Service_Paypal_Data_RPProfileDetails
   */
  public function setSubscriberName($name)
  {
    /* Truncate name if it exceeds the maximum */
    if (strlen($name) > self::SUBSCRIBER_NAME_MAX_LEN)
      $name = substr($name, 0, self::SUBSCRIBER_NAME_MAX_LEN);

    $this->_subscriberName = $name;
    return $this;
  }

  /**
   * Retrieve subscriber name
   *
   * @return string
   */
  public function getSubscriberName()
  {
    return $this->_subscriberName;
  }

  /**
   * Set date when billing for this profile begins
   *
   * @param string $date Date when billing begins
   * @return Beausy_Service_Paypal_Data_RPProfileDetails
   */
  public function setProfileStartDate($date)
  {
    if (!Zend_Date::isDate($date, Zend_Date::ISO_8601) &&
        !Zend_Date::isDate($date))
    {
      require_once 'Beausy/Service/Paypal/Data/Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Profile start date must be a valid date in UTC/GMT format: " . $date);
    }

    $this->_profileStartDate = $date;
    return $this;
  }

  /**
   * Retrieve date when billing for this profile begins
   *
   * @return string
   */
  public function getProfileStartDate()
  {
    return $this->_profileStartDate;
  }

  /**
   * Set the merchant's own unique reference or invoice number
   *
   * @param string $value Merchant's own unique reference or invoice number
   * @return Beausy_Service_Paypal_Data_RPProfileDetails
   */
  public function setProfileReference($value)
  {
    /* Truncate value if it exceeds the maximum */
    if (strlen($value) > self::PROFILE_REFERENCE_MAX_LEN)
      $value = substr($value, 0, self::PROFILE_REFERENCE_MAX_LEN);

    $this->_profileReference = $value;
    return $this;
  }

  /**
   * Retrieve merchant's own unique reference or invoice number
   *
   * @return string
   */
  public function getProfileReference()
  {
    return $this->_profileReference;
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
    $array['PROFILESTARTDATE'] = $this->_profileStartDate;

    // Optional
    if (!empty($this->_subscriberName))
      $array['SUBSCRIBERNAME'] = $this->_subscriberName;

    // Optional
    if (!empty($this->_profileReference))
      $array['PROFILEREFERENCE'] = $this->_profileReference;

    return $array;
  }
}
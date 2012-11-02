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
class Beausy_Service_Paypal_Data_PayerName extends Beausy_Service_Paypal_Data_Abstract
{
  const SALUTATION_MAX_LEN = 20;
  const FIRSTNAME_MAX_LEN = 25;
  const MIDDLENAME_MAX_LEN = 25;
  const LASTNAME_MAX_LEN = 25;
  const SUFFIX_MAX_LEN = 12;

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

  public function setSalutation($value)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($value) > self::SALUTATION_MAX_LEN)
      $value = substr($value, 0, self::SALUTATION_MAX_LEN);
    $this->_salutation = $value;
    return $this;
  }

  public function getSalutation()
  {
    return $this->_salutation;
  }

  public function setFirstName($name)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($name) > self::FIRSTNAME_MAX_LEN)
      $name = substr($name, 0, self::FISTNAME_MAX_LEN);
    $this->_firstName = $name;
    return $this;
  }

  public function getFirstName()
  {
    return $this->_firstName;
  }

  public function setMiddleName($name)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($name) > self::MIDDLENAME_MAX_LEN)
      $name = substr($name, 0, self::MIDDLENAME_MAX_LEN);
    $this->_middleName = $name;
    return $this;
  }

  public function getMiddleName()
  {
    return $this->_middleName;
  }

  public function setLastName($name)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($name) > self::LASTNAME_MAX_LEN)
      $name = substr($name, 0, self::LASTNAME_MAX_LEN);
    $this->_lastName = $name;
    return $this;
  }

  public function getLastName()
  {
    return $this->_lastName;
  }

  public function setSuffix($suffix)
  {
    /* Truncate if exceeds the maximum */
    if (strlen($suffix) > self::SUFFIX_MAX_LEN)
      $suffix = substr($suffix, 0, self::SUFFIX_MAX_LEN);
    $this->_suffix = $suffix;
    return $this;
  }

  public function getSuffix()
  {
    return $this->_suffix;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // All fields are optional
    if (!empty($this->_salutation))
      $array['SALUTATION'] = $this->_salutation;

    if (!empty($this->_firstName))
      $array['FIRSTNAME'] = $this->_firstName;

    if (!empty($this->_middleName))
      $array['MIDDLENAME'] = $this->_middleName;

    if (!empty($this->_lastName))
      $array['LASTNAME'] = $this->_lastName;

    if (!empty($this->_suffix))
      $array['SUFFIX'] = $this->_suffix;

    return $array;
  }
}
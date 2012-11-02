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
class Beausy_Service_Paypal_Data_CreditCardDetails extends Beausy_Service_Paypal_Data_Abstract
{
  const VISA = 'Visa';
  const MASTERCARD = 'MasterCard';
  const DISCOVER = 'Discover';
  const AMEX = 'Amex';
  const MAESTRO = 'Maestro';
  const SOLO = 'Solo';

  const STARTDATE_LEN = 6;
  const ISSUENUMBER_MAX_LEN = 2;

  /**
   * Type of credit card
   * @var string
   */
  private $_type;

  /**
   * Credit card number
   * @var string
   */
  private $_number;

  /**
   * Credit card expiration date in MMYYYY format
   * @var string
   */
  private $_expirationDate;

  /**
   * Credit card verification value, version 2
   * @var string
   */
  private $_cvv2;

  /**
   * Month and year that Maestro or Solo card was issue in MMYYYY format
   * @var string
   */
  private $_startDate;

  /**
   * Issue number of Maestro or Solo card
   * @var string
   */
  private $_issueNumber;

  /**
   * Set credit card type
   *
   * @param string $type
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setType($type)
  {
    switch ($type)
    {
    case self::VISA:        // fall-through
    case self::MASTERCARD:  // fall-through
    case self::DISCOVER:    // fall-through
    case self::AMEX:        // fall-through
    case self::MAESTRO:     // fall-through
    case self::SOLO:
      $this->_type = $type;
      break;
    default:
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Credit card type must be one of '" .
        self::VISA . "', '" . self::MASTERCARD  . "', '" . self::DISCOVER . "', '" .
        self::AMEX . "', '" . self::MAESTRO     . "', '" . self::SOLO     . "'");
    }
    return $this;
  }

  /**
   * Retrieve credit card type
   *
   * @return string
   */
  public function getType()
  {
    return $this->_type;
  }

  /**
   * Set credit card number
   *
   * @param string $number
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setNumber($number)
  {
    $this->_number = $number;
    return $this;
  }

  /**
   * Retrieve credit card number
   *
   * @return string
   */
  public function getNumber()
  {
    return $this->_number;
  }

  /**
   * Set credit card expiration date
   *
   * @param string $date
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setExpirationDate($date)
  {
    $this->_expirationDate = $date;
    return $this;
  }

  /**
   * Retrieve credit card expiration date
   *
   * @return string
   */
  public function getExpirationDate()
  {
    return $this->_expiration;
  }

  /**
   * Set credit card verification value, version 2
   *
   * @param string $cvv2
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setCvv2($cvv2)
  {
    $this->_cvv2 = $cvv2;
    return $this;
  }

  /**
   * Retrieve credit card verification value, version 2
   *
   * @return string
   */
  public function getCvv2()
  {
    return $this->_cvv2;
  }

  /**
   * Set month and year Maestro or Solo card was issued
   *
   * @param string $date A date in MMYYYY format
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setStartDate($date)
  {
    if (strlen($date) > self::STARTDATE_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Start date must be exactly ' . self::STARTDATE_LEN . ' digits long, including leading zero');
    }

    $this->_startDate = $date;
    return $this;
  }

  /**
   * Retrieve month and year Maestro or Solo card was issued
   *
   * @return string
   */
  public function getStartDate()
  {
    return $this->_startDate;
  }

  /**
   * Set issue number of Maestro or Solo card
   *
   * @param string $number
   * @return Beausy_Service_Paypal_Data_CreditCardDetails
   */
  public function setIssueNumber($number)
  {
    if (strlen($number) > self::ISSUENUMBER_MAX_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Issue number cannot be more than ' . self::ISSUENUMBER_MAX_LEN . ' digits maximum');
    }

    $this->_issueNumber = $number;
    return $this;
  }

  /**
   * Retrieve issue number of Maestro or Solo card
   *
   * @return string
   */
  public function getIssueNumber()
  {
    return $this->_issueNumber;
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
    $array['CREDITCARDTYPE'] = $this->_type;
    $array['ACCT'] = $this->_number;

    // Required if using recurring payments with direct payments
    $array['EXPDATE'] = $this->_expirationDate;

    // Optional - Merchant account settings determine if this is required
    $array['CVV2'] = $this->_cvv2;

    // Optional
    if ($this->_type == self::MAESTRO ||
        $this->_type == self::SOLO)
      if (!empty($this->_startDate))
        $array['STARTDATE'] = $this->_startDate;

    // Optional
    if ($this->_type == self::MAESTRO ||
        $this->_type == self::SOLO)
      if (isset($this->_issueNumber))
        $array['ISSUENUMBER'] = $this->_issueNumber;

    return $array;
  }
}
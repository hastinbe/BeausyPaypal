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
class Beausy_Service_Paypal_Data_Response_CreditCardDetails extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Type of credit card
   * @var string
   */
  private $_type;

  /**
   * Credit card number -- last 4 digits
   * @var string
   */
  private $_number;

  /**
   * Credit card expiration date in MMYYYY format
   * @var string
   */
  private $_expirationDate;

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
   * @return Beausy_Service_Paypal_Data_Response_CreditCardDetails
   */
  public function setType($type)
  {
    $this->_type = $type;
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
   * @return Beausy_Service_Paypal_Data_Response_CreditCardDetails
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
   * @return Beausy_Service_Paypal_Data_Response_CreditCardDetails
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
   * Set month and year Maestro or Solo card was issued
   *
   * @param string $date A date in MMYYYY format
   * @return Beausy_Service_Paypal_Data_Response_CreditCardDetails
   */
  public function setStartDate($date)
  {
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
   * @return Beausy_Service_Paypal_Data_Response_CreditCardDetails
   */
  public function setIssueNumber($number)
  {
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
}
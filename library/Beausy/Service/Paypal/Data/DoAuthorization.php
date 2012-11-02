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
class Beausy_Service_Paypal_Data_DoAuthorization extends Beausy_Service_Paypal_Data_Abstract
{
  const TRANSACTIONID_MAX_LEN = 19;

  /**
   * Value of the order’s transaction identification number returned by PayPal
   *
   * @var string
   */
  private $_transactionId;

  /**
   * Amount to authorize
   *
   * @var string
   */
  private $_amount;

  /**
   * Type of transaction to authorize
   *
   * @var string
   */
  private $_transactionEntity;

  /**
   * A three-character currency code
   *
   * @var string
   */
  private $_currencyCode;

  /**
   * Set the order’s transaction identification number returned by PayPal
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoAuthorization
   */
  public function setTransactionId($value)
  {
    if (strlen($value) > self::TRANSACTIONID_MAX_LEN)
    {
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception('Transaction ID cannot be more than ' . self::EMAIL_MAX_LEN . ' characters maximum');
    }

    $this->_transactionId = $value;
    return $this;
  }

  /**
   * Retrieve the order’s transaction identification number returned by PayPal
   *
   * @return string
   */
  public function getTransactionId()
  {
    return $this->_transactionId;
  }

  /**
   * Set amount to authorize
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoAuthorization
   */
  public function setAmount($value)
  {
    $this->_amount = $value;
    return $this;
  }

  /**
   * Retrieve the amount to authorize
   *
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Set type of transaction to authorize
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoAuthorization
   */
  public function setTransactionEntity($value)
  {
    $this->_transactionEntity = $value;
    return $this;
  }

  /**
   * Retrieve the type of transaction to authorize
   *
   * @return string
   */
  public function getTransactionEntity()
  {
    return $this->_transactionEntity;
  }

  /**
   * Set the three-character currency code
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_DoAuthorization
   */
  public function setCurrencyCode($value)
  {
    $this->_currencyCode = $value;
    return $this;
  }

  /**
   * Retrieve the three-character currency code
   *
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->_currencyCode;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array(
      'TRANSACTIONID' => $this->_transactionId,
      'AMT'           => $this->_amount,
    );

    if (!empty($this->_transactionEntity))
      $array['TRANSACTIONENTITY'] = $this->_transactionEntity;

    if (!empty($this->_currencyCode))
      $array['CURRENCYCODE'] = $this->_currencyCode;

    return $array;
  }
}
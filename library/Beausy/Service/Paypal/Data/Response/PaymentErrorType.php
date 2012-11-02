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
class Beausy_Service_Paypal_Data_Response_PaymentErrorType extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Payment error short message
   * @var string
   */
  private $_shortMessage;

  /**
   * Payment error long message
   * @var string
   */
  private $_longMessage;

  /**
   * Payment error code
   * @var string
   */
  private $_errorCode;

  /**
   * Payment error severity code
   * @var string
   */
  private $_severityCode;

  /**
   * Application-specific error values indicating more about the error condition
   * @var string
   */
  private $_ack;

  /**
   * Set Payment error short message
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setShortMessage($value)
  {
    $this->_shortMessage = $value;
    return $this;
  }

  /**
   * Retrieve Payment error short message
   *
   * @return string
   */
  public function getShortMessage()
  {
    return $this->_shortMessage;
  }

  /**
   * Set Payment error long message
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setLongMessage($value)
  {
    $this->_longMessage = $value;
    return $this;
  }

  /**
   * Retrieve Payment error long message
   *
   * @return string
   */
  public function getLongMessage()
  {
    return $this->_longMessage;
  }

  /**
   * Set Payment error code
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setErrorCode($value)
  {
    $this->_errorCode = $value;
    return $this;
  }

  /**
   * Retrieve Payment error code
   *
   * @return string
   */
  public function getErrorCode()
  {
    return $this->_errorCode;
  }

  /**
   * Set Payment error severity code
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setSeverityCode($value)
  {
    $this->_severityCode = $value;
    return $this;
  }

  /**
   * Retrieve Payment error severity code
   *
   * @return string
   */
  public function getSeverityCode()
  {
    return $this->_severityCode;
  }

  /**
   * Set Application-specific error values indicating more about the error condition
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setAck($value)
  {
    $this->_ack = $value;
    return $this;
  }

  /**
   * Retrieve Application-specific error values indicating more about the error condition
   *
   * @return string
   */
  public function getAck()
  {
    return $this->_ack;
  }
}
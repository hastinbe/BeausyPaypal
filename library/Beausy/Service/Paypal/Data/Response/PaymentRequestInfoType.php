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
class Beausy_Service_Paypal_Data_Response_PaymentRequestInfoType extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Transaction ID for a bucket of 1 to 10 parallel payment requests
   * @var string
   */
  private $_transactionId;

  /**
   * Payment request ID for a parallel payment in the bucket of 1 to 10 parallel payment requests
   * @var string
   */
  private $_paymentRequestId;

  /**
   * Set Transaction ID for a bucket of 1 to 10 parallel payment requests
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_PaymentRequestInfoType
   */
  public function setTransactionId($value)
  {
    $this->_transactionId = $value;
    return $this;
  }

  /**
   * Retrieve Transaction ID for a bucket of 1 to 10 parallel payment requests
   *
   * @return string
   */
  public function getTransactionId()
  {
    return $this->_transactionId;
  }

  /**
   * Set Payment request ID for a parallel payment in the bucket of 1 to 10 parallel payment requests
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_PaymentRequestInfoType
   */
  public function setPaymentRequestId($value)
  {
    $this->_paymentRequestId = $value;
    return $this;
  }

  /**
   * Retrieve Payment request ID for a parallel payment in the bucket of 1 to 10 parallel payment requests
   *
   * @return string
   */
  public function getPaymentRequestId()
  {
    return $this->_paymentRequestId;
  }
}
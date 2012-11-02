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
class Beausy_Service_Paypal_Data_Response_SellerDetailsType extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Unique identifier for the merchant
   * @var string
   */
  private $_sellerPaypalAccountId;

  /**
   * Unique PayPal customer account number (of the seller)
   * @var string
   */
  private $_secureMerchantAccountId;

  /**
   * Set Unique identifier for the merchant
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setSellerPaypalAccountId($value)
  {
    $this->_sellerPaypalAccountId = $value;
    return $this;
  }

  /**
   * Retrieve Unique identifier for the merchant
   *
   * @return string
   */
  public function getSellerPaypalAccountId()
  {
    return $this->_sellerPaypalAccountId;
  }

  /**
   * Set Unique PayPal customer account number (of the seller)
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_PaymentErrorType
   */
  public function setSecureMerchantAccountId($value)
  {
    $this->_secureMerchantAccountId = $value;
    return $this;
  }

  /**
   * Retrieve Unique PayPal customer account number (of the seller)
   *
   * @return string
   */
  public function getSecureMerchantAccountId()
  {
    return $this->_secureMerchantAccountId;
  }
}
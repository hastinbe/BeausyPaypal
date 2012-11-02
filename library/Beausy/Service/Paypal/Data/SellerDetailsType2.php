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
class Beausy_Service_Paypal_Data_SellerDetailsType2 extends Beausy_Service_Paypal_Data_Abstract
{
  /**
   * Seller payment index
   * @var integer
   */
  private $_paymentIndex = 0;

  /**
   * Unique identifier for the merchant
   * @var string
   */
  private $_sellerPaypalAccountId;


  /**
   * Set seller payment index
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_SellerDetailsType
   */
  public function setPaymentIndex($value)
  {
    $value = (int) $value;
    $this->_paymentIndex = $value;
    return $this;
  }

  /**
   * Retrieve seller payment index
   * @return string
   */
  public function getPaymentIndex()
  {
    return $this->_paymentIndex;
  }

  /**
   * Set Unique identifier for the merchant
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_SellerDetailsType
   */
  public function setSellerPaypalAccountId($value)
  {
    $this->_sellerPaypalAccountId = $value;
    return $this;
  }

  /**
   * Retrieve Unique identifier for the merchant
   * @return string
   */
  public function getSellerPaypalAccountId()
  {
    return $this->_sellerPaypalAccountId;
  }

  /**
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // Optional fields (key=PayPal field name, value=internal variable name)
    $optional = array(
      array('prefix' => 'PAYMENTREQUEST', 'suffix' => 'SELLERID',               'variable' => '_sellerId'),
      array('prefix' => 'PAYMENTREQUEST', 'suffix' => 'SELLERUSERNAME',         'variable' => '_sellerUsername'),
      array('prefix' => 'PAYMENTREQUEST', 'suffix' => 'SELLERREGISTRATIONDATE', 'variable' => '_sellerRegistrationDate'),
    );

    // Apply optional options and append item index number to each key as required by the PayPal API
    foreach($optional as $option)
      if (isset($this->$option['variable']))
        $array[$option['prefix'] . $this->_itemIndex . $option['suffix']] = $this->$option['variable'];

    return $array;
  }
}
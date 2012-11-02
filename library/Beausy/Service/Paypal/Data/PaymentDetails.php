<?php
/**
 * @see Beausy_Service_Paypal_Data_Abstract
 */
require_once 'Beausy/Service/Paypal/Data/Abstract.php';

/**
 * @see Beausy_Service_Paypal_Currency
 */
require_once 'Beausy/Service/Paypal/Currency.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Data_PaymentDetails extends Beausy_Service_Paypal_Data_Abstract
{
  /**
   * The total cost of the transaction to the customer. If shipping cost and tax charges are known,
   * include them in this value; if not, this value should be the current sub-total of the order
   * @var string
   */
  private $_amount;

  /**
   * A three-character currency code
   * @var string
   */
  private $_currencyCode = 'USD'; // Paypal defaults to USD

  /**
   * Sum of cost of all items in this order (required if you specify L_AMTn)
   * @var string
   */
  private $_itemAmount;

  /**
   * Total shipping costs for this order
   * @var string
   */
  private $_shippingAmount;

  /**
   * Total shipping insurance costs for this order
   * @var string
   */
  private $_insuranceAmount;

  /**
   * Shipping discount for this order, specified as a negative number
   * @var string
   */
  private $_shippingDiscountAmount;

  /**
   * Total handling costs for this order. You must also specify a value for ITEMAMT
   * @var string
   */
  private $_handlingAmount;

  /**
   * Sum of tax for all items in this order (required if you specify L_TAXAMTn)
   * @var string
   */
  private $_taxAmount;

  /**
   * Description of items the customer is purchasing
   * @var string
   */
  private $_description;

  /**
   * A free-form field for your own use
   * @var string
   */
  private $_custom;

  /**
   * Your own invoice or tracking number
   * @var string
   */
  private $_invoiceNumber;

  /**
   * An identification code for use by third-party applications to identify transactions
   * @var string
   */
  private $_buttonSource;

  /**
   * Your URL for receiving Instant Payment Notification (IPN) about this transaction.
   * The notify URL only applies to DoExpressCheckoutPayment
   * @var string
   */
  private $_notifyUrl;

  /**
   * Set
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setAmount($value)
  {
    $this->_amount = $value;
    return $this;
  }

  /**
   * Retrieve
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Set three-character currency code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setCurrencyCode($value)
  {
    if (Beausy_Service_Paypal_Currency::isValid($value))
    {
      $this->_currencyCode = $value;
      return $this;
    }
    else {
      require_once 'Beausy_Service_Paypal_Exception.php';
      throw new Beausy_Service_Paypal_Exception('Specified currency code is either invalid or not supported by Paypal.');
    }
  }

  /**
   * Retrieve three-character currency code
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->_currencyCode;
  }

  /**
   * Set the sum of cost of all items in this order
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setItemAmount($value)
  {
    $this->_itemAmount = $value;
    return $this;
  }

  /**
   * Retrieve the sum of cost of all items in this order
   * @return string
   */
  public function getItemAmount()
  {
    return $this->_itemAmount;
  }

  /**
   * Set the total shipping costs for this order
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setShippingAmount($value)
  {
    $this->_shippingAmount = $value;
    return $this;
  }

  /**
   * Retrieve the total shipping costs for this order
   * @return string
   */
  public function getShippingAmount()
  {
    return $this->_shippingAmount;
  }

  /**
   * Set the total shipping insurance costs for this order
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setInsuranceAmount($value)
  {
    $this->_insuranceAmount = $value;
    return $this;
  }

  /**
   * Retrieve the total shipping insurance costs for this order
   * @return string
   */
  public function getInsuranceAmount()
  {
    return $this->_insuranceAmount;
  }

  /**
   * Set the shipping discount for this order, specified as a negative number
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setShippingDiscountAmount($value)
  {
    $this->_shippingDiscountAmount = $value;
    return $this;
  }

  /**
   * Retrieve the shipping discount for this order, specified as a negative number
   * @return string
   */
  public function getShippingDiscountAmount()
  {
    return $this->_shippingDiscountAmount;
  }

  /**
   * Set the total handling costs for this order
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setHandlingAmount($value)
  {
    $this->_handlingAmount = $value;
    return $this;
  }

  /**
   * Retrieve the total handling costs for this order
   * @return string
   */
  public function getHandlingAmount()
  {
    return $this->_handlingAmount;
  }

  /**
   * Set the sum of tax for all items in this order
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setTaxAmount($value)
  {
    $this->_taxAmount = $value;
    return $this;
  }

  /**
   * Retrieve the sum of tax for all items in this order
   * @return string
   */
  public function getTaxAmount()
  {
    return $this->_taxAmount;
  }

  /**
   * Set the description of items the customer is purchasing
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setDescription($value)
  {
    $this->_description = $value;
    return $this;
  }

  /**
   * Retrieve the description of items the customer is purchasing
   * @return string
   */
  public function getDescription()
  {
    return $this->_description;
  }

  /**
   * Set the free-form field for your own use
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setCustom($value)
  {
    $this->_custom = $value;
    return $this;
  }

  /**
   * Retrieve the free-form field for your own use
   * @return string
   */
  public function getCustom()
  {
    return $this->_custom;
  }

  /**
   * Set the invoice or tracking number
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setInvoiceNumber($value)
  {
    $this->_invoiceNumber = $value;
    return $this;
  }

  /**
   * Retrieve the invoice or tracking number
   * @return string
   */
  public function getInvoiceNumber()
  {
    return $this->_invoiceNumber;
  }

  /**
   * Set the identification code for use by third-party applications to identify transactions
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setButtonSource($value)
  {
    $this->_buttonSource = $value;
    return $this;
  }

  /**
   * Retrieve the identification code for use by third-party applications to identify transactions
   * @return string
   */
  public function getButtonSource()
  {
    return $this->_buttonSource;
  }

  /**
   * Set the URL for receiving Instant Payment Notification (IPN) about this transaction
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_PaymentDetails
   */
  public function setNotifyUrl($value)
  {
    $this->_notifyUrl = $value;
    return $this;
  }

  /**
   * Retrieve the URL for receiving Instant Payment Notification (IPN) about this transaction
   * @return string
   */
  public function getNotifyUrl()
  {
    return $this->_notifyUrl;
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
    $array['AMT'] = $this->_amount;

    // If currency is empty attempt to get it from locale
    if (empty($this->_currencyCode))
    {
      $currency = new Beausy_Service_Paypal_Currency();
      $array['CURRENCYCODE'] = $currency->getShortName();
    }
    else {
      $array['CURRENCYCODE'] = $this->_currencyCode;
    }

    // Optional fields (key=PayPal field name, value=internal variable name)
    $optional = array(
      'ITEMAMT'       => '_itemAmount',
      'SHIPPINGAMT'   => '_shippingAmount',
      'INSURANCEAMT'  => '_insuranceAmount',
      'SHIPDISCAMT'   => '_shippingDiscountAmount',
      'HANDLINGAMT'   => '_handlingAmount',
      'TAXAMT'        => '_taxAmount',
      'DESC'          => '_description',
      'CUSTOM'        => '_custom',
      'INVNUM'        => '_invoiceNumber',
      'BUTTONSOURCE'  => '_buttonSource',
      'NOTIFYURL'     => '_notifyUrl');

    // Apply optional options
    foreach($optional as $option => $value)
      if (isset($this->$value))
        $array[$option] = $this->$value;

    return $array;
  }
}
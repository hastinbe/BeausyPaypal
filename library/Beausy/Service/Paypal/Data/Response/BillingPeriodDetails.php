<?php
/**
 * @see Beausy_Service_Paypal_Data_Abstract
 */
require_once 'Beausy/Service/Paypal/Data/Response/Abstract.php';

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
class Beausy_Service_Paypal_Data_Response_BillingPeriodDetails extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Unit for billing during this subscription period
   * @var string
   */
  private $_billingPeriod;

  /**
   * Unit for billing during this regular subscription period
   * @var string
   */
  private $_regularBillingPeriod;

  /**
   * Number of billing periods that make up one billing cycle
   * @var integer
   */
  private $_billingFrequency;

  /**
   * Number of billing periods that make up one regular billing cycle
   * @var integer
   */
  private $_regularBillingFrequency;

  /**
   * Number of billing cycles for payment period
   * @var integer
   */
  private $_totalBillingCycles;

  /**
   * Number of billing cycles for the regular payment period
   * @var integer
   */
  private $_regularTotalBillingCycles;

  /**
   * Billing amount for each billing cycle during this payment period
   * @var string
   */
  private $_amount;

  /**
   * Billing amount for each billing cycle during this regular payment period
   * @var string
   */
  private $_regularAmount;

  /**
   * Shipping amount for each billing cycle during this payment period
   * @var string
   */
  private $_shippingAmount;

  /**
   * Shipping amount for each billing cycle during this regular payment
   * period
   * @var string
   */
  private $_regularShippingAmount;

  /**
   * Tax amount for each billing cycle during this payment period
   * @var string
   */
  private $_taxAmount;

  /**
   * Tax amount for each billing cycle during this regular payment period
   * @var string
   */
  private $_regularTaxAmount;

   /**
   * A three-character currency code
   * @var string
   */
  private $_currencyCode;

  /**
   * A three-character currency code
   * @var string
   */
  private $_regularCurrencyCode;

  /**
   * Set unit for billing during this subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setBillingPeriod($value)
  {
    $this->_billingPeriod = $value;
    return $this;
  }

  /**
   * Retrieve unit for billing during this subscription period
   * @return string
   */
  public function getBillingPeriod()
  {
    return $this->_billingPeriod;
  }

  /**
   * Set unit for billing during this regular subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularBillingPeriod($value)
  {
    $this->_regularBillingPeriod = $value;
    return $this;
  }

  /**
   * Retrieve unit for billing during this regular subscription period
   * @return string
   */
  public function getRegularBillingPeriod()
  {
    return $this->_regularBillingPeriod;
  }

  /**
   * Set number of billing periods that make up one billing cycle
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setBillingFrequency($value)
  {
    $this->_billingFrequency = $value;
    return $this;
  }

  /**
   * Retrieve number of billing periods that make up one billing cycle
   * @return integer
   */
  public function getBillingFrequency()
  {
    return $this->_billingFrequency;
  }

  /**
   * Set number of billing periods that make up one regular billing cycle
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularBillingFrequency($value)
  {
    $this->_regularBillingFrequency = $value;
    return $this;
  }

  /**
   * Retrieve number of billing periods that make up one regular
   * billing cycle
   * @return integer
   */
  public function getRegularBillingFrequency()
  {
    return $this->_regularBillingFrequency;
  }

  /**
   * Set number of billing cycles for payment period
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTotalBillingCycles($value)
  {
    $this->_totalBillingCycles = $value;
    return $this;
  }

  /**
   * Retrieve number of billing cycles for payment period
   * @return integer
   */
  public function getTotalBillingCycles()
  {
    return $this->_totalBillingCycles;
  }

  /**
   * Set number of billing cycles for the regular payment period
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularTotalBillingCycles($value)
  {
    $this->_regularTotalBillingCycles = $value;
    return $this;
  }

  /**
   * Retrieve number of billing cycles for the regular payment period
   * @return integer
   */
  public function getRegularTotalBillingCycles()
  {
    return $this->_regularTotalBillingCycles;
  }

  /**
   * Set billing amount for each billing cycle during this payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setAmount($value)
  {
    $this->_amount = $value;
    return $this;
  }

  /**
   * Retrieve billing amount for each billing cycle during
   * this payment period
   *
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Set billing amount for each billing cycle during this
   * regular payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularAmount($value)
  {
    $this->_regularAmount = $value;
    return $this;
  }

  /**
   * Retrieve billing amount for each billing cycle during
   * this regular payment period
   * @return string
   */
  public function getRegularAmount()
  {
    return $this->_regularAmount;
  }

  /**
   * Set shipping amount for each billing cycle during this payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setShippingAmount($value)
  {
    $this->_shippingAmount = $value;
    return $this;
  }

  /**
   * Retrieve shipping amount for each billing cycle during
   * this payment period
   * @return string
   */
  public function getShippingAmount()
  {
    return $this->_shippingAmount;
  }

  /**
   * Set shipping amount for each billing cycle during this
   * regular payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularShippingAmount($value)
  {
    $this->_regularShippingAmount = $value;
    return $this;
  }

  /**
   * Retrieve shipping amount for each billing cycle during
   * this regular payment period
   * @return string
   */
  public function getRegularShippingAmount()
  {
    return $this->_regularShippingAmount;
  }

  /**
   * Set tax amount for each billing cycle during this payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTaxAmount($value)
  {
    $this->_taxAmount = $value;
    return $this;
  }

  /**
   * Retrieve tax amount for each billing cycle during this payment period
   * @return string
   */
  public function getTaxAmount()
  {
    return $this->_taxAmount;
  }

  /**
   * Set tax amount for each billing cycle during this regular payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularTaxAmount($value)
  {
    $this->_regularTaxAmount = $value;
    return $this;
  }

  /**
   * Retrieve tax amount for each billing cycle during this regular
   * payment period
   *
   * @return string
   */
  public function getRegularTaxAmount()
  {
    return $this->_regularTaxAmount;
  }

  /**
   * Set three-character currency code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setCurrencyCode($value)
  {
    $this->_currencyCode = $value;
    return $this;
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
   * Set three-character currency code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setRegularCurrencyCode($value)
  {
    $this->_regularCurrencyCode = $value;
    return $this;
  }

  /**
   * Retrieve three-character currency code
   * @return string
   */
  public function getRegularCurrencyCode()
  {
    return $this->_regularCurrencyCode;
  }
}
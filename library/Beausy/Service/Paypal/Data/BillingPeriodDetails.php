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
class Beausy_Service_Paypal_Data_BillingPeriodDetails extends Beausy_Service_Paypal_Data_Abstract
{
  const DAY = 'Day';
  const WEEK = 'Week';
  const SEMIMONTH = 'SemiMonth';
  const MONTH = 'Month';
  const YEAR = 'Year';

  /**
   * Unit for billing during this subscription period
   * @var string
   */
  private $_billingPeriod;

  /**
   * Number of billing periods that make up one billing cycle
   * @var integer
   */
  private $_billingFrequency;

  /**
   * Number of billing cycles for payment period
   * @var integer
   */
  private $_totalBillingCycles;

  /**
   * Billing amount for each billing cycle during this payment period
   * @var string
   */
  private $_amount;

  /**
   * Unit for billing during this subscription period
   * @var string
   */
  private $_trialBillingPeriod;

  /**
   * Number of billing periods that make up one billing cycle
   * @var integer
   */
  private $_trialBillingFrequency;

  /**
   * Number of billing cycle for trial payment period
   * @var integer
   */
  private $_trialTotalBillingCycles;

  /**
   * Billing amount for each billing cycle during this payment period
   * @var string
   */
  private $_trialAmount;

  /**
   * A three-character currency code
   * @var string
   */
  private $_currencyCode = 'USD'; // Paypal defaults to USD

  /**
   * Shipping amount for each billing cycle during this payment period
   * @var string
   */
  private $_shippingAmount;

  /**
   * Tax amount for each billing cycle during this payment period
   * @var string
   */
  private $_taxAmount;

  /**
   * Set unit for billing during this subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setBillingPeriod($value)
  {
    switch ($value)
    {
    case self::DAY: // fall-through
    case self::WEEK: // fall-through
    case self::SEMIMONTH: // fall-through
    case self::MONTH: // fall-through
    case self::YEAR:
      $this->_billingPeriod = $value;
      break;
    default:
      require_once 'Beausy_Service_Paypal_Data_Exception.php';
      throw new Beausy_Service_Paypal_Data_Exception("Billing period must be one of '" . self::DAY . "', '" . self::WEEK . "', '" . self::SEMIMONTH . "', '" . self::MONTH . "', '" . self::YEAR . "'");
    }

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
   * Set number of billing periods that make up one billing cycle
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setBillingFrequency($value)
  {
    switch ($this->_billingPeriod)
    {
      case self::DAY:
        if ($value > 365) {
          require_once 'Beausy_Service_Paypal_Data_Exception.php';
          throw new Beausy_Service_Paypal_Data_Exception('Billing frequency and period must be less than or equal to one year');
        }
        break;
      case self::WEEK:
        if ($value > 52) {
          require_once 'Beausy_Service_Paypal_Data_Exception.php';
          throw new Beausy_Service_Paypal_Data_Exception('Billing frequency and period must be less than or equal to one year');
        }
        break;
      case self::SEMIMONTH:
        if ($value != 1) {
          require_once 'Beausy_Service_Paypal_Data_Exception.php';
          throw new Beausy_Service_Paypal_Data_Exception('Billing frequency and period must be less than or equal to one year');
        }
        break;
      case self::MONTH:
        if ($value > 12) {
          require_once 'Beausy_Service_Paypal_Data_Exception.php';
          throw new Beausy_Service_Paypal_Data_Exception('Billing frequency and period must be less than or equal to one year');
        }
        break;
      case self::YEAR:
        if ($value != 1) {
          require_once 'Beausy_Service_Paypal_Data_Exception.php';
          throw new Beausy_Service_Paypal_Data_Exception('Billing frequency and period must be less than or equal to one year');
        }
        break;
    }

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
   * @return string
   */
  public function getAmount()
  {
    return $this->_amount;
  }

  /**
   * Set unit for billing during this subscription period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTrialBillingPeriod($value)
  {
    switch ($value)
    {
      case self::DAY:
      case self::WEEK:
      case self::SEMIMONTH:
      case self::MONTH:
      case self::YEAR:
        $this->_trialBillingPeriod = $value;
        break;
      default:
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception("Billing period must be one of '" . self::DAY . "', '" . self::WEEK . "', '" . self::SEMIMONTH . "', '" . self::MONTH . "', '" . self::YEAR . "'");
    }

    return $this;
  }

  /**
   * Retrieve unit for billing during this subscription period
   * @return string
   */
  public function getTrialBillingPeriod()
  {
    return $this->_trialBillingPeriod;
  }

  /**
   * Set number of billing periods that make up one billing cycle
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTrialBillingFrequency($value)
  {
    switch ($this->_trialBillingPeriod)
    {
    case self::DAY:
      if ($value > 365)
      {
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception('Trial billing frequency and period must be less than or equal to one year');
      }
    case self::WEEK:
      if ($value > 52)
      {
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception('Trial billing frequency and period must be less than or equal to one year');
      }
    case self::SEMIMONTH:
      if ($value != 1)
      {
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception('Trial billing frequency and period must be less than or equal to one year');
      }
    case self::MONTH:
      if ($value > 12)
      {
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception('Trial billing frequency and period must be less than or equal to one year');
      }
    case self::YEAR:
      if ($value != 1)
      {
        require_once 'Beausy_Service_Paypal_Data_Exception.php';
        throw new Beausy_Service_Paypal_Data_Exception('Trial billing frequency and period must be less than or equal to one year');
      }

    default:
      $this->_trialBillingFrequency = $value;
    }

    return $this;
  }

  /**
   * Retrieve number of billing periods that make up one billing cycle
   * @return integer
   */
  public function getTrialBillingFrequency()
  {
    return $this->_trialBillingFrequency;
  }

  /**
   * Set number of billing cycle for trial payment period
   *
   * @param integer $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTrialTotalBillingCycles($value)
  {
    $this->_trialTotalBillingCycles = $value;
    return $this;
  }

  /**
   * Retrieve number of billing cycle for trial payment period
   * @return integer
   */
  public function getTrialTotalBillingCycles()
  {
    return $this->_trialTotalBillingCycles;
  }

  /**
   * Set billing amount for each billing cycle during this payment period
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
   */
  public function setTrialAmount($value)
  {
    $this->_trialAmount = $value;
    return $this;
  }

  /**
   * Retrieve billing amount for each billing cycle during
   * this payment period
   * @return string
   */
  public function getTrialAmount()
  {
    return $this->_trialAmount;
  }

  /**
   * Set three-character currency code
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_BillingPeriodDetails
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
   * Returns this class as an array
   *
   * @return array
   */
  public function toArray()
  {
    $array = array();

    // Required
    $array['BILLINGPERIOD'] = $this->_billingPeriod;
    $array['BILLINGFREQUENCY'] = $this->_billingFrequency;
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

    // Optional
    if (!empty($this->_trialBillingPeriod))
    {
      // Required if an optional trial period is specified
      $array['TRIALBILLINGPERIOD'] = $this->_trialBillingPeriod;
      $array['TRIALBILLINGFREQUENCY'] = $this->_trialBillingFrequency;
      if (isset($this->_trialTotalBillingCycles))
        $array['TRIALTOTALBILLINGCYCLES'] = $this->_trialTotalBillingCycles;
      $array['TRIALAMT'] = $this->_trialAmount;
    }

    // Optional
    if (isset($this->_shippingAmount))
      $array['SHIPPINGAMT'] = $this->_shippingAmount;
    if (isset($this->_taxAmount))
      $array['TAXAMT'] = $this->_taxAmount;

    return $array;
  }
}
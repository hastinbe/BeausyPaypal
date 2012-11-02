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
class Beausy_Service_Paypal_Data_Response_UserSelectedOptions extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Options that were presented to the user were determined
   * @var string
   */
  private $_shippingCalculationMode;

  /**
   * The Yes/No option that was chosen by the buyer for insurance
   * @var string
   */
  private $_insuranceOptionSelected;

  /**
   * Is true if the buyer chose the default shipping option
   * @var string
   */
  private $_shippingOptionIsDefault;

  /**
   * The shipping amount that was chosen by the buyer
   * @var string
   */
  private $_shippingOptionAmount;

  /**
   * The name of the shipping option such as air or ground
   * @var string
   */
  private $_shippingOptionName;

  /**
   * Set Options that were presented to the user were determined
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  public function setShippingCalculationMode($value)
  {
    $this->_shippingCalculationMode = $value;
    return $this;
  }

  /**
   * Retrieve Options that were presented to the user were determined
   *
   * @return string
   */
  public function getShippingCalculationMode()
  {
    return $this->_shippingCalculationMode;
  }

  /**
   * Set option that was chosen by the buyer for insurance
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  public function setInsuranceOptionSelected($value)
  {
    $this->_insuranceOptionSelected = $value;
    return $this;
  }

  /**
   * Retrieve option that was chosen by the buyer for insurance
   *
   * @return string
   */
  public function getInsuranceOptionSelected()
  {
    return $this->_insuranceOptionSelected;
  }

  /**
   * Set if the buyer chose the default shipping option
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  public function setShippingOptionIsDefault($value)
  {
    $this->_shippingOptionIsDefault = $value;
    return $this;
  }

  /**
   * Retrieve if the buyer chose the default shipping option
   *
   * @return string
   */
  public function getShippingOptionIsDefault()
  {
    return $this->_shippingOptionIsDefault;
  }

  /**
   * Set shipping amount that was chosen by the buyer
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  public function setShippingOptionAmount($value)
  {
    $this->_shippingOptionAmount = $value;
    return $this;
  }

  /**
   * Retrieve shipping amount that was chosen by the buyer
   *
   * @return string
   */
  public function getShippingOptionAmount()
  {
    return $this->_shippingOptionAmount;
  }

  /**
   * Set name of the shipping option such as air or ground
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_Response_UserSelectedOptions
   */
  public function setShippingOptionName($value)
  {
    $this->_shippingOptionName = $value;
    return $this;
  }

  /**
   * Retrieve name of the shipping option such as air or ground
   *
   * @return string
   */
  public function getShippingOptionName()
  {
    return $this->_shippingOptionName;
  }
}
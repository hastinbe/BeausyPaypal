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
/**
 * NOTE: USED FOR BRAZIL ONLY
 */
class Beausy_Service_Paypal_Data_TaxIdDetailsType extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * The buyer’s tax ID type
   * @var string
   */
  private $_taxIdType;

  /**
   * The buyer’s tax ID
   * @var string
   */
  private $_taxIdDetails;

  /**
   * Set the buyer’s tax ID type
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_TaxIdDetailsType
   */
  public function setTaxIdType($value)
  {
    $this->_taxIdType = $value;
    return $this;
  }

  /**
   * Retrieve the buyer’s tax ID type
   *
   * @return string
   */
  public function getTaxIdType()
  {
    return $this->_taxIdType;
  }

  /**
   * Set the buyer’s tax ID
   *
   * @param   string  $value
   * @return  Beausy_Service_Paypal_Data_TaxIdDetailsType
   */
  public function setTaxIdDetails($value)
  {
    $this->_taxIdDetails = $value;
    return $this;
  }

  /**
   * Retrieve the buyer’s tax ID
   *
   * @return string
   */
  public function getTaxIdDetails()
  {
    return $this->_taxIdDetails;
  }
}
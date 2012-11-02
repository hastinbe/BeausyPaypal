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
class Beausy_Service_Paypal_Data_Response_ThreeDSecure extends Beausy_Service_Paypal_Data_Response_Abstract
{
  /**
   * Returned only for Verified by Visa transactions. Visa Payer Authentication Service status
   * indicating whether Verified by Visa confirms that the information received is acceptable.
   *
   * @var string
   */
  protected $_vpas;

  /**
   * The Electronic Commerce Indicator (ECI) that PayPal submitted with the payment authorisation request.
   * @var string
   */
  protected $_ecisubmitted3ds;

  /**
   * Set the Visa Payer Authentication Service status
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_ThreeDSecure
   */
  public function setVpas($value)
  {
    $this->_vpas = $value;
    return $this;
  }

  /**
   * Retrieve the Visa Payer Authentication Service status
   *
   * @return string
   */
  public function getVpas()
  {
    return $this->_vpas;
  }

  /**
   * Set the Electronic Commerce Indicator
   *
   * @param string $value
   * @return Beausy_Service_Paypal_Data_Response_ThreeDSecure
   */
  public function setEciSubmitted3ds($value)
  {
    $this->_ecisubmitted3ds = $value;
    return $this;
  }

  /**
   * Retrieve the Electronic Commerce Indicator
   *
   * @return string
   */
  public function getEciSubmitted3ds()
  {
    return $this->_ecisubmitted3ds;
  }
}
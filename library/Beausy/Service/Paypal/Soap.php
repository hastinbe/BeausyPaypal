<?php
/**
 * @see Beausy_Service_Paypal_Abstract
 */
require_once 'Beausy/Service/Paypal/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Soap extends Beausy_Service_Paypal_Abstract
{
  /**
   * Set the Paypal response object
   *
   * @param Beausy_Service_Paypal_Response_Soap $response
   * @return Beausy_Service_Paypal_Abstract
   */
  public function setResponse(Beausy_Service_Paypal_Response_Soap $response)
  {
    $this->_response = $response;
    return $this;
  }
}
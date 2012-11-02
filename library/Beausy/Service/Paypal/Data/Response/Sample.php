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
class Beausy_Service_Paypal_Data_Response_ extends Beausy_Service_Paypal_Data_Response_Abstract
{

  /**
   * Set
   *
   * @param string $
   * @return Beausy_Service_Paypal_Data_Response_
   */
  public function set($)
  {
    $this->_ = $;
    return $this;
  }

  /**
   * Retrieve
   *
   * @return string
   */
  public function get()
  {
    return $this->_;
  }
}
<?php
/**
 * @see Beausy_Service_Paypal_Response_Nvp_Abstract
 */
require_once 'Beausy/Service/Paypal/Response/Nvp/Abstract.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Response_Nvp_DoVoid extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * The authorization identification number you specified in the request.
   * @var string
   */
  protected $_transactionId;

  /**
   * Parses the fields of the Paypal API response
   *
   * @param array $response
   * @return void
   */
  public function parse($response)
  {
    /*
     * Parse fields that come with every Paypal response
     */
    parent::parse($response);

    /*
     * If Paypal returned an error there are no additional fields to parse
     */
    if ($this->isError())
      return;

    $this->_authorizationId = $response['AUTHORIZATIONID'];
  }

  /**
   * Retrieve the authorization identification number you specified in the request.
   *
   * @return string
   */
  public function getAuthorizationId()
  {
    return $this->_authorizationId;
  }
}
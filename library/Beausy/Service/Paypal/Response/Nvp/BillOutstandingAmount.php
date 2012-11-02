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
class Beausy_Service_Paypal_Response_Nvp_BillOutstandingAmount extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * Recurring payments profile ID
   *
   * Note: An error is returned if the profile specified in the BillOutstandingAmount request
   *       has a status of canceled or expired
   *
   * @var string
   */
  protected $_profileId;

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

    $this->_profileId = $response['PROFILEID'];
  }

  /**
   * Retrieve the recurring payments profile ID
   *
   * @return string
   */
  public function getProfileId()
  {
    return $this->_profileId;
  }
}
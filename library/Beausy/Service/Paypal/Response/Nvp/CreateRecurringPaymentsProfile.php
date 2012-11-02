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
class Beausy_Service_Paypal_Response_Nvp_CreateRecurringPaymentsProfile extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /*
   * Recurring payment profile successfully created and activated for scheduled payments
   */
  const STATUS_ACTIVE = 'ActiveProfile';

  /*
   * System is in process of creating the recurring payment profile
   */
  const STATUS_PENDING = 'PendingProfile';

  /**
   * Unique identifer for future reference to the details of the recurring payment
   * @var string
   */
  protected $_profileId;

  /**
   * Status of the recurring payment profile
   * @var string
   */
  protected $_profileStatus;

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

    $this->_profileId     = $response['PROFILEID'];
    $this->_profileStatus = $response['PROFILESTATUS'];
  }

  /**
   * Retrieve the unique identifier for the recurring payment
   *
   * @return string
   */
  public function getProfileId()
  {
    return $this->_profileId;
  }

  /**
   * Retrieve the status of the recurring payment profile
   *
   * @return string
   */
  public function getProfileStatus()
  {
    return $this->_profileStatus;
  }
}
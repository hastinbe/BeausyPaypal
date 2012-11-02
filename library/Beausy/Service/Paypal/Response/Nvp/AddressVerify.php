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
class Beausy_Service_Paypal_Response_Nvp_AddressVerify extends Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * Indicates the element does not match what Paypal has on file
   */
  const NONE = 'None';

  /**
   * Indicates the element is confirmed with Paypal
   */
  const CONFIRMED = 'Confirmed';

  /**
   * Indicates the element is not confirmed with Paypal
   */
  const UNCONFIRMED = 'Unconfirmed';

  /**
   * Indicates the element is on file for the Paypal member
   */
  const MATCHED = 'Matched';

  /**
   * Indicates the element does not match on file for the Paypal member
   */
  const UNMATCHED = 'Unmatched';

  /**
   * A value indicating the result of email verification
   * @var string
   */
  protected $_confirmationCode;

  /**
   * A value indicating the result of street verification
   * @var string
   */
  protected $_streetMatch;

  /**
   * A value indicating the result of zip verification
   * @var string
   */
  protected $_zipMatch;

  /**
   * Two-character country code (ISO 3166) on file for the PayPal email address
   * @var string
   */
  protected $_countryCode;

  /**
   * Token that contains encrypted information about the member’s email address and postal address
   * @var string
   */
  protected $_token;

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

    $this->_confirmationCode = $response['CONFIRMATIONCODE'];
    $this->_streetMatch      = $response['STREETMATCH'];
    $this->_zipMatch         = $response['ZIPMATCH'];
    $this->_countryCode      = $response['COUNTRYCODE'];
    $this->_token            = $response['TOKEN'];
  }

  /**
   * Retrieve the value indicating the result of verification
   *
   * @return string
   */
  public function getConfirmationCode()
  {
    return $this->_confirmationCode;
  }

  /**
   * Retrieve the value indicating the result of verification
   *
   * @return string
   */
  public function getStreetMatch()
  {
    return $this->_streetMatch;
  }

  /**
   * Retrieve the value indicating the result of verification
   *
   * @return string
   */
  public function getZipMatch()
  {
    return $this->_zipMatch;
  }

  /**
   * Retrieve the two-character country code (ISO 3166) on file for the PayPal email address
   *
   * @return string
   */
  public function getCountryCode()
  {
    return $this->_countryCode;
  }

  /**
   * Retrieve the token that contains encrypted information about the member’s email address and postal address
   *
   * @return string
   */
  public function getToken()
  {
    return $this->_token;
  }
}
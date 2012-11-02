<?php
/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
abstract class Beausy_Service_Paypal_Response_Nvp_Abstract
{
  /**
   * The Paypal API NVP response
   * @var array
   */
  protected $_response;

  /**
   * Achknowledgement status
   * @var string
   */
  protected $_ack;

  /**
   * Date and time that the requested API operation was performed
   * @var string
   */
  protected $_timestamp;

  /**
   * Correlation ID, uniquely identifies the transaction to Paypal
   * @var string
   */
  protected $_correlationId;

  /**
   * Version of the API
   * @var string
   */
  protected $_version;

  /**
   * Sub-version of the API
   * @var string
   */
  protected $_build;

  /**
   * Errors associated with the requested API operation
   * @var array
   */
  protected $_errors = array();

  /**
   * Constructor
   *
   * @param array $response
   * @return void
   */
  public function __construct($response)
  {
    if (!is_array($response))
    {
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception('Response must be an associative array');
    }

    $this->parse($response);
  }

  /**
   * Retrieve member variable value
   *
   * @param string $name
   * @return mixed
   */
	public function __get($name)
  {
    $method = 'get' . $name;

    if (!method_exists($this, $method))
    {
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception("Invalid property '$name'");
    }
    return $this->$method();
  }

  /**
   * Retrieve the response errors
   *
   * @return array
   */
  public function getErrors()
  {
    return $this->_errors;
  }

  /**
   * Check whether the response is an error
   *
   * @return boolean
   */
  public function isError()
  {
    return ($this->_ack == 'Failure' ||
            $this->_ack == 'FailureWithWarning' ||
            $this->_ack == 'Warning');
  }

  /**
   * Check whether the response is successful
   *
   * @return boolean
   */
  public function isSuccessful()
  {
    return ($this->_ack == 'Success' ||
            $this->_ack == 'SuccessWithWarning');
  }

  /**
   * Check whether the response is partially successful
   *
   * @return boolean
   */
  public function isPartiallySuccessful()
  {
    return $this->_ack == 'PartialSuccess';
  }

  /**
   * Parses the fields that apply to all Paypal API responses
   *
   * @param array $response
   * @return void
   */
  public function parse($response)
  {
    if (!array_key_exists('ACK', $response))
    {
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception('Invalid Paypal NVP response body');
    }

    $this->_response = $response;

    // Required with all Paypal responses
    $this->_ack           = $response['ACK'];
    $this->_timestamp     = $response['TIMESTAMP'];
    $this->_correlationId = $response['CORRELATIONID'];
    $this->_version       = $response['VERSION'];
    $this->_build         = $response['BUILD'];

    switch ($this->_ack)
    {
      case 'Success':             // fall-through
      case 'SuccessWithWarning':
        break;
      case 'PartialSuccess':      // fall-through
      case 'Failure':             // fall-through
      case 'FailureWithWarning':  // fall-through
      case 'Warning':
        $numFields = count($response);
        for ($i = 0; $i < $numFields; $i++)
        {
          if (array_key_exists("L_ERRORCODE$i", $response))
          {
            $this->_errors[] = array(
              'code'          => $response["L_ERRORCODE$i"],
              'shortMessage'  => $response["L_SHORTMESSAGE$i"],
              'longMessage'   => $response["L_LONGMESSAGE$i"],
              'severityCode'  => $response["L_SEVERITYCODE$i"]);
          }
        }
    }
  }
}
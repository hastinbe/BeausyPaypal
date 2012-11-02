<?php
/**
 * @see Beausy_Service_Paypal
 */
require_once 'Beausy/Service/Paypal.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
abstract class Beausy_Service_Paypal_Abstract
{
  /**
   * Client used to query all web services
   *
   * @var Zend_Http_Client|Zend_Soap_Client
   */
  protected static $_client = null;

  /**
   * Paypal response object
   *
   * @var Beausy_Service_Paypal_Response_Abstract
   */
  protected $_response;

  /**
   * User-provided configuration
   *
   * @var array
   */
  protected $_config = array();

  public function __construct($config)
  {
    /*
     * Verify that adapter parameters are in an array.
     */
    if (!is_array($config))
    {
      /*
       * Convert Zend_Config argument to a plain array.
       */
      if ($config instanceof Zend_Config)
      {
        $config = $config->toArray();
      }
      else {
        /**
         * @see Beausy_Service_Paypal_Exception
         */
        require_once 'Beausy/Service/Paypal/Exception.php';
        throw new Beausy_Service_Paypal_Exception('Interface parameters must be in an array or a Zend_Config object');
      }
    }

    $this->_checkRequiredOptions($config);

    $options = array();

    /*
     * normalize the config and merge it with the defaults
     */
    if (array_key_exists('options', $config))
      // can't use array_merge() because keys might be integers
      foreach ((array) $config['options'] as $key => $value)
        $options[$key] = $value;

    $this->_config = array_merge($this->_config, $config);
    $this->_config['options'] = $options;
  }

  /**
   * Sets the client object to use for retrieving data.
   *
   * @param Zend_Http_Client|Zend_Soap_Client $client
   */
  public static function setClient($client)
  {
    self::$_client = $client;
  }

  /**
   * Gets the client object.
   *
   * @return Zend_Http_Client|Zend_Soap_Client
   */
  public static function getClient()
  {
    return self::$_client;
  }

  /**
   * Prepares client for interaction with Paypal
   *
   * @return void
   */
  abstract protected function _prepareClient();

  /**
   * Check for config options that are mandatory.
   * Throw exceptions if any are missing.
   *
   * @param array $config
   * @throws Beausy_Service_Paypal_Exception
   */
  protected function _checkRequiredOptions(array $config)
  {
    if (! array_key_exists('password', $config))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception("Configuration array must have a key for 'password' for API credentials");
    }

    if (! array_key_exists('username', $config))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception("Configuration array must have a key for 'username' for API credentials");
    }

    if (! array_key_exists('certificate', $config) &&
        ! array_key_exists('signature', $config))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception("Configuration array must have a key for 'certificate' or 'signature' for API credentials");
    }

    if (! array_key_exists('environment', $config))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception("Configuration array must have a key for 'environment' for API endpoint environment");
    }
  }
  /**
   * Returns the configuration variables in this interface.
   *
   * @return array
   */
  public function getConfig()
  {
    return $this->_config;
  }

  /**
   * Set the Paypal response object
   *
   * @param Beausy_Service_Paypal_Response_Abstract $response
   * @return Beausy_Service_Paypal_Abstract
   */
  public function setResponse($response)
  {
    $this->_response = $response;
    return $this;
  }

  /**
   * Returns the Paypal response object
   *
   * @return Beausy_Service_Paypal_Response_Abstract|null
   */
  public function getResponse()
  {
    return $this->_response;
  }

  abstract public function createRecurringPaymentsProfile(array $fieldSets);
  abstract public function getRecurringPaymentsProfileDetails($profileId);
  abstract public function doDirectPayment(array $fieldSets, $ipAddress, $paymentAction='Sale');
}
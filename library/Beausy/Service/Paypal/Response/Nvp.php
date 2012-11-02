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
class Beausy_Service_Paypal_Response_Nvp
{
  public static function factory($responseType, $response)
  {
    /*
     * Convert Zend_Http_Response body to an associative array
     */
    if ($response instanceof Zend_Http_Response)
      parse_str(urldecode($response->getBody()), $response);

    /*
     * Verify that a response type has been specified.
     */
    if (!is_string($responseType) || empty($responseType))
    {
      /**
       * @see Beausy_Service_Paypal_Response_Exception
       */
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception('Response name must be specified in a string');
    }

    /*
     * Verify that we have a valid response message
     */
    if (!is_array($response) || empty($response))
    {
      /**
       * @see Beausy_Service_Paypal_Response_Exception
       */
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception('Response must be either an associate array or Zend_Http_Response');
    }

    /*
     * Form full response class name
     */
    $responseNamespace = 'Beausy_Service_Paypal_Response_Nvp';
    $responseName = $responseNamespace . '_';
    $responseName .=
      str_replace(' ', '_', ucwords(str_replace('_', '', $responseType)));

    /*
     * Load the response class. Throws an exception
     * if the specified class cannot be loaded.
     */
    if (!class_exists($responseName))
    {
      require_once 'Zend/Loader.php';
      Zend_Loader::loadClass($responseName);
    }

    /*
     * Create an instance of the response class.
     * Pass the response body to the response class constructor.
     */
    $paypalResponse = new $responseName($response);

    /*
     * Verify that the object created is a descendent
     * of the abstract response type
     */
    if (!$paypalResponse instanceof Beausy_Service_Paypal_Response_Nvp_Abstract)
    {
      /**
       * @see Beausy_Service_Paypal_Response_Exception
       */
      require_once 'Beausy/Service/Paypal/Response/Exception.php';
      throw new Beausy_Service_Paypal_Response_Exception("Response class '$responseName' does not extend Beausy_Service_Paypal_Response_Nvp_Abstract");
    }

    return $paypalResponse;
  }
}